<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cbschool3</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/site.css')}}">
</head>
<body>
        <nav class="nav-wrapper orange darken-1">
                <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
           
                    
                <a class="brand-logo" href="{{ url('/') }}">
                    {{ config('app.name', 'Cbschool3') }}
                </a>
                
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="dropdown-content " id="options" style="with:210px">
                        <!-- Authentication Links -->
                        
                </ul>
        </nav>
        <ul id="slide-out" class="sidenav ">
            <li>
                <div class="logo center ">
                    <img src="/CB/Resources/images/Logo.png" width="250px" style="margin-top:15px"/>
                    <div class="divider"></div>
                </div>   
            </li>
            <li>
                <ul style="margin-top:15px">
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle orange-text text-darken-1" href="{{route('home')}}">
                            <i class="material-icons" style="margin-right:4px">account_box</i>{{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            
                        </div>
                    </li>
                @endguest
            </li>
            <li><a href="{{url('/home/panel')}}"><i class="material-icons" style="margin-right:4px">dashboard</i>Panel</a></li>
            <li><a href="#!"><i class="material-icons" style="margin-right:4px">settings</i>Configuracion</a></li>
            <li><div class="divider"></div></li>
            <li><a class=" orange-text text-darken-1" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                 <i class="material-icons" style="margin-right:4px">exit_to_app</i>{{ __('Logout') }}</a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
            </ul>
            </li>
          </ul>
          
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var options = {
        };
        var instances = M.Sidenav.init(elems, options);
  });
    </script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{asset('/js/materialize.js')}}"></script>
    <script src="{{asset('/js/site.js')}}"></script>
</html>
