<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VocabularyController;
use App\Http\Controllers\GrammarController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProfileController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/vocabulary', [VocabularyController::class, 'index'])->name('vocabulary.index');

Route::get('/grammar', [GrammarController::class, 'index'])->name('grammar.index');

Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');