<?php

namespace App\Http\Controllers;

use App\Models\Grammar;
use App\Models\UserGrammarProgress;
use Illuminate\Http\Request;

class GrammarController extends Controller
{
    public function index()
    {
        return view("grammar.index");
    }

    public function learn()
    {
        $completedGrammarIds = UserGrammarProgress::where('user_id', 1)
            ->where('status', 'completed')
            ->pluck('grammar_id');

        $grammar = Grammar::with('examples')
            ->whereNotIn('id', $completedGrammarIds)
            ->orderBy('order_number')
            ->first();

        if (!$grammar) {
            return 'Congratulations! You completed all grammar lessons.';
        }

        return view('grammar.learn', compact('grammar'));
    }
}
