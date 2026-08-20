<?php

namespace App\Http\Controllers;

use App\Models\Grammar;
use App\Models\UserGrammarProgress;
use Illuminate\Http\Request;

class GrammarController extends Controller
{
public function index()
    {
        $levels = ['TOPIK 1', 'TOPIK 2', 'TOPIK 3'];

        $selectedLevel = request('level', 'TOPIK 1');

        $grammars = Grammar::where('level', $selectedLevel)
            ->orderBy('order_number')
            ->get();

        $completedGrammarIds = UserGrammarProgress::where('user_id', 1)
            ->where('status', 'completed')
            ->pluck('grammar_id')
            ->toArray();

        $previousCompleted = true;

        foreach ($grammars as $grammar) {
            $grammar->is_completed = in_array($grammar->id, $completedGrammarIds);

            $grammar->is_unlocked = $previousCompleted;

            if (!$grammar->is_completed) {
                $previousCompleted = false;
            }
        }

        return view('grammar.index', compact(
            'levels',
            'selectedLevel',
            'grammars'
        ));
    }

    public function learn(Grammar $grammar)
    {
        $grammar->load('examples');

        return view('grammar.learn', compact('grammar'));
    }
}
