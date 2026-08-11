@extends('layouts.app')

@section('title', 'Bookmarks')

@section('content')

<h1>Bookmarks</h1>

@forelse($bookmarks as $bookmark)

    <div>
        <h3>{{ $bookmark->vocabulary->korean_word }}</h3>

        <p>{{ $bookmark->vocabulary->english_meaning }}</p>

        <p>{{ $bookmark->vocabulary->level }}</p>
    </div>

    <form action="{{ route('bookmarks.destroy', $bookmark) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">
            Remove Bookmark
        </button>
    </form>

@empty

    <p>No bookmarks yet.</p>

@endforelse

@endsection