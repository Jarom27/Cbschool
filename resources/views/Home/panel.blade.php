@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card large">
                    <div class="card-title">
                        <h2 style="margin-left:30px">Dashboard</h2>
                    </div>
                    <div class="row center" style="margin-left:25px;margin-bottom:4px">
                        <div class="input-field col s6">
                            <label for="search">Buscar</label>
                            <input type="search" name="noticesearch" id="search" class="input-text">
                        </div>
                        
                        <div class="col s4 input-field">
                            <select style="height: 49px">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="1">Fecha de Creacion</option>
                                <option value="2">Alfabeticamente</option>
                                
                            </select>
                            <label >Ordenar por</label>
                        </div>
                        <div class="col s1">
                            <a class="btn valign tooltipped modal-trigger" style="margin-top:27px" href="{{url('/home/add')}}">
                                <i class="material-icons">add</i><!--<span style="padding-bottom:2px">Añadir</span>-->
                            </a>
                        </div>
                    </div>
                    <div class="card-content" style="padding-top:10px">
                        @if ($lista_noticias->count()==0)
                            <span class="center-align">No hay noticias disponibles</span>
                        @else   
                            <ul class="collection" style="width:auto;height:200px;overflow:scroll">
                                {{csrf_field()}}
                                @foreach ($lista_noticias as $noti)
                                    <li class="collection-item">
                                        <div id="{{$noti->title}}">
                                            <span >{{$noti->title}}</span>
                                            <a class="secondary-content delete" id="{{$noti->title}}" onclick="Borrar(this.id)" ><i class="material-icons">delete</i></a>
                                            <a class="secondary-content create modal-trigger" href="#modal1" id="{{$noti->title}}" onclick="Edit(this.id)"><i class="material-icons">create</i></a>
                                        </div>
                                        <div id="modal1" class="modal">
                                            <div class="modal-content">
                                              <h4>Modal Header</h4>
                                              <p>A bunch of text</p>
                                            </div>
                                            <div class="modal-footer">
                                              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                                            </div>
                                          </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            var elems = document.querySelectorAll('select');
            var elemsmodal = document.querySelectorAll('.modal');
            var optionsModal = {}
            var instancesModal = M.Modal.init(elemsmodal, optionsModal);
            var options={}
            var add = document.querySelectorAll('.tooltipped');
            var create = document.querySelectorAll('.create');
            var borrar = document.querySelectorAll('.delete');
            var options_create={
                exitDelay:1,
                html:"Editar Noticia",
                position:'top'
            };
            var options_add={
                exitDelay:1,
                html:"Añadir noticia",
                position: 'top'
            }
            var options_delete={
                exitDelay:1,
                html:"Borrar Noticia",
                position:'top'
            };
            var options_modalAdd={
                onCloseEnd:function (){
                    alert("Exito en la introduccion de datos");
                }
            };
            var instances = M.Tooltip.init(add, options_add);
            var instancesCreate = M.Tooltip.init(create,options_create);
            var instancesAdd = M.FormSelect.init(elems, options);
            var instancesBorrar = M.Tooltip.init(borrar, options_delete);
        });
        function Borrar(titulo){
            var datos = {
                title: titulo
            }
            $.ajax({
                url:"{{URL::route('borrar')}}",
                method:"delete",
                data: datos,
                dataType: "json",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function(res){
                    alert("exito en el borrado de la noticia");
                    $("#"+res.title).remove();
                    location.reload();
                },
                error:function(res){
                    if(res.status==200){
                        alert("exito en el envio"+res.responseJSON);
                    }
                }
            });
            
        }
        function Edit(titulo){
            var datos = {
                title:titulo
            };
            $.ajax({
                url:"{{URL::route('edit')}}",
                method:"put",
                data :datos,
                dataType:"json",
                success:function(res){
                    
                },

            });
        }
    </script>
@endsection