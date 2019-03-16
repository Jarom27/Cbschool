@if ($EstiloDePagina!="default")
    @if (url('/login'))
        <footer class="border-top footer text-muted">
            <div class="container">
                <div class="row">
                    <div class="col s6">
                        &copy; 2019 - Cobach - <a>Privacy</a>
                    </div>
                    <div class="col s2"></div>
                </div>    
            </div>
        </footer>
    @else
        <footer class="border-top footer text-muted">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                        <h5>Creado por: {{$noti->autor}} el {{$noti->fecha}}</h5>
                    </div>
                    <div class="col s12">
                        &copy; 2019 - Cobach - <a>Privacy</a>
                    </div>
                </div>
            </div>
        </footer>
    @endif
   
@else
    <footer class="border-top footer text-muted">
        <div class="container">
            <div class="row">
                <div class="col s6">
                    &copy; 2019 - Cobach - <a>Privacy</a>
                </div>
                <div class="col s2"></div>
                <div class="col s4">
                    <a href="{{url('/login')}}">Solo para Administradores</a>
                </div>
            </div>    
        </div>
    </footer>
@endif