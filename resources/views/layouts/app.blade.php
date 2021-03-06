<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="icon" href="{{ URL::asset('/css/foto/2.png') }}" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/app.css')  }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LAPOR-in</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Bebas+Neue&family=Roboto+Condensed&family=Roboto+Mono:ital,wght@0,400;1,500&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script>
        src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"
    </script>
    <style>
        .nav-link {
            font-size: 20px;
            margin-right: 20x;
            margin-left: 20px;
        }
    </style>

</head>

    


<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand rempoa" href="{{ url('/') }}">
                <img src="{{ asset('css/foto/2.png') }}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- Left Side Of Navbar -->

                    <li class="nav-item">
                        <a class="nav-link" href="/AduanViewUser">
                            Aduan
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/forum') }}">
                            Forum
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">
                            Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/berita') }}">
                            Berita
                        </a>
                    </li>
                    {{-- <ul class="navbar-nav mr-auto">
                            <div class="container-fluid">
                            <form class="d-flex">
                                <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </ul> --}}
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href=" /forumUser/{{ Auth::user()->id }}">Forum Saya</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Keluar') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
