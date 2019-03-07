@extends('layouts.layout')
@section('content')
    <div class="carousel carousel-slider" style="height: 400px;">
      <a class="carousel-item" href="#one!"><img src="/CB/Resources/images/1.jpg" alt="" height="400px"></a>
      <a class="carousel-item" href="#two!"><img src="/CB/Resources/images/2.jpg" alt="" height="400px"></a>
      <a class="carousel-item" href="#three!"><img src="/CB/Resources/images/3.jpg" alt="" height="400px"></a>
      <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/250/250/nature/4" alt="" height="400px"></a>
      <a class="carousel-item" href="#five!"><img src="http://lorempixel.com/250/250/nature/5" alt="" height="400px"></a>
    </div>
    @foreach ($noticia as $noti)
    <div class="container">
        <div class="row">
            <div class="col s12" style="font:24">
                <h1>{{$noti->title}}</h1>
            </div>
            <div class="col s12">
                <h3 style="margin-top:0">{{$noti->subtitle}}</h2>
            </div>
            <div class="col s12">
                <p>{{$noti->description}}</p>
            </div>
        </div> 
    </div>
    @endforeach
@endsection