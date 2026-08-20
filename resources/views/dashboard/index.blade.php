@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="max-w-6xl mx-auto p-6 space-y-8">

    {{-- Header --}}
    <div>
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <p class="text-gray-600 mt-1">
            Keep improving your Korean every day.
        </p>
    </div>

    {{-- Statistics --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        <div class="p-5 bg-white rounded-xl border">
            <p class="text-sm text-gray-500">Total Words</p>
            <p class="text-3xl font-bold mt-2">{{ $totalWords }}</p>
        </div>

        <div class="p-5 bg-white rounded-xl border">
            <p class="text-sm text-gray-500">Learned Words</p>
            <p class="text-3xl font-bold mt-2">{{ $learnedWords }}</p>
        </div>

        <div class="p-5 bg-white rounded-xl border">
            <p class="text-sm text-gray-500">Bookmarked Words</p>
            <p class="text-3xl font-bold mt-2">{{ $bookmarkedWords }}</p>
        </div>

        <div class="p-5 bg-white rounded-xl border">
            <p class="text-sm text-gray-500">Grammar Completed</p>
            <p class="text-3xl font-bold mt-2">{{ $completedGrammar }}</p>
        </div>

    </div>

    {{-- Continue Learning --}}
    <div>
        <h2 class="text-xl font-semibold mb-4">
            Continue Learning
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div class="p-5 bg-white rounded-xl border">
                <h3 class="font-semibold text-lg">
                    Vocabulary
                </h3>

                <p class="text-gray-600 mt-2">
                    Continue learning new vocabulary words.
                </p>

                <a
                    href="{{ route('vocabulary.learn') }}"
                    class="inline-block mt-4 px-4 py-2 rounded-lg bg-blue-600 text-white"
                >
                    Continue
                </a>
            </div>

            <div class="p-5 bg-white rounded-xl border">
                <h3 class="font-semibold text-lg">
                    Grammar
                </h3>

                <p class="text-gray-600 mt-2">
                    Continue studying Korean grammar.
                </p>

                <a
                    href="{{ route('grammar.learn', ['grammar' => 1]) }}"
                    class="inline-block mt-4 px-4 py-2 rounded-lg bg-blue-600 text-white"
                >
                    Continue
                </a>
            </div>

        </div>
    </div>

    {{-- Latest Quiz --}}
    <div>
        <h2 class="text-xl font-semibold mb-4">
            Latest Quiz
        </h2>

        <div class="p-5 bg-white rounded-xl border">

            @if($latestQuiz)

                <p class="text-gray-600">
                    Your latest score
                </p>

                <p class="text-3xl font-bold mt-2">
                    {{ $latestQuiz->score }} / {{ $latestQuiz->total_questions }}
                </p>

                <p class="text-sm text-gray-500 mt-2">
                    {{ \Carbon\Carbon::parse($latestQuiz->completed_at)->format('M d, Y') }}
                </p>

            @else

                <p class="text-gray-600">
                    You haven't completed a quiz yet.
                </p>

                <a
                    href="{{ route('quiz.index') }}"
                    class="inline-block mt-4 px-4 py-2 rounded-lg bg-blue-600 text-white"
                >
                    Take a Quiz
                </a>

            @endif

        </div>
    </div>

</div>

@endsection
