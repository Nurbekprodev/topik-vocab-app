@extends('layouts.app')

@section('title', 'Learn Grammar')

@section('content')
<div class="max-w-4xl mx-auto p-6">

    @if(session('success'))
        <div class="mb-4 p-4 rounded bg-green-100 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if($grammar)

        <div class="bg-white rounded-xl shadow p-6">

            {{-- Title --}}
            <div class="mb-6">
                <span class="text-sm text-gray-500">
                    {{ $grammar->level }}
                </span>

                <h1 class="text-3xl font-bold mt-2">
                    {{ $grammar->title }}
                </h1>
            </div>

            {{-- Meaning --}}
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">
                    Meaning
                </h2>

                <p class="text-gray-700">
                    {{ $grammar->meaning }}
                </p>
            </div>

            {{-- Structure --}}
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">
                    Structure
                </h2>

                <p class="text-gray-700">
                    {{ $grammar->structure }}
                </p>
            </div>

            {{-- Explanation --}}
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">
                    Explanation
                </h2>

                <p class="text-gray-700">
                    {{ $grammar->explanation }}
                </p>
            </div>

            {{-- Rules --}}
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">
                    Rules
                </h2>

                <p class="text-gray-700">
                    {{ $grammar->rules }}
                </p>
            </div>

            {{-- Usage Notes --}}
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">
                    Usage Notes
                </h2>

                <p class="text-gray-700">
                    {{ $grammar->usage_notes }}
                </p>
            </div>

            {{-- Commonly Used With --}}
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">
                    Commonly Used With
                </h2>

                <p class="text-gray-700">
                    {{ $grammar->commonly_used_with }}
                </p>
            </div>

            {{-- Common Mistakes --}}
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">
                    Common Mistakes
                </h2>

                <p class="text-gray-700">
                    {{ $grammar->common_mistakes }}
                </p>
            </div>

            {{-- Examples --}}
            <div class="mb-8">
                <h2 class="text-lg font-semibold mb-4">
                    Example Sentences
                </h2>

                <div class="space-y-4">
                    @foreach($grammar->examples as $example)
                        <div class="border rounded-lg p-4">

                            <p class="font-medium">
                                {{ $example->korean_sentence }}
                            </p>

                            <p class="text-gray-600 mt-1">
                                {{ $example->english_translation }}
                            </p>

                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Quiz Button --}}
            <a href="{{ route('grammar.quiz', $grammar) }}"
               class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg">
                Take Quiz
            </a>

        </div>

    @else

        <div class="text-center py-20">
            <h2 class="text-2xl font-bold">
                🎉 Congratulations!
            </h2>

            <p class="mt-4 text-gray-600">
                You completed all grammar lessons.
            </p>
        </div>

    @endif

</div>
@endsection
