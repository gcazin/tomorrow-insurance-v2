@extends('layouts.base', ['title' => 'Mon compte'])

@section('content')
    <div class="w-7/12 m-auto">
        <h1 class="text-xl">Informations du compte</h1>
        @include('auth.partials.nav')
        <div class="shadow">
            @yield('account-content')
        </div>
    </div>
@endsection
