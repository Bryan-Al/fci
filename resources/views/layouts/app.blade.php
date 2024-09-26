<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite([ 'resources/css/app.css', 'resources/js/app.js' ])
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-4 shadow-lg">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <!-- Brand -->
                <a href="{{ url('/') }}" class="text-2xl font-semibold">
                    fCI MIRAMONTE
                </a>

                <!-- Hamburguesa para móviles -->
                <div class="md:hidden">
                    <button id="hamburger" class="text-white focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Menú de Navegación -->
                <div id="nav-menu" class="hidden md:flex space-x-8 items-center">
                    <ul class="flex flex-col md:flex-row md:space-x-8 items-center">
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a href="{{ route('login') }}" class="bg-white text-blue-600 px-4 py-2 rounded-lg shadow-md hover:bg-gray-100 transition">Login</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}" class="bg-white text-purple-600 px-4 py-2 rounded-lg shadow-md hover:bg-gray-100 transition">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="relative">
                                <button id="user-menu" class="flex items-center text-white focus:outline-none">
                                    <span class="mr-2">{{ Auth::user()->name }}</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 19.364L3 21.485m0 0L1.636 20.12m0 0a9 9 0 1112.728 0m-1.414-1.415a7 7 0 10-10.607 0M8 9h.01M9 12h.01M9 15h.01M12 9h.01M15 12h.01M15 15h.01M19 10l-.293-.293a1 1 0 00-1.414 0l-.293.293M16 12h.01" />
                                    </svg>
                                </button>
                                <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-48 bg-white text-gray-800 shadow-lg rounded-lg py-2">
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm hover:bg-gray-200 transition"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Contenido principal -->
        <main class="py-6">
            @yield('content')
        </main>
    </div>

    <!-- JavaScript para el menú hamburguesa -->
    <script>
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('nav-menu');
        const userMenu = document.getElementById('user-menu');
        const dropdownMenu = document.getElementById('dropdown-menu');

        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('hidden');
        });

        userMenu.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>

