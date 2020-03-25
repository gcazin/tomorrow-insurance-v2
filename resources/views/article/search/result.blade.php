@extends('layouts.article-base')

@section('article-content')
        @php
            $articles = $articles->all();
        @endphp
@endsection
