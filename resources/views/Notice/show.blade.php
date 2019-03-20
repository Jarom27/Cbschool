@extends('layouts.layout')
@section('content')
    <div class="carousel carousel-slider" style="height: 400px;">
        @foreach ($Imagenes as $imagen)
            <a class="carousel-item" href="#one!">
                <img src="{{asset("storage/".$imagen)}}"height="400px">
            </a>
        @endforeach  
    </div>
    <div class="container">
        <div class="row">
            <div class="col s12" style="font:24">
                <h1>{{$noticia[0]['title']}}</h1>
            </div>
            <div class="col s12">
                <h3 style="margin-top:0">{{$noticia[0]['subtitle']}}</h2>
            </div>
            <div class="col s12">
                <p>{{$noticia[0]['description']}}</p>
            </div>
        </div>
        
    </div>
    
@endsection