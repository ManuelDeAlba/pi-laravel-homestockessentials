@props(['titulo'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $titulo }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="font-poppins">
    <div>        
        <div class="flex h-screen bg-gray-200">
            <div id="fondoModal" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
            
            {{-- Sidebar --}}
            <x-sidebar />
            
            <div class="flex flex-col flex-1 overflow-hidden">
                {{-- Barra de navegación --}}
                <header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-indigo-600">
                    <div class="flex items-center">
                        <button id="hamburguesa" class="text-gray-500 focus:outline-none lg:hidden">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </button>
                        
                        {{--! Barra de búsqueda --}}
                        {{-- <div class="relative mx-4 lg:mx-0">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>
                            </span>
        
                            <input class="w-32 pl-10 pr-4 rounded-md form-input sm:w-64 focus:border-indigo-600" type="text"
                                placeholder="Search">
                        </div> --}}
                    </div>

                    {{-- Inicio de sesión --}}
                    <div class="space-x-2">
                        {{-- Se usa el helper auth para obtener el usuario actual --}}
                        {{-- Si no existe muestra el inicio de sesión --}}
                        {{-- Si existe muestra cerrar sesión y el nombre --}}
                        {{-- @if (!auth()->user()) --}}
                        {{-- @endif --}}

                        {{-- También se puede usar la directiva @auth --}}
                        @auth
                            <span>{{ auth()->user()->name }}</span>
                            <form id="form-logout" class="inline" action="{{ url('/logout') }}" method="POST">
                                @csrf
                                <a href="{{ url('/logout') }}" onclick="cerrarSesion(event)">Cerrar sesión</a>
                            </form>
                        @else
                            <a href="/register">Registrarse</a>
                            <a href="/login">Iniciar sesión</a>
                        @endauth

                        {{-- Guest es el opuesto de auth --}}
                        {{-- @guest
                        @endguest --}}
                    </div>
                </header>

                {{-- Contenido principal --}}
                <main class="h-full overflow-auto">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById("sidebar");
        const fondoModal = document.getElementById("fondoModal");
        const hamburguesa = document.getElementById("hamburguesa");

        // Cerrar modal
        fondoModal.addEventListener("click", e => {
            sidebar.classList.add("-translate-x-full");
            sidebar.classList.add("ease-in");
            fondoModal.classList.add("hidden");
        })

        // Abrir modal
        hamburguesa.addEventListener("click", e => {
            sidebar.classList.remove("-translate-x-full");
            sidebar.classList.remove("ease-in");
            fondoModal.classList.remove("hidden");
        })

        function cerrarSesion(e){
            e.preventDefault();
            document.getElementById('form-logout').submit();
        }
    </script>
</body>
</html>