@extends('layouts.base')

@section('content')
    <h1 class="text-2xl py-4 text-center">Modifier un article</h1>

    <form action="{{ route('article.update', $article->id) }}" method="post">
        @csrf
        @method('PATCH')
        <label for="category_id">Catégorie</label>
        <select name="category_id" id="category_id" class="input">
            @foreach(App\Category::all() as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
        <label for="image">Image d'illustration</label>
        <input type="text" class="input" id="image" name="image" value="{{ $article->image }}">
        <label for="tags">Tags</label>
        <input type="text" class="input" id="tags" name="tags" value="@foreach($article->tags as $tags){{strtolower($tags->name).','}}@endforeach">
        <label for="title">Titre</label>
        <input type="text" class="input" id="title" name="title" value="{{ $article->title }}">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="input mb-3">{{ $article->description }}</textarea>
        <button type="submit" class="btn btn-blue btn-block">Créer le post</button>
    </form>
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
@endsection

