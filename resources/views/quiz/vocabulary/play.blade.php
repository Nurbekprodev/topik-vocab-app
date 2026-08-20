@extends('layouts.app')

@section('title', 'Vocabulary Quiz')

@section('content')

<div class="max-w-3xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">
        Recommended Vocabulary Quiz
    </h1>

    <form method="POST" action="{{ route('quiz.vocabulary.result') }}">
        @csrf

        @foreach($questions as $index => $question)

            <div class="mb-8 p-5 border rounded-xl">

                <div class="mb-4">
                    <span class="text-sm text-gray-500">
                        Question {{ $index + 1 }}
                    </span>

                    <h2 class="text-xl font-semibold mt-2">
                        {{ $question['korean_word'] }}
                    </h2>
                </div>

                <input
                    type="hidden"
                    name="correct_answers[{{ $question['word_id'] }}]"
                    value="{{ $question['correct_answer'] }}"
                >

                @foreach($question['options'] as $option)

                    <label class="block mb-2">

                        <input
                            type="radio"
                            name="answers[{{ $question['word_id'] }}]"
                            value="{{ $option }}"
                        >

                        {{ $option }}

                    </label>

                @endforeach

            </div>

        @endforeach

        <button
            type="submit"
            class="px-6 py-3 bg-blue-600 text-white rounded-lg"
        >
            Submit Quiz
        </button>

    </form>

</div>

@endsection