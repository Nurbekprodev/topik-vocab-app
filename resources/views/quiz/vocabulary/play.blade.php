
@extends('layouts.app')

@section('title', 'Recommended Vocabulary Quiz')

@section('content')

<div class="min-h-screen bg-slate-50 text-slate-900 pb-32">

    {{-- Progress Header --}}
    <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/95 backdrop-blur">
        <div class="mx-auto flex max-w-xl items-center gap-4 px-4 py-4">

            <!-- <a href="{{ route('quiz.index') }}"
               class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-slate-600 transition hover:bg-slate-100">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a> -->

            <div class="min-w-0 flex-1">

                <div class="mb-2 flex justify-between text-sm text-slate-500">
                    <span class="font-medium">Recommended Quiz</span>

                    <span>
                        <span id="current-number">1</span>
                        of {{ count($questions) }}
                    </span>
                </div>

                <div class="h-2 w-full overflow-hidden rounded-full bg-slate-200">
                    <div id="progress-bar"
                         class="h-full rounded-full bg-blue-600 transition-all duration-300"
                         style="width: {{ count($questions) ? (1 / count($questions)) * 100 : 0 }}%">
                    </div>
                </div>

            </div>
        </div>
    </header>

    <main class="mx-auto w-full max-w-xl px-4 pt-10 sm:pt-14">

        <form id="quiz-form"
              action="{{ route('quiz.vocabulary.result') }}"
              method="POST">

            @csrf

            @forelse($questions as $index => $question)

                <section
                    data-question
                    class="{{ $index === 0 ? '' : 'hidden' }}"
                >

                    {{-- Question Information --}}
                    <div class="mb-10 text-center">

                        <span class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold uppercase tracking-wide text-blue-700">
                            Question {{ $index + 1 }}
                        </span>

                        <h1 class="mt-8 break-words text-5xl font-extrabold tracking-tight text-slate-900 sm:text-6xl">
                            {{ $question['korean_word'] }}
                        </h1>

                        <p class="mt-4 text-sm text-slate-500">
                            Choose the correct English meaning.
                        </p>

                    </div>

                    {{-- Hidden Correct Answer --}}
                    <input
                        type="hidden"
                        name="correct_answers[{{ $question['word_id'] }}]"
                        value="{{ $question['correct_answer'] }}"
                    >

                    {{-- Answer Options --}}
                    <fieldset>

                        <legend class="mb-4 text-sm font-semibold text-slate-700">
                            Select your answer
                        </legend>

                        <div class="space-y-3">

                            @foreach($question['options'] as $optionIndex => $option)

                                <label class="group flex cursor-pointer items-center gap-4 rounded-2xl border border-slate-200 bg-white px-4 py-4 transition-all duration-200 hover:border-blue-300 hover:bg-blue-50/40 has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50">

                                    <input
                                        type="radio"
                                        name="answers[{{ $question['word_id'] }}]"
                                        value="{{ $option }}"
                                        class="sr-only"
                                    >

                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-sm font-bold text-slate-500 transition-colors group-has-[:checked]:bg-blue-600 group-has-[:checked]:text-white">
                                        {{ chr(65 + $optionIndex) }}
                                    </span>

                                    <span class="flex-1 text-sm font-medium leading-6 text-slate-700 group-has-[:checked]:text-blue-900">
                                        {{ $option }}
                                    </span>

                                    <span class="hidden text-blue-600 group-has-[:checked]:block">
                                        <i class="fa-solid fa-circle-check text-lg"></i>
                                    </span>

                                </label>

                            @endforeach

                        </div>

                    </fieldset>

                </section>

            @empty

                <div class="rounded-2xl border border-slate-200 bg-white p-8 text-center">
                    <i class="fa-solid fa-book-open text-3xl text-slate-300"></i>

                    <h2 class="mt-4 text-lg font-bold">
                        No questions available
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        Learn some vocabulary first, then try this quiz.
                    </p>

                    <a href="{{ route('quiz.index') }}"
                       class="mt-6 inline-flex rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-700">
                        Back to quizzes
                    </a>
                </div>

            @endforelse

            @if(count($questions) > 0)

                {{-- Navigation --}}
                <div class="mt-10 flex items-center gap-3">

                    <button
                        type="button"
                        id="previous-btn"
                        class="flex min-h-14 items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 text-sm font-bold text-slate-600 transition hover:bg-slate-100 disabled:cursor-not-allowed disabled:opacity-40"
                        disabled
                    >
                        <i class="fa-solid fa-arrow-left"></i>
                        Previous
                    </button>

                    <button
                        type="button"
                        id="next-btn"
                        class="flex min-h-14 flex-1 items-center justify-center gap-2 rounded-2xl bg-blue-600 px-5 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 active:scale-[0.99]"
                    >
                        Next question
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>

                    <button
                        type="submit"
                        id="submit-btn"
                        class="hidden min-h-14 flex-1 items-center justify-center gap-2 rounded-2xl bg-blue-600 px-5 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 active:scale-[0.99]"
                    >
                        Finish quiz
                        <i class="fa-solid fa-check"></i>
                    </button>

                </div>

                <p id="quiz-message"
                   class="mt-4 text-center text-sm text-red-600"
                   role="alert"
                   aria-live="polite">
                </p>

                <p class="mt-3 text-center text-xs text-slate-400">
                    Answer each question to continue.
                </p>

            @endif

        </form>

    </main>

</div>

@if(count($questions) > 0)


@endif

@endsection
