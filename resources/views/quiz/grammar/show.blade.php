@extends('layouts.app')

@section('content')

<h1>{{ $quiz->title }}</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@if(session('error'))
    <p>{{ session('error') }}</p>
@endif

<form action="{{ route('quiz.submit', $quiz) }}" method="POST">
    @csrf

    @foreach($quiz->questions as $question)

        <h3>{{ $question->question }}</h3>

        <label>
            <input type="radio" name="answer" value="{{ $question->option_a }}">
            {{ $question->option_a }}
        </label>

        <br>

        <label>
            <input type="radio" name="answer" value="{{ $question->option_b }}">
            {{ $question->option_b }}
        </label>

        <br>

        <label>
            <input type="radio" name="answer" value="{{ $question->option_c }}">
            {{ $question->option_c }}
        </label>

        <br>

        <label>
            <input type="radio" name="answer" value="{{ $question->option_d }}">
            {{ $question->option_d }}
        </label>

    @endforeach

    <br>

    <button type="submit">
        Submit Answer
    </button>

</>

@endsection