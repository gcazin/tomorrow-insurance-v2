@extends('layouts.base')

@section('content')
    <h1 class="text-2xl py-4 text-center">Créer une catégorie</h1>

    <form action="{{ route('admin.category.store') }}" method="post">
        @csrf
        @method('POST')
        <label for="title">Titre de la catégorie</label>
        <input name="title" type="text" class="input" placeholder="Titre de la catégorie">
        <label for="description">Description de la catégorie</label>
        <textarea name="description" class="input" placeholder="Description de la catégorie"></textarea>
        <button type="submit" class="btn btn-blue float-right">Créer la catégorie</button>
    </form>
@endsection
