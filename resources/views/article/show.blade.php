@extends('layouts.base')

@php

use Carbon\Carbon;

@endphp

@section('content')
    @foreach($articles as $article)
        <div class="mt-5">

            <!--Title-->
            <div class="text-center">
                <p class="text-sm md:text-base text-teal-500 font-bold">{{ ucfirst(Carbon::parse($article->created_at)->diffForHumans()) }}
                    <span class="text-gray-900">/</span> CATÉGORIE {{ strtoupper(App\Category::find($article->category_id)->title) }}
                </p>
                <h1 class="font-bold break-normal text-3xl md:text-5xl">{{ $article->title }}</h1>
            </div>

            <!--image-->
            <div class="w-full max-w-6xl mx-auto bg-white bg-cover mt-8 rounded" style="background-image:url('{{ $article->image }}'); height: 50vh;"></div>

            <!--Container-->
            <div class="max-w-5xl mx-auto -mt-32">
                <div class="mx-0 sm:mx-6">
                    <div class="bg-white w-full p-8 md:p-24 text-xl md:text-2xl text-gray-800 leading-normal shadow" style="font-family:Georgia,serif;">
                        {{ $article->description }}
                    </div>

                    <!--Author-->
                    <div class="flex w-full items-center font-sans p-8 md:p-24">
                        <img class="w-10 h-10 rounded-full mr-4" src="{{ App\User::getAvatar($article->user_id) }}" alt="Avatar of Author">
                        <div class="flex-1">
                            <p class="text-base font-bold text-base md:text-xl leading-none">{{ App\User::find($article->user_id)->name }}</p>
                            <p class="text-gray-600 text-xs md:text-base"></p>
                        </div>
                        <div class="justify-end">
                            <button class="bg-transparent border border-gray-500 hover:border-teal-500 text-xs text-gray-500 hover:text-teal-500 font-bold py-2 px-4 rounded-full">Read More</button>
                        </div>
                    </div>
                    <!--/Author-->

                    <div class="detail bg-white dark:bg-gray-800 rounded shadow px-5 py-4 mb-3 ">
                        @comments(['model' => $article])
                    </div>
                </div>


            </div>
        </div>
    @endforeach
@endsection




