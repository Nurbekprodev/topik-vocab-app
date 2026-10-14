<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;
use App\Models\UserVocabularyProgress;
use Illuminate\Http\Request;
use App\Models\Bookmark;

class VocabularyController extends Controller
{
    public function index()
    {
        $vocabularies = Vocabulary::all();

        return view('vocabulary.index', compact('vocabularies'));
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

    return view('vocabulary.learn', [
        'word' => $word,
        'currentNumber' => $index + 1,
        'totalWords' => $totalWords,
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
    $currentWordId = $wordIds[$index] ?? null;

    // Only allow marking the current word in this session.
    abort_unless(
        $currentWordId !== null &&
        (int) $request->vocabulary_id === (int) $currentWordId,
        422,
        'Invalid vocabulary session.'
    );

    $progress = UserVocabularyProgress::firstOrCreate(
        [
            'user_id' => $userId,
            'vocabulary_id' => $request->vocabulary_id,
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

    // Advance to the next word in the selected session.
    session()->put('vocabulary_session_index', $index + 1);

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