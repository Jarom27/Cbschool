@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-title">
                    <h3 class="center-align">Bienvenido {{$user->name}} al sistema de noticias de Cbschool</h3>
                </div>

                <div class="card-content">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>
                       Una nueva forma de comunicar informacion vital y veridica para toda la 
                       comunidad escolar.

                       Con estas herramientas esperamos que te sean de gran ayuda para compartir tu talento
                       con las demas personas.
                    </p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
