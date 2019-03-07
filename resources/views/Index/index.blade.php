@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="carrusel carousel carousel-slider center">
        @foreach ($five as $item)
        <div class="carousel-item ">
            <img src="/CB/Resources/images/1.jpg">
            <h1 class="titulo">{{$item['title']}}</h1>
            <h2 class="subtitulo">{{$item['subtitle']}}</h2>
        </div>
        @endforeach
    </div>
    <div class="container">
        <h1>Bienvenidos a CbSchool!!!</h1>
        <p>
            Una nueva plataforma web impulsada por alumnos del plantel Obregon 3
            como un nuevo medio de informacion por medio de noticias que pretende ser
            un metodo seguro y fidedigno de comunicacion.
        </p>
    </div> 
</div>
@stop