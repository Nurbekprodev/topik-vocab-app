
@extends('layouts.app')

@section('title', 'Vocabulary')

@section('content')
<div class="min-h-screen bg-slate-50/70 pb-10">
    <div class="mx-auto max-w-3xl px-4 py-6 sm:px-6 sm:py-10">

        {{-- Header --}}
        <header class="mb-7">
            <p class="mb-2 text-xs font-semibold uppercase tracking-[0.18em] text-indigo-600">
                Build your Korean
            </p>

            <div class="flex items-end justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold tracking-tight text-slate-900">
                        Vocabulary
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Learn new words, one at a time.
                    </p>
                </div>

                <div class="shrink-0 rounded-xl border border-slate-200 bg-white px-3 py-2 text-right">
                    <p class="text-xs text-slate-500">Total words</p>
                    <p id="total-count" class="text-lg font-bold text-slate-900">
                        {{ $totalWords }}
                    </p>
                </div>
            </div>
        </header>

       
        {{-- Search --}}
        <form action="{{ route('vocabulary.index') }}" method="GET" id="vocab-search-form" class="relative mb-5">

            <i class="fa-solid fa-magnifying-glass pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-slate-400"></i>

            <input
                id="vocab-search"
                type="text"
                name="q"
                value="{{ request('q') }}"
                placeholder="Search Korean or English..."
                autocomplete="off"
                class="w-full rounded-2xl border border-slate-200 bg-white py-3.5 pl-11 pr-11 text-sm text-slate-900 outline-none focus:border-indigo-400 focus:ring-4 focus:ring-indigo-50"
            />

            @if(request('filter'))
                <input type="hidden" name="filter" value="{{ request('filter') }}">
            @endif

            <button
                id="clear-search"
                type="button"
                class="absolute right-3 top-1/2 hidden -translate-y-1/2 rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-700"
                aria-label="Clear search"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>

        </form>



        {{-- Filters --}}
        <div id="filter-tags" class="mb-6 flex flex-wrap gap-2">

            @php
                $filters = [
                    'all' => 'All',
                    'topik 1' => 'TOPIK 1',
                    'topik 2' => 'TOPIK 2',
                    'noun' => 'Noun',
                    'verb' => 'Verb',
                    'adjective' => 'Adjective',
                ];

                $activeFilter = request('filter', 'all');
            @endphp

            @foreach ($filters as $value => $label)
                <a
                    href="{{ request()->fullUrlWithQuery([
                        'filter' => $value,
                        'page' => 1,
                    ]) }}"
                    aria-current="{{ $activeFilter === $value ? 'page' : 'false' }}"
                    class="rounded-full border px-4 py-2 text-sm font-medium transition
                        {{ $activeFilter === $value
                            ? 'border-indigo-600 bg-indigo-600 text-white shadow-sm'
                            : 'border-slate-200 bg-white text-slate-600 hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-600' }}"
                >
                    {{ $label }}
                </a>
            @endforeach

        </div>


        {{-- Results summary --}}
        <div class="mb-3 flex items-center justify-between">
            <p class="text-sm font-semibold text-slate-700">
                Word list
            </p>

            <p class="text-xs text-slate-500">
                <span id="visible-count">{{ $vocabularies->count() }}</span> words
            </p>
        </div>

        {{-- Vocabulary list --}}
        <div id="vocab-list" class="space-y-3">

            @foreach ($vocabularies as $vocabulary)
                <article
                    data-vocab-card
                    data-korean="{{ $vocabulary->korean_word }}"
                    data-english="{{ $vocabulary->english_meaning }}"
                    data-level="{{ strtolower(str_replace(['_', '-'], ' ', $vocabulary->level)) }}"
                    data-type="{{ strtolower($vocabulary->word_type) }}"
                    class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white transition duration-200 hover:border-indigo-200 hover:shadow-md"
                >
                    {{-- Main card --}}
                    <div class="flex items-start gap-3 p-4 sm:p-5">

                        <button
                            type="button"
                            data-expand
                            class="flex min-w-0 flex-1 items-start gap-3 text-left"
                            aria-expanded="false"
                        >
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                                <i class="fa-solid fa-language text-lg"></i>
                            </span>

                            <span class="min-w-0 flex-1 pt-0.5">
                                <span class="block break-words text-xl font-bold tracking-tight text-slate-900">
                                    {{ $vocabulary->korean_word }}
                                </span>

                                <span class="mt-1 block text-sm leading-5 text-slate-500">
                                    {{ $vocabulary->english_meaning }}
                                </span>
                            </span>

                            <span class="mt-1 shrink-0 p-1 text-slate-400 transition-transform duration-200" data-chevron>
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </span>
                        </button>

                        {{-- Bookmark --}}
                        <button
                            type="button"
                            data-bookmark
                            aria-pressed="false"
                            aria-label="Bookmark {{ $vocabulary->korean_word }}"
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl text-slate-400 transition hover:bg-indigo-50 hover:text-indigo-600"
                        >
                            <i class="fa-regular fa-bookmark text-lg" data-bookmark-icon></i>
                        </button>
                    </div>

                    {{-- Tags --}}
                    <div class="flex flex-wrap items-center gap-2 px-4 pb-4 pl-[4.25rem] sm:px-5 sm:pb-5 sm:pl-[4.75rem]">
                        <span class="rounded-lg bg-indigo-50 px-2.5 py-1 text-xs font-medium text-indigo-700">
                            {{ $vocabulary->level }}
                        </span>

                        <span class="rounded-lg bg-amber-50 px-2.5 py-1 text-xs font-medium capitalize text-amber-700">
                            {{ $vocabulary->word_type }}
                        </span>
                    </div>

                    {{-- Expandable details --}}
                    <div data-details class="hidden border-t border-slate-100 bg-slate-50/70 px-4 py-4 sm:px-5">
                        <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Word details
                        </p>

                        <div class="grid grid-cols-2 gap-3">
                            <div class="rounded-xl border border-slate-200/70 bg-white p-3">
                                <p class="mb-1 text-xs text-slate-400">Korean</p>
                                <p class="break-words text-sm font-semibold text-slate-800">
                                    {{ $vocabulary->korean_word }}
                                </p>
                            </div>

                            <div class="rounded-xl border border-slate-200/70 bg-white p-3">
                                <p class="mb-1 text-xs text-slate-400">English meaning</p>
                                <p class="break-words text-sm font-medium text-slate-800">
                                    {{ $vocabulary->english_meaning }}
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach

            <div class="mt-6">
                {{ $vocabularies->links() }}
            </div>
        </div>

        {{-- Empty state --}}
        <div id="empty-state" class="hidden rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-12 text-center">
            <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                <i class="fa-solid fa-magnifying-glass text-lg"></i>
            </div>

            <h2 class="font-semibold text-slate-800">
                No words found
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Try another search or change your filter.
            </p>

            <button
                id="reset-filters"
                type="button"
                class="mt-5 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-700"
            >
                Clear filters
            </button>
        </div>

    </div>
</div>

@endsection
