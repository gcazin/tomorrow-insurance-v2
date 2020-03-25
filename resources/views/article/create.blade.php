@extends('layouts.base')

@section('content')
    <h1 class="text-2xl py-4 text-center">Créer un article vidéo</h1>

    <form action="{{ route('article.store') }}" method="post">
        @csrf
        @method('POST')
        <label for="category_id">Catégorie</label>
        <select name="category_id" id="category_id" class="input">
            @foreach(App\Category::all() as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
        <label for="tags">Tags</label>
        <input type="text" class="input" id="tags" name="tags" placeholder="Tags de l'article (ex: Retraite, impôts..)">
        <label for="image">Tags</label>
        <input type="text" class="input" id="image" name="image" placeholder="URL de l'image">
        <label for="title">Titre</label>
        <input type="text" class="input" id="title" name="title" placeholder="Titre de l'article">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="input mb-3"></textarea>
        <button type="submit" class="btn btn-blue btn-block">Créer le post</button>
    </form>
@endsection

