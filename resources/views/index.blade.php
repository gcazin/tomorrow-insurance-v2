@extends('layouts.base', ['title' => 'Accueil', 'full_width' => true])

@section('content')
    <style>
        #section-1::before, #section-1::after {
            content: '';
            height: 12vw;
            width: 100%;
        }
        #section-1::after {
            display: -webkit-box;
            display: flex;
            background: url({{ asset('/storage/images/wave-2.svg') }});
            background-position-y: 0%;
            background-size: auto;
            background-position-y: 15vw;
            background-size: cover;
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
        }
        #section-3::before {
            content: ' ';
            display: -webkit-box;
            display: flex;
            width: 100%;
            background: url({{ asset('/storage/images/wave-3.svg') }}) #fff;
            background-position-y: 0%;
            background-size: auto;
            background-position-y: top;
            background-size: cover;
            height: 10vw;
            margin-bottom: 30px;
        }
        #section-3::after {
            content: ' ';
            display: -webkit-box;
            display: flex;
            width: 100%;
            background: url({{ asset('/storage/images/wave-4.svg') }}) 0 1px no-repeat;
            background-size: auto;
            background-size: cover;
            height: 12vw;
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            transform: rotateY(180deg);
        }
        #section-5::before {
            content: '';
            display: flex;
            background: url({{ asset('/storage/images/wave-3.svg') }}) #fff;
            background-position-y: 0%;
            background-size: auto;
            background-position-y: top;
            background-size: cover;
            height: 10vw;
            margin-bottom: 30px;
            top: -1px;
            transform: rotateY(180deg);
        }

        #read {
            background: url({{ asset('/storage/images/read-article.svg') }}) no-repeat;
            background-position-x: 150%;
            background-size: contain;
        }
        #publish {
            background: url({{ asset('/storage/images/create-article.svg') }}) no-repeat;
            background-position-x: 150%;
            background-size: contain;
        }
        #chat {
            background: url({{ asset('/storage/images/chat.svg') }}) no-repeat;
            background-position-x: 150%;
            background-size: contain;
        }
    </style>

    <!-- First section -->
    <div class="relative text-gray-700 mx-auto pt-12 lg:pt-16 pb-48" id="section-1">
        <div class="w-10/12 lg:w-8/12 mx-auto">
            <div class="dark:text-gray-400 text-center">
                <h1 class="text-3xl lg:text-4xl font-bold mb-3">Le savoir des professionnels de l'assurance à portée de main</h1>
                <p class="text-xl lg:text-2xl">Poser une question à un professionnel de l'assurance</p>

                <div class="dark:text-gray-400 text-center">
                    <div class="card flex flex-row flex-wrap justify-between lg:flex-no-wrap pt-10">
                        <form action="{{ route('search') }}" method="get" class="w-full">
                            <div class="flex">
                                <div class="w-3/12">
                                    <select name="skills" id="skills" class="input w-6/12" style="border-radius: 9999px 0 0 9999px !important">
                                        <option value="theme" disabled selected>Thème de la question</option>
                                        @foreach(App\Skill::all() as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="relative w-9/12">
                                    <input type="text" class="input" name="question" style="border-radius: 0 9999px 9999px 0 !important" placeholder="Intitulé de la question">
                                    <button type="submit" class="absolute top-0 right-0 mr-4 mt-5">
                                        <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                             viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                             width="512px" height="512px">
<path
    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
</svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <!--<div class="mt-10 bg-white shadow rounded-lg">

                    <input id="panel-1-ctrl"
                           class="panel-radios" type="radio" name="tab-radios" checked>
                    <input id="panel-2-ctrl"
                           class="panel-radios" type="radio" name="tab-radios">
                    <input id="panel-3-ctrl"
                           class="panel-radios" type="radio" name="tab-radios">
                    <input id="panel-4-ctrl"
                           class="panel-radios" type="radio" name="tab-radios">
                    <input id="panel-5-ctrl"
                           class="panel-radios" type="radio" name="tab-radios">
                    <input id="nav-ctrl"
                           class="panel-radios" type="checkbox" name="nav-checkbox">
                    <ul id="tabs-list" class="flex flex-col sm:flex-row">
                        <label id="open-nav-label" for="nav-ctrl"></label>
                        <li id="li-for-panel-1" class="inline-block text-gray-600 block hover:text-blue-500 focus:outline-none text-blue-500 font-medium">
                            <label class="panel-label py-4 px-6" for="panel-1-ctrl">Partout</label>
                        </li>
                        <li id="li-for-panel-2" class="inline-block text-gray-600 block hover:text-blue-500 focus:outline-none">
                            <label class="panel-label py-4 px-6" for="panel-2-ctrl">Par catégorie</label>
                        </li>
                        <li id="li-for-panel-3" class="inline-block text-gray-600 block hover:text-blue-500 focus:outline-none">
                            <label class="panel-label py-4 px-6" for="panel-3-ctrl">Par mots-clés</label>
                        </li>
                        <label id="close-nav-label" for="nav-ctrl">Fermer</label>
                    </ul>
                    <article id="panels">
                        <div class="container">


                            <section id="panel-1">
                                <main class="relative">
                                    <form action="{{ route('search') }}" method="get" class="relative">
                                        <input type="text" class="input" name="all" style="border-radius: 9999px !important" placeholder="Rechercher dans les titres, la description, les mots clés...">
                                        <button type="submit" class="absolute top-0 right-0 mr-4 mt-3">
                                            <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                                 viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                                 width="512px" height="512px">
            <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
          </svg>
                                        </button>
                                    </form>
                                </main>
                            </section>


                            <section id="panel-2">
                                <main class="relative">

</main>
</section>


<section id="panel-3">
<main class="relative">
    <form action="{{ route('search') }}" method="get" class="relative">
                                        <input type="text" id="exist-values" class="tagged form-control" data-removeBtn="true" name="tags" value="" placeholder="Ajouter des mots-clés (ex: impots, retraite...)">
                                        <button type="submit" class="absolute top-0 right-0 mr-4 mt-3">
                                            <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                                 viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                                 width="512px" height="512px">
            <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
          </svg>
                                        </button>
                                    </form>
                                    <div class="text-left">
                                        <small class="text-sm italic text-gray-500">Les mots-clés doivent être séparés par des virgules</small>
                                    </div>
                                </main>
                            </section>
                        </div>
                    </article>
                </div>-->
            </div>
        </div>
    </div>

    <!-- Second section -->
    <div class="relative bg-white text-gray-700 mx-auto pt-16 pb-16" id="section-2">

        <div class="w-10/12 mx-auto">
            <div class="dark:text-gray-400 text-center">
                <h1 class="text-3xl lg:text-4xl font-bold mb-10">Découvrir quelques articles</h1>
                <div class="lg:flex lg:flex-wrap lg:justify-center">
                    @foreach(\App\Article::all()->random(3) as $article)
                        @include('partials.item')
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <!-- section 5 -->
    <div class="bg-gray-100 relative bg-white text-gray-700 mx-auto pb-16" id="section-5">
        <div class="w-10/12 lg:w-8/12 mx-auto">
            <div class="dark:text-gray-400">
                <h1 class="text-3xl lg:text-4xl font-bold mb-3 text-center mb-5">Comment ça marche?</h1>
                <div class="block md:flex justify-between md:-mx-2 mt-16">


                    <div class="w-full lg:w-1/3 md:mr-5 mb-4 md:mb-0">
                        <div class="bg-white rounded-lg overflow-hidden shadow-lg relative">
                            <div class="h-40 flex items-center px-5 border-b border-solid border-gray-200" id="read">
                                <h1 class="text-blue-500 text-3xl font-bold">Lire</h1>
                            </div>
                            <div class="px-5 h-auto md:h-40 lg:h-30 flex items-center">
                                <div class="font-bold leading-relaxed block md:text-xs lg:text-sm">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure aut quia alias ullam eveniet sunt! Ipsa, sunt. Inventore ipsum sit quasi. Alias quasi officiis blanditiis!
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="w-full lg:w-1/3 md:mx-5 mb-4 md:mb-0">
                        <div class="bg-white rounded-lg overflow-hidden shadow-lg relative">
                            <div class="h-40 flex items-center px-5 border-b border-solid border-gray-200" id="publish">
                                <h1 class="text-blue-500 text-3xl font-bold">Publier</h1>
                            </div>
                            <div class="px-5 h-auto md:h-40 lg:h-30 flex items-center">
                                <div class="font-bold leading-relaxed block md:text-xs lg:text-sm">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure aut quia alias ullam eveniet sunt! Ipsa, sunt. Inventore ipsum sit quasi. Alias quasi officiis blanditiis!
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="w-full lg:w-1/3 md:ml-5 mb-4 md:mb-0">
                        <div class="bg-white rounded-lg overflow-hidden shadow-lg relative">
                            <div class="h-40 flex items-center px-5 border-b border-solid border-gray-200" id="chat">
                                <h1 class="text-blue-500 text-3xl font-bold">Discuter</h1>
                            </div>
                            <div class="px-5 h-auto md:h-40 lg:h-30 flex items-center">
                                <div class="font-bold leading-relaxed block md:text-xs lg:text-sm">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure aut quia alias ullam eveniet sunt! Ipsa, sunt. Inventore ipsum sit quasi. Alias quasi officiis blanditiis!
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@section('script')
    <script src="{{ asset('js/tags.js') }}"></script>
@endsection
@endsection
