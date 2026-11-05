@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="mx-auto max-w-5xl space-y-10 px-4 py-8 sm:px-6">

    {{-- Header --}}
    <div>
        <p class="text-sm font-semibold text-blue-600">
            YOUR LEARNING SPACE
        </p>

        <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">
            What would you like to study?
        </h1>

        <p class="mt-2 text-slate-500">
            Pick up where you left off or start something new.
        </p>
    </div>



    {{-- Main learning section --}}
    <section class="relative overflow-hidden rounded-3xl bg-slate-900 p-7 sm:p-9">

        <div class="relative z-10 max-w-xl">

            <p class="text-sm font-semibold tracking-wider text-blue-400">
                VOCABULARY PRACTICE
            </p>

            <h2 class="mt-4 text-3xl font-bold tracking-tight text-white">
                Ready to learn some Korean?
            </h2>

            <p class="mt-2 leading-7 text-slate-400">
                Choose how many words you want to study in this session.
            </p>

            <form action="{{ route('vocabulary.learn') }}" method="GET" class="mt-7">

                <div class="flex flex-wrap gap-3">

                    @foreach ([5, 10, 20, 30] as $count)
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="words"
                                value="{{ $count }}"
                                class="peer sr-only"
                                {{ $count === 10 ? 'checked' : '' }}
                            >

                            <span class="flex min-w-[76px] flex-col items-center rounded-xl border border-white/15 bg-white/5 px-5 py-3 text-white transition hover:bg-white/10 peer-checked:border-blue-400 peer-checked:bg-blue-500/20 peer-checked:ring-1 peer-checked:ring-blue-400">
                                <span class="text-xl font-bold">{{ $count }}</span>
                                <span class="mt-0.5 text-xs text-slate-400">words</span>
                            </span>
                        </label>
                    @endforeach

                </div>

                <button
                    type="submit"
                    class="mt-6 inline-flex items-center gap-3 rounded-xl bg-white px-6 py-3.5 font-semibold text-slate-900 transition hover:bg-blue-50"
                >
                    Start learning
                    <i class="fa-solid fa-arrow-right text-sm"></i>
                </button>

            </form>

        </div>

        <div class="pointer-events-none absolute -right-12 -top-16 hidden h-80 w-80 items-center justify-center rounded-full border border-white/10 md:flex">
            <div class="flex h-60 w-60 items-center justify-center rounded-full border border-white/10">
                <div class="flex h-40 w-40 items-center justify-center rounded-full bg-white/5">
                    <i class="fa-solid fa-language text-7xl text-white/15"></i>
                </div>
            </div>
        </div>

    </section>



    {{-- Other study options --}}
    <section>
        <div class="mb-4">
            <h2 class="text-lg font-bold text-slate-900">
                Explore other activities
            </h2>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">

            <a href="{{ route('grammar.learn', ['grammar' => 1]) }}"
               class="group rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-blue-200 hover:shadow-sm">

                <div class="flex items-center justify-between">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-violet-50 text-violet-600">
                        <i class="fa-solid fa-spell-check text-lg"></i>
                    </div>

                    <i class="fa-solid fa-arrow-up-right-from-square text-sm text-slate-300 transition group-hover:text-blue-600"></i>
                </div>

                <h3 class="mt-4 font-bold text-slate-900">
                    Korean Grammar
                </h3>

                <p class="mt-1 text-sm leading-6 text-slate-500">
                    Understand grammar patterns and see how they're used in sentences.
                </p>
            </a>


            <a href="{{ route('quiz.index') }}"
               class="group rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-blue-200 hover:shadow-sm">

                <div class="flex items-center justify-between">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                        <i class="fa-solid fa-clipboard-question text-lg"></i>
                    </div>

                    <i class="fa-solid fa-arrow-up-right-from-square text-sm text-slate-300 transition group-hover:text-blue-600"></i>
                </div>

                <h3 class="mt-4 font-bold text-slate-900">
                    Take a Quiz
                </h3>

                <p class="mt-1 text-sm leading-6 text-slate-500">
                    Test what you know with recommended or custom quizzes.
                </p>
            </a>

        </div>
    </section>


