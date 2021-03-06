<nav id="header" class="bg-white fixed w-full z-10 pin-t shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">
        <div class="w-1/2 pl-2 md:pl-0">
            <a class="text-black text-base xl:text-xl no-underline hover:no-underline font-bold"  href="{{ route('home') }}">
                <i class="fas fa-sun text-orange-dark pr-3"></i> {{ config('app.name') }} Dashboard
            </a>
        </div>
        <div class="w-1/2 pr-0">
            <div class="flex relative inline-block float-right">

                <div class="relative text-sm">
                    <button id="userButton" class="flex items-center focus:outline-none mr-3">
                        <img class="w-8 h-8 rounded-full mr-4" src="/storage/avatars/{{ \Illuminate\Support\Facades\Auth::user()->avatar }}" alt="Avatar of User"> <span class="hidden md:inline-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                        <svg class="pl-2 h-2" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"><g><path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/></g></svg>
                    </button>
                    <div id="userMenu" class="bg-white rounded shadow-md mt-2 absolute mt-12 pin-t pin-r min-w-full overflow-auto z-30 invisible">
                        <ul class="list-reset">
                            <li><a href="#" class="px-4 py-2 block text-black hover:bg-grey-light no-underline hover:no-underline">My account</a></li>
                            <li><a href="#" class="px-4 py-2 block text-black hover:bg-grey-light no-underline hover:no-underline">Notifications</a></li>
                            <li><hr class="border-t mx-2 border-grey-light"></li>
                            <li><a href="#" class="px-4 py-2 block text-black hover:bg-grey-light no-underline hover:no-underline">Logout</a></li>
                        </ul>
                    </div>
                </div>


                <div class="block lg:hidden pr-4">
                    <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-grey border-grey-dark hover:text-black hover:border-teal appearance-none focus:outline-none">
                        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                </div>
            </div>

        </div>


        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20" id="nav-content">
            <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('admin.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-orange-dark no-underline hover:text-black border-b-2 border-orange-dark hover:border-orange-dark">
                        <i class="fas fa-home fa-fw mr-3 text-orange-dark"></i><span class="pb-1 md:pb-0 text-sm">Accueil</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('post.create') }}" class="block py-1 md:py-3 pl-1 align-middle text-grey no-underline hover:text-black border-b-2 border-white hover:border-pink">
                        <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Publier un article</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('admin.show') }}" class="block py-1 md:py-3 pl-1 align-middle text-grey no-underline hover:text-black border-b-2 border-white hover:border-purple">
                        <i class="fa fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Voir les articles publiées</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('home') }}" class="block py-1 md:py-3 pl-1 align-middle text-grey no-underline hover:text-black border-b-2 border-white hover:border-green">
                        <i class="fas fa-chart-area fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Voir le site</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
