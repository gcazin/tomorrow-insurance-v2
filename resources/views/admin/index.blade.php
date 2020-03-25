@extends('layouts.base')


@section('content')
    <!--Console Content-->
    <div class="flex flex-wrap mt-5">
        <div class="w-full md:w-1/2 xl:w-1/3 pr-3">
            <!--Metric Card-->
            <div class="bg-white dark:bg-gray-800 rounded shadow-md p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-orange-dark"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="uppercase text-grey">Nombres d'utilisateurs inscrits</h5>
                        <h3 class="text-3xl">{{ count(App\User::all()) }}</h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 pr-3">
            <!--Metric Card-->
            <div class="bg-white dark:bg-gray-800 rounded shadow-md p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-blue-dark"><i class="fas fa-server fa-2x fa-fw fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="uppercase text-grey">Nombres d'articles publiées</h5>
                        <h3 class="text-3xl">{{ count(\App\Article::all()) }}</h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3">
            <!--Metric Card-->
            <div class="bg-white dark:bg-gray-800 rounded shadow-md p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-blue-dark"><i class="fas fa-server fa-2x fa-fw fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="uppercase text-grey">Version PHP du serveur</h5>
                        <h3 class="text-3xl">{{ phpversion() }}</h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
    </div>

    <!--Divider-->
    <hr class="border-b-2 border-grey-light my-8 mx-4">

    <div class="mx-auto">
        <h1 class="text-xl">Article <a href="{{ route('article.create') }}" class="btn btn-blue ml-2">Ajouter</a></h1>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded my-6">
            <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">ID</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Titre</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Contenu</th>
                    <th class="text-right py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach(App\Article::all() as $post)
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{ $post->id }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $post->title }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $post->description }}</td>
                        <td class="py-4 px-6 border-b border-grey-light text-right">
                            <a href="{{ route('article.edit', [$post->id]) }}" class="btn btn-green"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('article.show', [$post->id, $post->slug]) }}" class="btn btn-blue"><i class="fas fa-eye"></i></a>
                            <form class="inline" action="{{ route('article.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-red"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--Divider-->
    <hr class="border-b-2 border-grey-light my-8 mx-4">

    <div class="mx-auto">
        <h1 class="text-xl">Catégorie <a href="{{ route('admin.category.create') }}" class="btn btn-blue ml-2">Ajouter</a></h1>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded my-6">
            <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">ID</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Titre</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Description</th>
                    <th class="text-right py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>

                </tr>
                </thead>
                <tbody>
                @foreach(App\Category::all() as $category)
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{ $category->id }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $category->title }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $category->description }}</td>
                        <td class="py-4 px-6 border-b border-grey-light text-right">
                            <a href="{{ route('admin.category.edit', [$category->id]) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs btn btn-green hover:bg-green-dark">Modifier</a>
                            <form class="inline" action="{{ route('admin.category.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-red"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
