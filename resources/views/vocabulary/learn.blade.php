@extends('layouts.app')

@section('title', 'Vocabulary Learning')

@section('content')

<div class="flex flex-col w-full items-center h-screen">
    <div>
        <div>
            <h1>{{ $word->korean_word }}</h1>
                <span class="text-sm bg-blue-50 text-blue-500 px-2 py-1 rounded  ">
                    {{ $word->level }}
                </span>

                <span class="text-sm bg-orange-50 px-2 py-1 rounded text-orange-600 ">
                    {{ $word->word_type }}
                </span>
        </div>

        <span>
            <i class="fa-solid fa-volume-high"></i>
        </span>

        <div>
            <p>{{ $word->english_meaning }}</p>

            @foreach($word->examples as $example)
                <p>{{ $example->korean_sentence }}</p>
                <p>{{ $example->english_translation }}</p>
            @endforeach
        </div>
    </div>


    <div>
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

            <button type="submit"><i class="fa-regular fa-bookmark text-gray-500 hover:text-blue-600 cursor-pointer "></i></button>
        </form>
    </div>
</div>



@endsection