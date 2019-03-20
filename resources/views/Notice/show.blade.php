@extends('layouts.layout')
@section('content')
    <div class="carousel carousel-slider" style="height: 400px;">
        @foreach ($Imagenes as $imagen)
            <a class="carousel-item" href="#one!">
                <img src="{{asset("storage/".$imagen)}}"height="400px">
            </a>
        @endforeach  
    </div>
    @foreach ($noticia as $noti)
        <div class="container">
            <div class="row">
                <div class="col s12" style="font:24">
                    <h1>{{$noti["title"]}}</h1>
                </div>
                <div class="col s12">
                    <h3 style="margin-top:0">{{$noti['subtitle']}}</h2>
                </div>
                <div class="col s12">
                    <p>{{$noti['description']}}</p>
                </div>
            </div>
            
        </div>
        
    @endforeach
    
@endsection