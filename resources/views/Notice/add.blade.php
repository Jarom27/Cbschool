@extends('layouts.layout')
@section('content')
    <div class="row">     
        <form action="{{url('/home/add')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="row">   
                    <div class="container">
                        <div class="col s12">
                                <h1>Añadir noticia</h1>
                         </div>
                         
                        <div class="input-field col s12">
                            <label for="title">Titulo de la noticia</label>
                            <input type="text" name="title" id="title" required pattern="[^*,<,>,@]" maxlength="100">
                        </div>
                        <div class="input-field col s12">                  
                            <label for="subtitle">Subtitulo de la noticia</label>
                            <input type="text" name="subtitle" id="subtitle" required pattern="[^*,<,>,@]" maxlength="150">
                        </div>
                        <div class="input-field col s12">
                            <textarea id="description" class="materialize-textarea" name="description" rows="30" required ></textarea>
                            <label for="description">Descripcion de la noticia</label>
                        </div>
                        <div class="col s12">
                            <div class="row">
                                <div class="col s8 input-field">
                                    <label for="num_imgs">Numero de imagenes</label>
                                    <input type="number" disabled name="num_imgs" id="num_imgs" min="1" max="99" value="1">
                                </div>
                                   <a class="btn col s4" type="button" style="margin-top:30px" id="insertar">
                                       Insertar
                                    </a>
                               </div>
                        </div>
                        <div class="col s12">
                            <div class="row" id="imagenes">
                                <div class="file-field input-field col s10">
                                    <div class="btn">
                                      <span>File</span>
                                      <input type="file" name="imagen1" required>
                                    </div>
                                    <div class="file-path-wrapper ">
                                        <input class="file-path validate " type="text">
                                    </div>
                                </div>
                                
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
                $('#num_imgs').attr("value",cont);
                var nombre= 'imagen'+cont;
                var div= "<div class='input-field file-field col s10'><div class='btn'><span>File</span><input type='file'name="+nombre+" required></div><div class='file-path-wrapper'><input class='file-path validate' type='text'></div></div>";
                //Imprimir el nuevo contenido para las imagenes
                $('#imagenes').append(div);    
            });
            
            $("a").mouseover(function(){
                $("a").css("cursor","pointer");
            });
        });
    </script>
@stop