@extends('layouts.base')

@section('content')
    <h1 class="text-2xl py-4 text-center">Modifier le post n°{{ $category->id }}</h1>
    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
        @csrf
        @method('PATCH')
        <label for="titre">Titre</label>
        <input type="text" class="input" id="titre" name="title" value="{{ $category->title }}">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="input mb-3">{{ $category->description }}</textarea>
        <button type="submit" class="btn btn-blue btn-block">Modifier la catégorie</button>
    </form>
@endsection
