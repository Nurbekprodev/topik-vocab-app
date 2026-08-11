<?php

namespace App\Http\Controllers;

use App\Models\Grammar;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\UserGrammarProgress;
use App\Models\UserVocabularyProgress;
use App\Models\Vocabulary;

class QuizController extends Controller
{
    public function index(){
        return view("quiz.index");
    }

    public function show(Grammar $grammar)
    {
        $quiz = $grammar->quizzes()
            ->with('questions')
            ->first();

        return view('quiz.grammar.show', compact('quiz', 'grammar'));
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $question = $quiz->questions()->first();

        $score = $request->answer === $question->correct_answer ? 1 : 0;

        QuizAttempt::create([
            'user_id' => 1,
            'quiz_id' => $quiz->id,
            'score' => $score,
            'total_questions' => 1,
            'completed_at' => now(),
        ]);

        if ($score === 1) {

            UserGrammarProgress::updateOrCreate(
                [
                    'user_id' => 1,
                    'grammar_id' => $quiz->grammar_id,
                ],
                [
                    'status' => 'completed',
                    'mastery_score' => 100,
                    'last_studied_at' => now(),
                ]
            );

            return redirect()
                ->route('grammar.learn')
                ->with('success', 'Grammar completed!');
        }

        return back()->with('error', 'Incorrect answer. Try again.');
    }

    public function recommended()
    {
        $vocabularyIds = UserVocabularyProgress::where('user_id', 1)
            ->where('status', 'known')
            ->pluck('vocabulary_id');

        $words = Vocabulary::whereIn('id', $vocabularyIds)
            ->inRandomOrder()
            ->take(10)
            ->get();

        $questions = [];

        foreach ($words as $word) {

            $wrongAnswers = Vocabulary::where('id', '!=', $word->id)
                ->inRandomOrder()
                ->take(3)
                ->pluck('english_meaning')
                ->toArray();

            $options = array_merge(
                [$word->english_meaning],
                $wrongAnswers
            );

            shuffle($options);

            $questions[] = [
                'word_id' => $word->id,
                'korean_word' => $word->korean_word,
                'correct_answer' => $word->english_meaning,
                'options' => $options,
            ];
        }

        return view('quiz.vocabulary.play', compact('questions'));
    }

    public function custom(){
        return view('quiz.vocabulary.custom');
    }

    public function customStart(Request $request){
        dd($request->all());
    }
}