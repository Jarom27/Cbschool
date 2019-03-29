<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cbschool3</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/materialize.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/site.css')}}">
    <script src="{{asset('/js/jquery.js')}}"></script>
</head>
<body>
    @include('partials.nav-bar')
    <div>
        @yield('content')
    </div>
    @include('partials.footer')
    
    <script src="{{asset('/js/materialize.js')}}"></script>
    <script src="{{asset('/js/site.js')}}"></script>
    <script src="{{asset("/js/app.js")}}"></script>
</body>
</html>