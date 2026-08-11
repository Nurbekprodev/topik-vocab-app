@extends('layouts.app')

@section('title', 'Custom Quiz')

@section('content')

<div class="max-w-xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">
        Custom Vocabulary Quiz
    </h1>

    <form method="POST" action="{{ route('quiz.vocabulary.custom.start') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-2 font-medium">
                TOPIK Level
            </label>

            <select name="level" class="w-full border rounded-lg p-3">
                <option>TOPIK 1</option>
                <option>TOPIK 2</option>
                <option>TOPIK 3</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">
                Difficulty
            </label>

            <select name="difficulty" class="w-full border rounded-lg p-3">
                <option>Easy</option>
                <option>Medium</option>
                <option>Hard</option>
            </select>
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-medium">
                Question Count
            </label>

            <select name="question_count" class="w-full border rounded-lg p-3">
                <option>5</option>
                <option>10</option>
                <option>20</option>
            </select>
        </div>

        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg"
        >
            Start Quiz
        </button>

    </form>

</div>

@endsection