<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;
use App\Models\UserVocabularyProgress;
use Illuminate\Http\Request;
use App\Models\Bookmark;

class VocabularyController extends Controller
{
public function index(Request $request)
{
    $query = Vocabulary::query();

    // Search Korean and English across the entire database.
    if ($request->filled('q')) {
        $search = $request->input('q');

        $query->where(function ($q) use ($search) {
            $q->where('korean_word', 'like', "%{$search}%")
              ->orWhere('english_meaning', 'like', "%{$search}%");
        });
    }

    // Filter by TOPIK level or word type.
    $filter = $request->input('filter', 'all');

    if ($filter === 'topik 1') {
        $query->where('level', 'like', '%TOPIK 1%');
    } elseif ($filter === 'topik 2') {
        $query->where('level', 'like', '%TOPIK 2%');
    } elseif (in_array($filter, ['noun', 'verb', 'adjective'])) {
        $query->where('word_type', 'like', $filter);
    }

    $totalWords = Vocabulary::count();

    $vocabularies = $query
    ->with(['examples' => function ($q) {
        $q->limit(1);
    }])
    ->paginate(10)
    ->withQueryString();

    $bookmarkedIds = \App\Models\Bookmark::where('user_id', 1)
        ->whereNotNull('vocabulary_id')
        ->pluck('vocabulary_id')
        ->toArray();

    return view('vocabulary.index', compact(
        'vocabularies',
        'totalWords',
        'bookmarkedIds'
    ));
}



public function learn(Request $request)
{
    $userId = 1; // Temporary until authentication

    // Starting a new session when a word count is selected.
    if ($request->has('words')) {
        $request->validate([
            'words' => ['required', 'integer', 'in:5,10,20,30'],
        ]);

        session()->forget([
            'vocabulary_session_ids',
            'vocabulary_session_index',
        ]);
    }

    // Create a session if one does not already exist.
    if (!session()->has('vocabulary_session_ids')) {
        $wordCount = (int) $request->input('words', 10);

        $knownWordIds = UserVocabularyProgress::where('user_id', $userId)
            ->where('status', 'known')
            ->pluck('vocabulary_id');

        $wordIds = Vocabulary::whereNotIn('id', $knownWordIds)
            ->inRandomOrder()
            ->limit($wordCount)
            ->pluck('id')
            ->all();

        session()->put('vocabulary_session_ids', $wordIds);
        session()->put('vocabulary_session_index', 0);
    }

    $wordIds = session('vocabulary_session_ids', []);
    $index = (int) session('vocabulary_session_index', 0);
    $totalWords = count($wordIds);

    // End the session when every selected word has been answered.
    if ($index >= $totalWords) {
        return view('vocabulary.complete', [
            'totalWords' => $totalWords,
        ]);
    }

    $word = Vocabulary::with('examples')->findOrFail($wordIds[$index]);

    $bookmarkedIds = Bookmark::where('user_id', 1)
    ->pluck('vocabulary_id')
    ->toArray();

    return view('vocabulary.learn', [
        'word' => $word,
        'currentNumber' => $index + 1,
        'totalWords' => $totalWords,
        'bookmarkedIds' => $bookmarkedIds,
    ]);
}

public function mark(Request $request)
{
    $request->validate([
        'vocabulary_id' => ['required', 'integer', 'exists:vocabularies,id'],
        'status' => ['required', 'in:known,learning'],
    ]);

    $userId = 1; // Temporary until authentication

    $wordIds = session('vocabulary_session_ids', []);
    $index = (int) session('vocabulary_session_index', 0);

    $vocabularyId = (int) $request->vocabulary_id;

    // Make sure the word belongs to this learning session.
    abort_unless(
        in_array($vocabularyId, $wordIds),
        422,
        'Invalid vocabulary session.'
    );

    $currentWordId = $wordIds[$index] ?? null;

    $progress = UserVocabularyProgress::firstOrCreate(
        [
            'user_id' => $userId,
            'vocabulary_id' => $vocabularyId,
        ],
        [
            'status' => 'learning',
            'correct_count' => 0,
            'wrong_count' => 0,
        ]
    );

    if ($request->status === 'known') {
        $progress->status = 'known';
        $progress->correct_count = ($progress->correct_count ?? 0) + 1;
    } else {
        $progress->status = 'learning';
        $progress->wrong_count = ($progress->wrong_count ?? 0) + 1;
    }

    $progress->last_reviewed_at = now();
    $progress->save();

    // Advance only if the submitted word is the current word.
    if ($vocabularyId === (int) $currentWordId) {
        session()->put('vocabulary_session_index', $index + 1);
    }

    return redirect()->route('vocabulary.learn');
}


    public function bookmark(Request $request)
    {
        Bookmark::firstOrCreate([
            'user_id' => 1,
            'vocabulary_id' => $request->vocabulary_id,
        ]);

        return redirect()->back();
    }
}