{{-- Learning progress --}}
<section>
    <div class="mb-5">
        <h2 class="text-lg font-bold text-slate-900">
            Your learning progress
        </h2>
        <p class="mt-1 text-sm text-slate-500">
            See how much you've completed so far.
        </p>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 space-y-7">

        {{-- Vocabulary --}}
        <div>
            <div class="mb-3 flex items-center justify-between">
                <div>
                    <h3 class="font-semibold text-slate-800">Vocabulary</h3>
                    <p class="mt-1 text-sm text-slate-500">
                        {{ $learnedWords }} of {{ $totalWords }} words learned
                    </p>
                </div>

                <span class="text-sm font-bold text-blue-600">
                    {{ $totalWords > 0 ? round(($learnedWords / $totalWords) * 100) : 0 }}%
                </span>
            </div>

            <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                <div
                    class="h-full rounded-full bg-blue-600 transition-all"
                    style="width: {{ $totalWords > 0 ? min(100, ($learnedWords / $totalWords) * 100) : 0 }}%"
                ></div>
            </div>
        </div>

        {{-- Grammar --}}
        <div>
            <div class="mb-3 flex items-center justify-between">
                <div>
                    <h3 class="font-semibold text-slate-800">Grammar</h3>
                    <p class="mt-1 text-sm text-slate-500">
                        {{ $completedGrammar }} of {{ $totalGrammar }} lessons completed
                    </p>
                </div>

                <span class="text-sm font-bold text-violet-600">
                    {{ $totalGrammar > 0 ? round(($completedGrammar / $totalGrammar) * 100) : 0 }}%
                </span>
            </div>

            <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                <div
                    class="h-full rounded-full bg-violet-500 transition-all"
                    style="width: {{ $totalGrammar > 0 ? min(100, ($completedGrammar / $totalGrammar) * 100) : 0 }}%"
                ></div>
            </div>
        </div>

        {{-- Bookmarks --}}
        <div class="flex items-center justify-between border-t border-slate-100 pt-5">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                    <i class="fa-solid fa-bookmark"></i>
                </div>

                <div>
                    <p class="font-semibold text-slate-800">Saved words</p>
                    <p class="text-xs text-slate-500">Your bookmarked vocabulary</p>
                </div>
            </div>

            <span class="text-xl font-bold text-slate-900">
                {{ $bookmarkedWords }}
            </span>
        </div>

    </div>
</section>


    {{-- Latest quiz --}}
    <section>
        <h2 class="mb-4 text-lg font-bold text-slate-900">
            Recent quiz
        </h2>

        <div class="rounded-2xl border border-slate-200 bg-white p-5">

            @if($latestQuiz)

                <div class="flex items-center justify-between gap-4">

                    <div>
                        <p class="text-sm text-slate-500">
                            Your latest result
                        </p>

                        <p class="mt-1 text-2xl font-bold text-slate-900">
                            {{ $latestQuiz->score }}
                            <span class="text-base font-medium text-slate-400">
                                / {{ $latestQuiz->total_questions }}
                            </span>
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            {{ \Carbon\Carbon::parse($latestQuiz->completed_at)->format('M d, Y') }}
                        </p>
                    </div>

                    <a href="{{ route('quiz.index') }}"
                       class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                        Practice again
                    </a>

                </div>

            @else

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="font-semibold text-slate-800">
                            No quiz results yet
                        </p>

                        <p class="mt-1 text-sm text-slate-500">
                            Complete a quiz to see your results here.
                        </p>
                    </div>

                    <a href="{{ route('quiz.index') }}"
                       class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700">
                        Take your first quiz
                    </a>
                </div>

            @endif

        </div>
    </section>

</div>

@endsection