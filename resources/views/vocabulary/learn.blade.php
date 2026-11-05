
@extends('layouts.app')

@section('title', 'Learn Vocabulary')

@section('content')
<div class="min-h-screen bg-slate-50 text-slate-900 pb-52 sm:pb-48">


{{-- Top progress header --}}
<header class="sticky top-0 z-40 border-b border-slate-200/80 bg-white/95 backdrop-blur">
    <div class="mx-auto flex max-w-xl items-center gap-4 px-4 py-4">

        <!-- <button
            type="button"
            onclick="history.back()"
            aria-label="Go back"
            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-slate-600 transition hover:bg-slate-100"
        >
            <i class="fa-solid fa-arrow-left text-lg"></i>
        </button> -->

        <div class="min-w-0 flex-1">
            <div class="mb-2 flex justify-between text-sm text-gray-500">
                <span>Learning session</span>
                <span>Word {{ $currentNumber }} of {{ $totalWords }}</span>
            </div>

            <div class="h-2 w-full overflow-hidden rounded-full bg-gray-200">
                <div
                    class="h-full rounded-full bg-blue-600 transition-all duration-300"
                    style="width: {{ ($currentNumber / $totalWords) * 100 }}%"
                ></div>
            </div>
        </div>

    </div>
</header>


    {{-- Main learning area --}}
    <main class="mx-auto flex w-full max-w-xl flex-col px-4 pt-10 sm:pt-14">

        {{-- Word card --}}
        <section class="flex flex-col items-center text-center">

            <div class="mb-5 flex items-center gap-2">
                <span class="rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold uppercase tracking-wide text-blue-700">
                    {{ $word->level }}
                </span>

                <span class="rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                    {{ $word->word_type }}
                </span>
            </div>

            <h1
                class="break-words text-5xl font-extrabold leading-tight tracking-tight text-slate-900 sm:text-6xl"
                data-korean-word="{{ $word->korean_word }}"
            >
                {{ $word->korean_word }}
            </h1>

            <!-- <p class="mt-3 text-sm text-slate-500">
                Read the word, then try to remember its meaning.
            </p> -->

            {{-- Pronunciation --}}
            <button
                type="button"
                data-play-audio
                data-word="{{ $word->korean_word }}"
                aria-label="Play Korean pronunciation"
                class="mt-7 flex h-16 w-16 items-center justify-center rounded-full bg-blue-50 text-blue-700 ring-1 ring-blue-100 transition hover:bg-blue-100 active:scale-95"
            >
                <i class="fa-solid fa-volume-high text-2xl"></i>
            </button>

            <span class="mt-2 text-xs font-medium text-slate-400">
                Listen to pronunciation
            </span>
        </section>

        {{-- Reveal meaning --}}
        <section class="mt-10">
            <button
                type="button"
                id="show-meaning-btn"
                aria-expanded="false"
                aria-controls="meaning-section"
                class="flex w-full items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 py-4 font-bold text-slate-700 shadow-sm transition hover:border-blue-200 hover:bg-blue-50/50 active:scale-[0.99]"
            >
                <i class="fa-regular fa-eye text-blue-600"></i>
                <span>Show Meaning</span>
            </button>


            <div
                id="meaning-section"
                data-meaning-section
                hidden
                class="mt-5 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8"
            >
                {{-- English meaning --}}
                <div class="text-center">
                    <p class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-blue-600">
                        English meaning
                    </p>

                    <h2 class="text-3xl font-extrabold tracking-tight text-slate-900">
                        {{ $word->english_meaning }}
                    </h2>
                </div>

                {{-- Divider --}}
                <div class="my-8 border-t border-slate-100"></div>

                {{-- Example sentences --}}
                <div>
                    <div class="mb-6 flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                            <i class="fa-solid fa-book-open"></i>
                        </div>

                        <div>
                            <h3 class="font-bold text-slate-900">
                                Example sentences
                            </h3>
                            <!-- <p class="text-xs text-slate-500">
                                Learn the word in context
                            </p> -->
                        </div>
                    </div>

                    <div class="space-y-5">
                        @forelse ($word->examples as $example)
                            @if (!$loop->first)
                                <div class="border-t border-slate-100"></div>
                            @endif

                            <article class="space-y-2">
                                <div class="flex items-start gap-3">
                                    <span class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-slate-100 text-xs font-bold text-slate-500">
                                        {{ $loop->iteration }}
                                    </span>

                                    <p class="text-base font-semibold leading-7 text-slate-800">
                                        {{ $example->korean_sentence }}
                                    </p>
                                </div>

                                <p class="pl-9 text-sm leading-6 text-slate-500">
                                    {{ $example->english_translation }}
                                </p>

                                <div class="pl-9">
                                    <button
                                        type="button"
                                        data-play-audio
                                        data-word="{{ $example->korean_sentence }}"
                                        aria-label="Listen to example sentence {{ $loop->iteration }}"
                                        class="inline-flex items-center gap-2 rounded-lg px-2 py-1 text-xs font-semibold text-blue-700 transition hover:bg-blue-50"
                                    >
                                        <i class="fa-solid fa-volume-high"></i>
                                        Listen
                                    </button>
                                </div>
                            </article>
                        @empty
                            <p class="text-sm leading-6 text-slate-500">
                                No example sentences available yet.
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>

        </section>
    </main>

    {{-- Fixed bottom actions --}}
    <footer class="fixed inset-x-0 bottom-16 z-40 border-t border-slate-200 bg-white/95 shadow-[0_-8px_30px_rgba(15,23,42,0.04)] backdrop-blur">
        <div class="mx-auto max-w-xl px-4 pb-5 pt-4">

            {{-- Bookmark --}}
            <div class="mb-4 flex justify-center">
                <form action="{{ route('bookmarks.store') }}" method="POST">
                    @csrf

                    <input
                        type="hidden"
                        name="vocabulary_id"
                        value="{{ $word->id }}"
                    >

                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 rounded-xl px-4 py-2 text-sm font-semibold text-slate-500 transition hover:bg-blue-50 hover:text-blue-700"
                    >
                        <i class="fa-regular fa-bookmark"></i>
                        Save word
                    </button>
                </form>
            </div>

            {{-- Learning status --}}
            <div class="grid grid-cols-2 gap-3">
                <form action="{{ route('vocabulary.mark') }}" method="POST">
                    @csrf

                    <input
                        type="hidden"
                        name="vocabulary_id"
                        value="{{ $word->id }}"
                    >

                    <input
                        type="hidden"
                        name="status"
                        value="learning"
                    >

                    <button
                        type="submit"
                        class="flex min-h-14 w-full items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-3 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-50 active:scale-[0.98]"
                    >
                        <i class="fa-solid fa-rotate-left text-slate-400"></i>
                        I Don't Know
                    </button>
                </form>

                <form action="{{ route('vocabulary.mark') }}" method="POST">
                    @csrf

                    <input
                        type="hidden"
                        name="vocabulary_id"
                        value="{{ $word->id }}"
                    >

                    <input
                        type="hidden"
                        name="status"
                        value="known"
                    >

                    <button
                        type="submit"
                        class="flex min-h-14 w-full items-center justify-center gap-2 rounded-2xl bg-blue-600 px-3 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 active:scale-[0.98]"
                    >
                        I Know
                        <i class="fa-solid fa-check"></i>
                    </button>
                </form>
            </div>

        </div>
    </footer>

</div>
@endsection
