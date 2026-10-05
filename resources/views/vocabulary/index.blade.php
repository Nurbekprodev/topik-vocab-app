@extends('layouts.app')

@section('title', 'Vocabulary')

@section('content')
<div class="p-4">

    <h1 class="text-2xl font-bold mb-4">
        Vocabulary
    </h1>

    <div class="space-y-4">
        <form action="" method="GET" class="w-full relative">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>

            <input 
                type="text" 
                placeholder="Search Korean or English..." 
                class="border-2 p-2 w-full rounded-lg border-gray-300 focus:border-blue-700 focus:outline-none pl-10 ">
        </form>

        <div id="tags" class="flex gap-2 flex-wrap" >
            <span class="bg-blue-700 rounded-full text-white text-sm p-1 pr-3 pl-3">All</span>
            <span class="rounded-full border-2 border-gray-300 text-gray-700 text-sm p-1 pr-3 pl-3 hover:bg-gray-100 ">TOPIK 1</span>
            <span class="rounded-full border-2 border-gray-300 text-gray-700 text-sm p-1 pr-3 pl-3 hover:bg-gray-100 ">TOPIK 2</span>
            <span class="rounded-full border-2 border-gray-300 text-gray-700 text-sm p-1 pr-3 pl-3 hover:bg-gray-100 ">Noun</span>
            <span class="rounded-full border-2 border-gray-300 text-gray-700 text-sm p-1 pr-3 pl-3 hover:bg-gray-100 ">Verb</span>
            <span class="rounded-full border-2 border-gray-300 text-gray-700 text-sm p-1 pr-3 pl-3 hover:bg-gray-100 ">Adjective</span>
        </div>
    </div>

    <div class="space-y-3 mt-6">

        @foreach ($vocabularies as $vocabulary)

            <div class="bg-white rounded-xl shadow p-4 border border-gray-300 hover:shadow-md hover:border-blue-300 cursor-pointer transition " >

                <div class="flex flex-col gap-2">

                    <div class="flex justify-between">
                        <div>
                            <h2 class="font-bold text-2xl ">
                                {{ $vocabulary->korean_word }}
                            </h2>

                            <p class="text-gray-600">
                                {{ $vocabulary->english_meaning }}
                            </p>
                        </div>

                        <div>
                            <i class="fa-regular fa-bookmark text-gray-500 hover:text-blue-600 cursor-pointer "></i>
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <div class="space-x-2 ">
                            <span class="text-sm bg-blue-50 text-blue-500 px-2 py-1 rounded  ">
                                {{ $vocabulary->level }}
                            </span>

                            <span class="text-sm bg-orange-50 px-2 py-1 rounded text-orange-600 ">
                                {{ $vocabulary->word_type }}
                            </span>
                        </div>
                        <div>
                            <i class="fa-solid fa-chevron-down text-sm text-gray-500 "></i>
                        </div>
                    </div>
                    

                </div>

            </div>

        @endforeach

    </div>

</div>
@endsection