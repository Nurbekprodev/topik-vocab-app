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

    public function learn()
    {
        $knownWordIds = UserVocabularyProgress::where('user_id', 1)
            ->where('status', 'known')
            ->pluck('vocabulary_id');

        $word = Vocabulary::with('examples')
            ->whereNotIn('id', $knownWordIds)
            ->inRandomOrder()
            ->first();

        if (!$word) {
            return 'Congratulations! You learned all available words.';
        }

        return view('vocabulary.learn', compact('word'));
    }

    public function mark(Request $request)
    {
        $progress = UserVocabularyProgress::firstOrCreate(
            [
                'user_id' => 1, // temporary until authentication
                'vocabulary_id' => $request->vocabulary_id,
            ]
        );

        if ($request->status === 'known') {

            $progress->status = 'known';
            $progress->correct_count += 1;

        } else {

            $progress->status = 'learning';
            $progress->wrong_count += 1;

        }

        $progress->last_reviewed_at = now();
        $progress->save();

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