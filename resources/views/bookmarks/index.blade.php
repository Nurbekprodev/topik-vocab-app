
@extends('layouts.app')

@section('title', 'Bookmarks')

@section('content')
<div class="mx-auto max-w-3xl px-4 pb-28 pt-6 sm:px-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold tracking-tight text-slate-900">
            Bookmarks
        </h1>
        <p class="mt-1 text-sm text-slate-500">
            Your saved Korean words
        </p>
        <p class="mt-3 text-sm font-medium text-slate-600">
            {{ $bookmarks->count() }} saved {{ Str::plural('word', $bookmarks->count()) }}
        </p>
    </div>

    {{-- Word list --}}
    <div class="space-y-3">
        @forelse ($bookmarks as $bookmark)
            @if ($bookmark->vocabulary)
                <article class="rounded-2xl border border-slate-200 bg-white p-4 transition hover:border-indigo-200 hover:shadow-sm">

                    <div class="flex items-start justify-between gap-3">
                        <div class="min-w-0">
                            <h2 class="break-words text-lg font-bold text-slate-900">
                                {{ $bookmark->vocabulary->korean_word }}
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                {{ $bookmark->vocabulary->english_meaning }}
                            </p>

                            <div class="mt-3 flex flex-wrap gap-2">
                                <span class="rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700">
                                    {{ $bookmark->vocabulary->level }}
                                </span>

                                @if ($bookmark->vocabulary->word_type)
                                    <span class="rounded-md bg-slate-100 px-2 py-1 text-xs font-medium capitalize text-slate-600">
                                        {{ $bookmark->vocabulary->word_type }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Remove bookmark --}}
                        <form
                            action="{{ route('bookmarks.destroy', $bookmark) }}"
                            method="POST"
                            onsubmit="return confirm('Remove this bookmarked word?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                aria-label="Remove {{ $bookmark->vocabulary->korean_word }} from bookmarks"
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl text-indigo-600 transition hover:bg-red-50 hover:text-red-600"
                            >
                                <i class="fa-solid fa-bookmark"></i>
                            </button>
                        </form>
                    </div>

                </article>
            @endif
        @empty
            <div class="rounded-2xl border border-dashed border-slate-300 px-5 py-12 text-center">
                <i class="fa-regular fa-bookmark text-3xl text-slate-300"></i>

                <p class="mt-3 font-semibold text-slate-800">
                    No saved words yet
                </p>

                <p class="mt-1 text-sm text-slate-500">
                    Save words from your vocabulary list to find them here.
                </p>

                <a
                    href="{{ route('vocabulary.index') }}"
                    class="mt-4 inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-700"
                >
                    Browse vocabulary
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>
        @endforelse
    </div>

</div>
@endsection
