@extends('layouts.layout')
@section('content')
<div class="container">
    <!--TODO: es necesario ver que el estilo de la pagina se vea bien en celular-->
    <div class="carrusel carousel carousel-slider center">
        @foreach ($ListadoDeCincoNoticias as $item)
        <div class="carousel-item ">
            <img src="{{ asset("storage/".$imagenes[$item["title"]][0])}}" height="400px">
            <h1 class="titulo">{{$item['title']}}</h1>
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