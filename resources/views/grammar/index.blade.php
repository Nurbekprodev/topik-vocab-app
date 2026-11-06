@extends('layouts.app')

@section('title', 'Grammar')

@section('content')

<div class="max-w-3xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        Grammar
    </h1>

    {{-- Level Selection --}}
    <div class="flex gap-2 mb-8 overflow-x-auto">

        @foreach($levels as $level)

            <a
                href="{{ route('grammar.index', ['level' => $level]) }}"
                class="px-4 py-2 rounded-lg whitespace-nowrap
                    {{ $selectedLevel === $level
                        ? 'bg-blue-600 text-white'
                        : 'bg-gray-100 text-gray-700' }}"
            >
                {{ $level }}
            </a>

        @endforeach

    </div>

    {{-- Grammar Path --}}
    <div class="space-y-4">

        @foreach($grammars as $grammar)

            <div class="p-5 rounded-xl border
                {{ $grammar->is_completed
                    ? 'bg-green-50 border-green-200'
                    : ($grammar->is_unlocked
                        ? 'bg-white border-blue-200'
                        : 'bg-gray-100 border-gray-200') }}">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-gray-500">
                            Lesson {{ $grammar->order_number }}
                        </p>

                        <h2 class="text-xl font-semibold mt-1">
                            {{ $grammar->title }}
                        </h2>

                        <p class="text-gray-600 mt-1">
                            {{ $grammar->meaning }}
                        </p>
                    </div>

                    <div>

                        @if($grammar->is_completed)

                            <span class="text-green-600 font-semibold">
                                ✓ Completed
                            </span>

                        @elseif($grammar->is_unlocked)

                            <a
                                href="{{ route('grammar.learn', ['grammar' => $grammar->id]) }}"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg"
                            >
                                Start
                            </a>

                        @else

                            <span class="text-gray-400 text-xl">
                                🔒
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        @endforeach

         <!-- pagination  -->
        <div class="mt-6">
            {{ $grammars->links() }}
        </div>

    </div>

</div>

@endsection