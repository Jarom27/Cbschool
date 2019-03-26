@extends('layouts.layout')
@section('content')
<div class="row">     
    <form action="{{url('/home/edit')}}" enctype="multipart/form-data" method="put">
            {{csrf_field()}}
            <div class="row">   
                <div class="container">
                    <div class="col s12">
                            <h1>Editar noticia</h1>
                     </div>
                    @foreach ($noticia as $item)
                        
                    <div class="input-field col s12">
                        <label for="title">Titulo de la noticia</label>
                        <input type="text" name="title" id="title" value="{{$item['title']}}" required>
                    </div>
                    <div class="input-field col s12">                  
                        <label for="subtitle">Subtitulo de la noticia</label>
                        <input type="text" name="subtitle" id="subtitle" value="{{$item['subtitle']}}"required>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="description" class="materialize-textarea" name="description" rows="30" required>{{$item['description']}}</textarea>
                        <label for="description">Descripcion de la noticia</label>
                    </div>
                   
                    @endforeach
                    <div class="carousel carousel-slider center" data-indicators="true">
                      <div class="carousel-fixed-item center">
                        <a class="btn waves-effect white grey-text darken-text-2">button</a>
                      </div>
                      <div class="carousel-item white-text" href="#one!">
                        <img src="/CB/Resources/images/1.jpg" alt="" height="400px">
                        <p class="white-text">This is your first panel</p>
                      </div>
                      <div class="carousel-item amber white-text" href="#two!">
                        <h2>Second Panel</h2>
                        <p class="white-text">This is your second panel</p>
                      </div>
                      <div class="carousel-item green white-text" href="#three!">
                        <h2>Third Panel</h2>
                        <p class="white-text">This is your third panel</p>
                      </div>
                      <div class="carousel-item blue white-text" href="#four!">
                        <h2>Fourth Panel</h2>
                        <p class="white-text">This is your fourth panel</p>
                      </div>
                    </div>

                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>   
                </div>
            </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        var cont=1;
        $("#insertar").click(function(){
            cont++;
            alert("Clickeo "+cont);
            $('#num_imgs').attr("value",cont);
            var nombre= 'imagen'+cont;
            var div= "<div class='input-field file-field col s10'><div class='btn'><span>File</span><input type='file'name="+nombre+" required></div><div class='file-path-wrapper'><input class='file-path validate' type='text'></div></div><a class='col s2' style='margin-top:35px' id="+nombre+"><i class='material-icons red-text'>cancel</i></a>";
            //Imprimir el nuevo contenido para las imagenes
            $('#imagenes').append(div);    
        });
        
        $("a").mouseover(function(){
            $("a").css("cursor","pointer");
        });
    });
</script>
@endsection