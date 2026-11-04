@extends('layouts.app')

@section('title', 'Quiz')

@section('content')
    <div class="max-w-3xl mx-auto py-10">

        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-900">
                Test Your Knowledge
            </h1>
            <p class="mt-2 text-gray-500">
                Choose how you want to practice your Korean vocabulary and grammar.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

            {{-- Recommended Quiz --}}
            <a href="{{ route('quiz.recommended') }}"
                class="group p-6 rounded-2xl border border-gray-200 hover:border-indigo-400 hover:shadow-lg transition duration-200">

                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 mb-5">
                    <i class="fa-solid fa-lightbulb text-xl"></i>
                </div>

                <h2 class="text-lg font-semibold text-gray-900 mb-2">
                    Recommended Quiz
                </h2>

                <p class="text-sm text-gray-500 leading-relaxed">
                    Practice with questions based on your learning progress and previously learned words.
                </p>

                <div class="mt-6 flex items-center text-sm font-medium text-indigo-600">
                    Start practicing
                    <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
                </div>
            </a>

            {{-- Custom Quiz --}}
            <a href="{{ route('quiz.custom') }}"
                class="group p-6 rounded-2xl border border-gray-200 hover:border-indigo-400 hover:shadow-lg transition duration-200">

                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 mb-5">
                    <i class="fa-solid fa-sliders text-xl"></i>
                </div>

                <h2 class="text-lg font-semibold text-gray-900 mb-2">
                    Custom Quiz
                </h2>

                <p class="text-sm text-gray-500 leading-relaxed">
                    Create your own quiz by choosing the level, difficulty, and number of questions.
                </p>

                <div class="mt-6 flex items-center text-sm font-medium text-indigo-600">
                    Customize quiz
                    <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
                </div>
            </a>

        </div>
    </div>
@endsection
