<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cbschool3</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/site.css')}}">
</head>
<body>
        <nav class="nav-wrapper">
            <div class="container">
                <a class="brand-logo" href="{{ url('/') }}">
                    {{ config('app.name', 'Cbschool3') }}
                </a>
                <div class="right" style="width:103px">
                    <a class="dropdown-trigger show-on-large" href="#!" data-target="options">Opciones<i class="material-icons right " style="margin-top:4px">arrow_drop_down</i></a>
                </div>
                
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="dropdown-content " id="options" style="with:210px">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle orange-text text-darken-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item orange-text text-darken-1" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
            </div>
        </nav>

        <div class="py-4">
            @yield('content')
        </div>
        <footer class="border-top footer text-muted">
            <div class="container">
                <div class="row">
                    <div class="col s6">
                        &copy; 2019 - Cobach - <a>Privacy</a>
                    </div>
                    <div class="col s2"></div>
                </div>    
            </div>
        </footer>
</body>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{asset('/js/materialize.js')}}"></script>
    <script src="{{asset('/js/site.js')}}"></script>
</html>
