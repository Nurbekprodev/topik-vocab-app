@extends('layouts.app')

@section('title', 'Quiz')

@section('content')
    <h1>quiz Page</h1>

    <div class="flex flex-col">
        <a href="{{ route('quiz.recommended') }}">
            Recommended Quiz
        </a>

        <a href="{{ route('quiz.custom') }}">
            Custom Quiz
        </a>
    </div>

@endsection
