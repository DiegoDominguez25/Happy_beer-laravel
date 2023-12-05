<!-- component -->
<div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
    <header>
        @vite('resources/css/app.css')
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="hidden w-full text-gray-600 md:flex md:items-center">
                    <div class="relative text-sm text-gray-100">
                        <button id="userButton" class="flex items-center focus:outline-none mr-3">
                          <img class="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of User"> <span class="hidden md:inline-block text-black">
                            {{ Auth::user()->name }}
                        </span>
                          <svg class="pl-2 h-2 fill-current text-gray-100" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"><g><path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"></path></g></svg>
                        </button>
                        <div id="userMenu" class="bg-gray-900 rounded shadow-md mt-9 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30">
                            <ul class="list-reset">
                              <li>
                                <a href="{{ route('profile.show') }}" class="px-4 py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline">
                                    Mi perfil
                                </a>
                            </li>



                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <li><a  href="{{ route('logout') }}" class="px-4 py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline" onclick="event.preventDefault();
                                    this.closest('form').submit(); ">Log out</a></li>

                            </form>

                              <li><hr class="border-t mx-2 border-gray-400"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
                    Happy Beer
                </div>
                <div class="flex items-center justify-end w-full">
                    <button class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </button>

                    <div class="flex sm:hidden">
                        <button type="button" class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500" aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
                <div class="flex flex-col sm:flex-row">
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Home</a>
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Shop</a>
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Categories</a>
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Contact</a>
                    <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">About</a>
                    @can('licor.index')
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{ route('licor.index') }}">Admin</a>
                    @endcan

                </div>
            </nav>

        </div>
        <title>@yield('title')</title>
        @livewireStyles
    </header>

    <main class="my-8">
        @yield('content')
        @livewireScripts
    </main>

    <footer class="bg-gray-200">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="#" class="text-xl font-bold text-gray-500 hover:text-gray-400">Brand</a>
            <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
        </div>
    </footer>

    <script>


        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var userMenuDiv = document.getElementById("userMenu");
        var userMenu = document.getElementById("userButton");

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e){
          var target = (e && e.target) || (event && event.srcElement);

          //User Menu
          if (!checkParent(target, userMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, userMenu)) {
              // click on the link
              if (userMenuDiv.classList.contains("invisible")) {
                userMenuDiv.classList.remove("invisible");
              } else {userMenuDiv.classList.add("invisible");}
            } else {
              // click both outside link and outside menu, hide menu
              userMenuDiv.classList.add("invisible");
            }
          }

          //Nav Menu
          if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
              // click on the link
              if (navMenuDiv.classList.contains("hidden")) {
                navMenuDiv.classList.remove("hidden");
              } else {navMenuDiv.classList.add("hidden");}
            } else {
              // click both outside link and outside menu, hide menu
              navMenuDiv.classList.add("hidden");
            }
          }

        }

        function checkParent(t, elm) {
          while(t.parentNode) {
            if( t == elm ) {return true;}
            t = t.parentNode;
          }
          return false;
        }


    </script>

</div>
