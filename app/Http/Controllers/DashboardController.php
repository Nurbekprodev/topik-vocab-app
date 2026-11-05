<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;
use App\Models\Bookmark;
use App\Models\Grammar;
use App\Models\UserVocabularyProgress;
use App\Models\UserGrammarProgress;
use App\Models\QuizAttempt;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = 1;

        $totalWords = Vocabulary::count();

        $learnedWords = UserVocabularyProgress::where('user_id', $userId)
            ->where('status', 'known')
            ->count();

        $bookmarkedWords = Bookmark::where('user_id', $userId)
            ->count();

        $totalGrammar = Grammar::count();

        $completedGrammar = UserGrammarProgress::where('user_id', $userId)
            ->where('status', 'completed')
            ->count();

        $latestQuiz = QuizAttempt::where('user_id', $userId)
            ->latest()
            ->first();

        return view('dashboard.index', compact(
            'totalWords',
            'learnedWords',
            'bookmarkedWords',
            'totalGrammar',
            'completedGrammar',
            'latestQuiz'
        ));
    }
}
