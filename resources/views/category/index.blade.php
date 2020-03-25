@extends('layouts.article-base', ['title' => 'test'])

@section('article-content')
        @php
            $articles = $articles->all();
        @endphp
@endsection



