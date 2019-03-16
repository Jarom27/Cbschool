@extends('layouts.layout')
@section('content')
    <div class="carousel carousel-slider" style="height: 400px;">
        @foreach ($ColeccionImagenes as $imagen)
            <div class="carousel-item">
                <img src="{{asset("storage/".$imagen->titulo."/".$imagen->nombre.".".$imagen->formato)}}" height="400px">
            </div>
        @endforeach
    </div>
    @foreach ($noticia as $contenidoNoticia)
    <div class="container">
        <div class="row">
            <div class="col s12" style="font:24">
                <h1>{{$contenidoNoticia->title}}</h1>
            </div>
            <div class="col s12">
                <h3 style="margin-top:0">{{$contenidoNoticia->subtitle}}</h2>
            </div>
            <div class="col s12">
                <p>{{$contenidoNoticia->description}}</p>
            </div>
        </div> 
    </div>
    @endforeach
@endsection