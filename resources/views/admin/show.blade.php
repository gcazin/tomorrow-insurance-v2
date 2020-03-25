@extends('layouts.base')

@section('content')
    <h1 class="text-2xl py-4 text-center">Liste des articles publiées</h1>

    @foreach(\App\Article::all() as $post)
        @include('item.blade.php')
    @endforeach
@endsection
