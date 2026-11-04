
@extends('layouts.app')

@section('title', 'Custom Quiz')

@section('content')

<div class="max-w-xl mx-auto px-5 py-12">

    {{-- Header --}}
    <div class="mb-10">
        <a href="{{ route('quiz.index') }}"
           class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-indigo-600 mb-8 transition">
            <i class="fa-solid fa-arrow-left"></i>
            Back to quizzes
        </a>

        <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center">
                <i class="fa-solid fa-sliders text-xl"></i>
            </div>
            <span class="text-sm font-semibold text-indigo-600">
                PERSONALIZED PRACTICE
            </span>
        </div>

        <h1 class="text-3xl font-bold text-slate-800 tracking-tight">
            Build your quiz
        </h1>

        <p class="text-slate-500 mt-2">
            Choose your level and challenge yourself.
        </p>
    </div>

    <form method="POST" action="{{ route('quiz.vocabulary.custom.start') }}"
          class="space-y-7">

        @csrf

        {{-- TOPIK Level --}}
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-3">
                TOPIK Level
            </label>

            <div class="grid grid-cols-3 gap-3">
                @foreach(['TOPIK 1', 'TOPIK 2', 'TOPIK 3'] as $level)
                    <label class="cursor-pointer">
                        <input type="radio" name="level"
                               value="{{ $level }}"
                               class="peer sr-only"
                               {{ $loop->first ? 'checked' : '' }}>

                        <div class="text-center py-4 rounded-xl border border-slate-200
                                    text-sm font-semibold text-slate-600
                                    peer-checked:border-indigo-500
                                    peer-checked:bg-indigo-50
                                    peer-checked:text-indigo-700
                                    hover:border-indigo-300 transition">
                            {{ $level }}
                        </div>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Difficulty --}}
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-3">
                Difficulty
            </label>

            <div class="grid grid-cols-3 gap-3">
                @foreach(['Easy', 'Medium', 'Hard'] as $difficulty)
                    <label class="cursor-pointer">
                        <input type="radio" name="difficulty"
                               value="{{ $difficulty }}"
                               class="peer sr-only"
                               {{ $loop->first ? 'checked' : '' }}>

                        <div class="text-center py-4 rounded-xl border border-slate-200
                                    text-sm font-semibold text-slate-600
                                    peer-checked:border-indigo-500
                                    peer-checked:bg-indigo-50
                                    peer-checked:text-indigo-700
                                    hover:border-indigo-300 transition">
                            {{ $difficulty }}
                        </div>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Question Count --}}
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-3">
                Number of Questions
            </label>

            <div class="grid grid-cols-3 gap-3">
                @foreach([5, 10, 20] as $count)
                    <label class="cursor-pointer">
                        <input type="radio" name="question_count"
                               value="{{ $count }}"
                               class="peer sr-only"
                               {{ $count === 10 ? 'checked' : '' }}>

                        <div class="text-center py-4 rounded-xl border border-slate-200
                                    text-sm font-semibold text-slate-600
                                    peer-checked:border-indigo-500
                                    peer-checked:bg-indigo-50
                                    peer-checked:text-indigo-700
                                    hover:border-indigo-300 transition">
                            {{ $count }}
                        </div>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Start Button --}}
        <button type="submit"
                class="w-full flex items-center justify-center gap-3
                       bg-indigo-600 hover:bg-indigo-700
                       text-white font-semibold py-4 rounded-xl
                       shadow-sm hover:shadow-md transition">

            Start Quiz
            <i class="fa-solid fa-arrow-right"></i>
        </button>

    </form>

</div>

@endsection
