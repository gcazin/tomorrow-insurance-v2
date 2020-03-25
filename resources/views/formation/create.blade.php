@extends('layouts.base', ['title' => 'Inscription', 'full_width' => false])

@section('content')
    <div class="center-box flex-col lg:flex-row">
        <div class="flex-1 align-self-center">
            <img src="{{ asset('storage/images/authentication.svg') }}" class="w-6/12 m-auto">
        </div>
        <div class="flex-1">
            <h1 class="text-3xl mb-5">Publier une formation</h1>
            <form method="POST" action="{{ route('store.formation') }}">
                @csrf
                <label for="title">Titre de la formation</label>
                <input id="title" type="text" class="input" name="title" value="{{ old('title') }}" required>

                <label for="description">Description de la formation</label>
                <textarea id="description" class="input" name="description" value="{{ old('description') }}" required></textarea>

                <label for="location">Position de la formation</label>
                <input type="text" id="location" class="input" name="location" value="{{ old('location') }}" required>

                <label for="entry_price">Prix d'entrée de la formation</label>
                <input type="text" id="entry_price" class="input" name="entry_price" value="{{ old('entry_price') }}" required>

                @error('name')
                <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-blue">
                        {{ __('Publier la formation') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
