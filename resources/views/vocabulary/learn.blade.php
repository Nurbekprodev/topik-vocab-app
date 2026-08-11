@extends('layouts.app')

@section('title', 'Vocabulary Learning')

@section('content')

<h1>{{ $word->korean_word }}</h1>

<p>{{ $word->english_meaning }}</p>

@foreach($word->examples as $example)
    <p>{{ $example->korean_sentence }}</p>
    <p>{{ $example->english_translation }}</p>
@endforeach

<form action="{{ route('vocabulary.mark') }}" method="POST">
    @csrf
    <input type="hidden" name="vocabulary_id" value="{{ $word->id }}">
    <input type="hidden" name="status" value="known">

    <button type="submit">I Know</button>
</form>

<form action="{{ route('vocabulary.mark') }}" method="POST">
    @csrf
    <input type="hidden" name="vocabulary_id" value="{{ $word->id }}">
    <input type="hidden" name="status" value="learning">

    <button type="submit">I Don't Know</button>
</form>

<form action="{{ route('bookmarks.store') }}" method="POST">
    @csrf
    <input type="hidden" name="vocabulary_id" value="{{ $word->id }}">

    <button type="submit">Bookmark</button>
</form>

@endsection