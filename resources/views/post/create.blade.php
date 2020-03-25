@extends('layouts.base', ['full_width' => false])

@section('content')
    <form action="{{ route('store.post') }}" method="post">
        @csrf
        <div class="form-group">
            <textarea class="border-0 p-3 w-full" name="content" placeholder="Votre message"></textarea>
        </div>
        <button class="btn btn-blue" type="submit">Publier</button>
    </form>
@endsection
