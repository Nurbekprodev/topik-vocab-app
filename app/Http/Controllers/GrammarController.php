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

        // Get all grammars in the selected level.
        $allGrammars = Grammar::where('level', $selectedLevel)
            ->orderBy('order_number')
            ->get();

        $completedGrammarIds = UserGrammarProgress::where('user_id', 1)
            ->where('status', 'completed')
            ->pluck('grammar_id')
            ->toArray();

        // Calculate progression across all grammars.
        $previousCompleted = true;

        foreach ($allGrammars as $grammar) {
            $grammar->is_completed = in_array(
                $grammar->id,
                $completedGrammarIds
            );

            $grammar->is_unlocked = $previousCompleted;

            if (!$grammar->is_completed) {
                $previousCompleted = false;
            }
        }

        // Paginate after calculating progression.
        $grammars = Grammar::where('level', $selectedLevel)
            ->orderBy('order_number')
            ->paginate(5)
            ->withQueryString();

        // Transfer progression properties to paginated records.
        foreach ($grammars as $grammar) {
            $progress = $allGrammars->firstWhere('id', $grammar->id);

            $grammar->is_completed = $progress->is_completed;
            $grammar->is_unlocked = $progress->is_unlocked;
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
