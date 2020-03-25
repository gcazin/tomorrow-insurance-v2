@extends('layouts.article-base')
@php

    use App\Article;
        $articles = Article::all();

@endphp
@yield('article-content')
