@extends('layouts.base', ['title' => 'Accueil', 'full_width' => false])

@section('content')
    @if(count($agents) > 0)
        <h1 class="text-2xl pb-5 text-gray-700">{{ count($agents) }} agents sont susceptibles de répondre à votre question</h1>
        <div class="lg:w-8/12 lg:flex">

            @foreach($agents as $agent)
                @foreach($agent as $agent_detail)
                    <div class="lg:flex mb-6 lg:mr-6 dark:shadow-2xl relative">
                        <div class="lg:w-full leading-normal bg-white">
                            <div class="rounded overflow-hidden shadow-lg">
                                <img class="w-8/12 mx-auto rounded-full mt-3" src="https://i.pravatar.cc/150?img=8" alt="Sunset in the mountains">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl text-center"><a href="">{{ $agent_detail->agent }}</a></div>
                                    <div class="text-gray-600 text-base mb-2 text-center"><a href="">{{ $agent_detail->agence }}</a></div>
                                    <div class="text-green-500 font-bold text-sm mb-2 text-center"><a href="">En ligne</a></div>
                                    <p class="text-white text-base truncate">
                                        Lorem ipsum dolor sit amrt
                                    </p>
                                </div>
                                <div class="px-6 py-4">

                                </div>
                                <div class="px-6 py-2 border-t border-solid border-gray-300 text-center">
                                    <a href="{{ route('search') }}?tags=" class="btn btn-blue">
                                        Envoyer un message
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach

        </div>

    @else
        <div class="alert alert-warning">
            <h1 class="text-xl pb-5 text-gray-700">Aucun agent n'est susceptible de répondre à ces questions</h1>
            <p>Veuillez réformuler votre recherche</p>
        </div>
    @endif
@endsection
