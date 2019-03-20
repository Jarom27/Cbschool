@extends('layouts.layout')
@section('content')
    <div class="board">
    <div class="row">
    @foreach ($ListadoDeNoticias as $noticia)
        <div class="card col s6 contenedor">
            <div class="card-image">
                <a href="{{url('/Notice/show/'.$noticia['title'])}}">
                    <img src="{{asset("storage/".$imagenes[$noticia["title"]][0])}}" height="240px">
                    <span class="card-title font-title">{{$noticia['title']}}</span>
                </a>
            </div>
        </div>
    @endforeach
</div>
</div>
@stop