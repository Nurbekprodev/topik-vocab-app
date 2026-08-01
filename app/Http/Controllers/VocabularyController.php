<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;

class VocabularyController extends Controller
{
    public function index()
    {
        $vocabularies = Vocabulary::all();

        return view('vocabulary.index', compact('vocabularies'));
    }
}