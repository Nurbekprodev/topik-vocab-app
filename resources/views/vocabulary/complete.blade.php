
@extends('layouts.app')

@section('title', 'Session Complete')

@section('content')
<div class="mx-auto max-w-lg px-4 py-16 text-center">
    <div class="mb-5 text-5xl">🎉</div>

    <h1 class="mb-3 text-3xl font-bold text-gray-900">
        Session Complete!
    </h1>

    <p class="mb-8 text-gray-600">
        You finished {{ $totalWords }} words in this session.
        Great work!
    </p>

    <a
        href="{{ route('vocabulary.learn') }}?words=10"
        class="inline-block rounded-xl bg-blue-600 px-6 py-3 font-semibold text-white hover:bg-blue-700"
    >
        Start Another Session
    </a>

    <div class="mt-4">
        <a href="{{ route('vocabulary.index') }}"
           class="text-blue-600 hover:underline">
            Back to Dashboard
        </a>
    </div>
</div>
@endsection
