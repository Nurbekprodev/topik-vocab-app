<?php

use App\Http\Controllers\BookmarkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VocabularyController;
use App\Http\Controllers\GrammarController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProfileController;
use App\Models\Quiz;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/vocabulary', [VocabularyController::class, 'index'])->name('vocabulary.index');
Route::get('/vocabulary/learn', [VocabularyController::class, 'learn'])
    ->name('vocabulary.learn');
Route::post('/vocabulary/mark', [VocabularyController::class, 'mark'])
    ->name('vocabulary.mark');
Route::post('/quiz/vocabulary/result', [QuizController::class, 'result'])
    ->name('quiz.vocabulary.result');


Route::post('/bookmarks', [VocabularyController::class, 'bookmark'])
    ->name('bookmarks.store');
Route::get('/bookmarks', [BookmarkController::class, 'index'])
    ->name('bookmarks.index');
Route::delete('/bookmarks/{bookmark}', [BookmarkController::class, 'destroy'])
    ->name('bookmarks.destroy');
Route::post('/bookmarks/toggle', [BookmarkController::class, "toggle"])
    ->name('bookmarks.toggle');


Route::get('/grammar', [GrammarController::class, 'index'])->name('grammar.index');
Route::get('/grammar/{grammar}/learn', [GrammarController::class, 'learn'])
    ->name('grammar.learn');
Route::get('/grammar/{grammar}/quiz', [QuizController::class, 'show'])
    ->name('grammar.quiz');


Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::post('/quiz/{quiz}/submit', [QuizController::class, 'submit'])
    ->name('quiz.submit');
Route::get("/quiz/recommended", [QuizController::class, 'recommended'])
    ->name('quiz.recommended');
Route::get("/quiz/custom", [QuizController::class, 'custom'])
    ->name('quiz.custom');
Route::post('/quiz/vocabulary/custom/start', [QuizController::class, 'customStart'])
    ->name('quiz.vocabulary.custom.start');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');



use Illuminate\Support\Facades\DB;

Route::get('/check-sessions', function () {
    return response()->json(
        DB::select('DESCRIBE sessions')
    );
});