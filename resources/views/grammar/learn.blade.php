@extends('layouts.app')

@section('title', 'Learn Grammar')

@section('content')
<div class="min-h-screen bg-white pb-10">

    <div class="mx-auto max-w-2xl px-5 pt-5 sm:px-8 sm:pt-8">

        {{-- Success message --}}
        @if(session('success'))
            <div class="mb-5 rounded-xl bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @if($grammar)

            {{-- Navigation --}}
            <div class="mb-8 flex items-center justify-between">
                <a href="{{ url()->previous() }}"
                   class="inline-flex items-center gap-2 py-2 text-sm font-medium text-slate-500 transition hover:text-slate-900">
                    <svg class="h-4 w-4" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6"/>
                    </svg>
                    Back
                </a>

                <span class="rounded-full bg-indigo-50 px-3 py-1.5 text-xs font-semibold text-indigo-700">
                    {{ $grammar->level }}
                </span>
            </div>

            {{-- Lesson title --}}
            <header class="mb-8">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.18em] text-indigo-600">
                    Grammar lesson
                </p>

                <h1 class="text-3xl font-bold leading-tight tracking-tight text-slate-900 sm:text-4xl">
                    {{ $grammar->title }}
                </h1>

                <p class="mt-4 text-base leading-7 text-slate-600">
                    {{ $grammar->meaning }}
                </p>
            </header>

            {{-- Structure --}}
            @if($grammar->structure)
                <section class="mb-8">
                    <h2 class="mb-3 text-sm font-semibold text-slate-900">
                        Structure
                    </h2>

                    <p class="rounded-lg bg-slate-50 px-4 py-3 font-mono text-sm leading-6 text-indigo-700">
                        {{ $grammar->structure }}
                    </p>
                </section>
            @endif

            {{-- Explanation --}}
            @if($grammar->explanation)
                <section class="mb-8">
                    <h2 class="mb-3 text-sm font-semibold text-slate-900">
                        Explanation
                    </h2>

                    <p class="whitespace-pre-line text-sm leading-7 text-slate-600 sm:text-base">
                        {{ $grammar->explanation }}
                    </p>
                </section>
            @endif

            {{-- Rules --}}
            @if($grammar->rules)
                <section class="mb-8">
                    <h2 class="mb-3 text-sm font-semibold text-slate-900">
                        Rules
                    </h2>

                    <p class="whitespace-pre-line text-sm leading-7 text-slate-600 sm:text-base">
                        {{ $grammar->rules }}
                    </p>
                </section>
            @endif

            {{-- Usage notes --}}
            @if($grammar->usage_notes)
                <section class="mb-8">
                    <h2 class="mb-3 text-sm font-semibold text-slate-900">
                        Usage notes
                    </h2>

                    <p class="whitespace-pre-line text-sm leading-7 text-slate-600 sm:text-base">
                        {{ $grammar->usage_notes }}
                    </p>
                </section>
            @endif

            {{-- Common expressions --}}
            @if($grammar->commonly_used_with)
                <section class="mb-8">
                    <h2 class="mb-3 text-sm font-semibold text-slate-900">
                        Common expressions
                    </h2>

                    <p class="whitespace-pre-line text-sm leading-7 text-slate-600 sm:text-base">
                        {{ $grammar->commonly_used_with }}
                    </p>
                </section>
            @endif

            {{-- Common mistakes --}}
            @if($grammar->common_mistakes)
                <section class="mb-8 border-l-2 border-amber-400 pl-4">
                    <h2 class="mb-2 text-sm font-semibold text-slate-900">
                        Common mistakes
                    </h2>

                    <p class="whitespace-pre-line text-sm leading-7 text-slate-600 sm:text-base">
                        {{ $grammar->common_mistakes }}
                    </p>
                </section>
            @endif

            {{-- Example sentences --}}
            <section class="mb-10">
                <div class="mb-2 flex items-center justify-between">
                    <h2 class="text-lg font-bold tracking-tight text-slate-900">
                        Example sentences
                    </h2>

                    <span class="text-xs text-slate-400">
                        {{ $grammar->examples->count() }} examples
                    </span>
                </div>

                <p class="mb-5 text-sm leading-6 text-slate-500">
                    Listen, read, and learn how the grammar is used naturally.
                </p>

                <div>
                    @forelse($grammar->examples as $index => $example)
                        <article class="border-t border-slate-100 py-5">
                            <div class="flex items-start gap-3">
                                <p class="min-w-0 flex-1 break-keep text-base font-semibold leading-7 text-slate-900 sm:text-lg">
                                    {{ $example->korean_sentence }}
                                </p>

                                <button
                                    type="button"
                                    onclick="speakKorean(this)"
                                    data-text="{{ $example->korean_sentence }}"
                                    aria-label="Listen to Korean sentence {{ $index + 1 }}"
                                    title="Listen to sentence"
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-indigo-600 transition hover:bg-indigo-50 active:scale-95"
                                >
                                    <svg class="h-5 w-5" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor"
                                         stroke-width="1.8" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path d="M11 5 6 9H3v6h3l5 4V5Z"/>
                                        <path d="M15.5 8.5a5 5 0 0 1 0 7"/>
                                        <path d="M19 5a10 10 0 0 1 0 14"/>
                                    </svg>
                                </button>
                            </div>

                            <p class="mt-2 pr-2 text-sm leading-6 text-slate-500">
                                {{ $example->english_translation }}
                            </p>
                        </article>
                    @empty
                        <p class="border-t border-slate-100 py-5 text-sm text-slate-500">
                            Example sentences will be added soon.
                        </p>
                    @endforelse
                </div>
            </section>

            {{-- Quiz action --}}
            <section class="border-t border-slate-200 pt-6">
                <p class="text-lg font-bold text-slate-900">
                    Ready to practice?
                </p>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Test your understanding of this grammar pattern.
                </p>

                <a href="{{ route('grammar.quiz', $grammar) }}"
                   class="mt-5 flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700 active:scale-[0.99]">
                    Take the quiz

                    <svg class="h-4 w-4" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/>
                        <path d="m12 5 7 7-7 7"/>
                    </svg>
                </a>
            </section>

        @else

            {{-- All lessons completed --}}
            <div class="flex min-h-[65vh] flex-col items-center justify-center text-center">
                <div class="text-5xl">🎉</div>

                <h1 class="mt-6 text-2xl font-bold tracking-tight text-slate-900">
                    All lessons completed!
                </h1>

                <p class="mt-3 max-w-sm text-sm leading-7 text-slate-500">
                    You've reached the end of your grammar lessons.
                    Keep practicing to remember what you've learned.
                </p>

                <a href="{{ url('/') }}"
                   class="mt-7 inline-flex min-h-12 items-center justify-center rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700">
                    Back to home
                </a>
            </div>

        @endif

    </div>
</div>

{{-- Korean text-to-speech --}}
<script>
    function speakKorean(button) {
        if (!('speechSynthesis' in window)) {
            alert('Audio playback is not supported in this browser.');
            return;
        }

        window.speechSynthesis.cancel();

        const utterance = new SpeechSynthesisUtterance(
            button.dataset.text
        );

        utterance.lang = 'ko-KR';
        utterance.rate = 0.85;
        utterance.pitch = 1;

        const voices = window.speechSynthesis.getVoices();
        const koreanVoice = voices.find(voice =>
            voice.lang.toLowerCase().startsWith('ko')
        );

        if (koreanVoice) {
            utterance.voice = koreanVoice;
        }

        window.speechSynthesis.speak(utterance);
    }
</script>
@endsection
