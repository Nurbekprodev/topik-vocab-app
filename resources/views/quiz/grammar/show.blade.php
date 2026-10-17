@extends('layouts.app')

@section('title', $quiz->title)

@section('content')
<div class="min-h-screen bg-white pb-10">

    <div class="mx-auto max-w-2xl px-5 pt-6 sm:px-8 sm:pt-10">

        {{-- Header --}}
        <header class="mb-8">
            <a href="{{ url()->previous() }}"
               class="mb-7 inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-slate-900">
                <svg class="h-4 w-4" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6"/>
                </svg>
                Back
            </a>

         

            <p class="mt-3 text-sm leading-6 text-slate-500">
                Choose the best answer for each question.
            </p>

            <div class="mt-5 flex items-center justify-between border-b border-slate-100 pb-4">
                <span class="text-sm text-slate-500">
                    {{ $quiz->questions->count() }} questions
                </span>

                <span class="text-xs font-medium text-slate-400">
                    Select one answer per question
                </span>
            </div>
        </header>

        {{-- Feedback messages --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl bg-emerald-50 px-4 py-3 text-sm leading-6 text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 rounded-xl bg-red-50 px-4 py-3 text-sm leading-6 text-red-700">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 rounded-xl bg-red-50 px-4 py-3 text-sm leading-6 text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Questions --}}
        <form action="{{ route('quiz.submit', $quiz) }}" method="POST">
            @csrf

            <div class="space-y-8">
                @foreach($quiz->questions as $question)
                    <fieldset class="min-w-0 border-b border-slate-100 pb-8">

                        <legend class="w-full">
                            <span class="mb-3 block text-xs font-semibold uppercase tracking-wider text-indigo-600">
                                Question {{ $loop->iteration }}
                            </span>

                            <span class="block text-lg font-semibold leading-7 text-slate-900">
                                {{ $question->question }}
                            </span>
                        </legend>

                        <div class="mt-5 space-y-3">
                            
 
                        @foreach([
                            'a' => $question->option_a,
                            'b' => $question->option_b,
                            'c' => $question->option_c,
                            'd' => $question->option_d,
                        ] as $letter => $option)

                            <label class="group flex cursor-pointer items-center gap-4 rounded-xl border border-slate-200 px-4 py-4 transition-all duration-200 hover:border-indigo-300 hover:bg-slate-50 has-[:checked]:border-indigo-500 has-[:checked]:bg-indigo-50/60">

                                <input
                                    type="radio"
                                    name="answers[{{ $question->id }}]"
                                    value="{{ $option }}"
                                    required
                                    class="sr-only"
                                >

                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-sm font-semibold text-slate-500 transition-colors group-hover:bg-indigo-100 group-hover:text-indigo-600 group-has-[:checked]:bg-indigo-600 group-has-[:checked]:text-white">
                                    {{ strtoupper($letter) }}
                                </span>

                                <span class="flex-1 text-sm leading-6 text-slate-700 transition-colors group-has-[:checked]:font-medium group-has-[:checked]:text-indigo-900">
                                    {{ $option }}
                                </span>

                            </label>

                        @endforeach


                        </div>

                    </fieldset>
                @endforeach
            </div>

            {{-- Submit --}}
            <div class="pt-7">
                <button
                    type="submit"
                    class="flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700 active:scale-[0.99]"
                >
                    Submit answers

                    <svg class="h-4 w-4" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/>
                        <path d="m12 5 7 7-7 7"/>
                    </svg>
                </button>

                <p class="mt-3 text-center text-xs leading-5 text-slate-400">
                    Review your selections before submitting.
                </p>
            </div>
        </form>

    </div>
</div>
@endsection
