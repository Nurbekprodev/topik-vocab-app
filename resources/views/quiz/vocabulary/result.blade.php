@extends('layouts.app')

@section('title', 'Quiz Result')

@section('content')

<div class="max-w-xl mx-auto p-6 text-center">

    <h1 class="text-3xl font-bold mb-6">
        Quiz Result
    </h1>

    <div class="text-5xl font-bold mb-4">
        {{ $score }} / {{ $total }}
    </div>

    <p class="text-gray-600 mb-6">
        You answered {{ $score }} out of {{ $total }} correctly.
    </p>

    <a
        href="{{ route('quiz.index') }}"
        class="px-6 py-3 bg-blue-600 text-white rounded-lg"
    >
        Back to Quiz Home
    </a>

</div>

@endsection