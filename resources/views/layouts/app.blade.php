<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Blog</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <style>
        header{

            width: 100%;
            text-decoration: none;
            text-align: center;
            background-color: #272b30;
            font-family: 'Times New Roman';
        }
        footer{
            width: 100%;
            text-decoration: none;
            text-align: center;
        }
    </style>
    <header class="pt-2 pb-2">
        <div class="container">
        <a href="{{ url('/') }}" style="color:#b6b2b2;"><h4>My Blog</h4></a>
        </div>
    </header>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <form action="/search" method="GET">
                    <input type="text" name="search" placeholder="Search" value="{{ old('cari') }}">
                    <input type="submit" class="btn btn-outline-light btn-sm">
                  </form>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/home/latest">Latest</a>
                         </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/home/add">Write Something</a>
                         </li>

                         
                      </ul>
                     
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/home/account/{{ Auth::user()->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/home/account/{{ Auth::user()->id}}">
                                    My Account
                                 </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        

        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="pt-2 pb-2">
        <div class="container">
            <h6 class="text-muted">Copyright @2021 My Blog</h6>
            <a href="https://www.instagram.com/daniar_miftah_r/" class="text-muted">Me On Instagram</a>
        </div>
   
    </footer>
</body>
</html>
