<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    @vite('resources/css/app.css')
    <!-- Title  -->
    <title>
        @yield('title')
    </title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;600;700&amp;display=swap" rel="stylesheet" />

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('assets/img/favicon.jpg') }}" />

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

    @yield('styles')
    @livewireStyles
</head>

<body>
    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="{{ route('profile') }}" class="-m-1.5 p-1.5">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                        alt="">
                </a>
            </div>
            @auth
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="{{ route('profile') }}" class="text-sm font-semibold leading-6 text-gray-900">
                        {{ auth()->user()->username }}
                    </a>
                </div>
            @endauth
            @guest
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">Đăng nhập <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
            @endguest
            @auth
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="{{ route('logout') }}" class="text-sm font-semibold leading-6 text-gray-900">Đăng xuất <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
            @endauth
        </nav>
    </header>


    {{-- content --}}
    @yield('content')
    {{-- end content --}}
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
@yield('scripts')
@livewireScripts

</html>
