@extends('layouts.app')

@section('title', 'Vocabulary')

@section('content')
<div class="p-4">

    <h1 class="text-2xl font-bold mb-4">
        Vocabulary
    </h1>

    <div class="space-y-3">

        @foreach ($vocabularies as $vocabulary)

            <div class="bg-white rounded-xl shadow p-4">

                <div class="flex justify-between items-center">

                    <div>
                        <h2 class="font-bold text-lg">
                            {{ $vocabulary->korean_word }}
                        </h2>

                        <p class="text-gray-600">
                            {{ $vocabulary->english_meaning }}
                        </p>
                    </div>

                    <span class="text-sm bg-gray-100 px-2 py-1 rounded">
                        {{ $vocabulary->level }}
                    </span>

                </div>

            </div>

        @endforeach

    </div>

</div>
@endsection