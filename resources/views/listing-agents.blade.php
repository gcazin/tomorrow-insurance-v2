@extends('layouts.base', ['full_width' => false])

@section('content')
    <h1 class="text-2xl">Liste des agents généraux</h1>
    @foreach(\App\User::all()->where('role_id', 3) as $agent)
        <div class="flex bg-white mt-5 mb-8 shadow">
        <div class="w-2/12 px-3 py-8 flex items-center">
            <img class="rounded-full h-32 w-32 mx-auto shadow-lg" src="{{ \App\User::getAvatar($agent->id) }}">
        </div>
        <div class="w-6/12 py-8">
            <h1 class="text-2xl">{{ $agent->agent }}</h1>
            <p class="text-base text-gray-600">{{ $agent->agence }}</p>
            <div class="mt-5">
                <a href="{{ route('chat.chat', $agent->id) }}" class="btn btn-blue">Contactez-nous</a>
            </div>
        </div>
        <div class="w-4/12 px-5 pt-10 border-l border-solid border-gray-300 text-gray-700">
                <div class="flex">
                    <div class="w-5/12">
                        <p class="text-base"><i class="fas fa-map-marker-alt pr-1"></i> Localisation:</p>
                        <p class="text-base"><i class="fas fa-phone-square"></i> Téléphone:</p>
                    </div>
                    <div class="w-7/12">
                        <p class="text-base">{{ $agent->adresse }}</p>
                        <p class="text-base">{{ $agent->tel }}</p>
                    </div>
                </div>
        </div>
    </div>
    @endforeach
@endsection
