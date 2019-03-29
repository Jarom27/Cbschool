@if ($EstiloDePagina!="default")
    <div class="logo center ">
        <div class="row">
            <div class="col s3">
                <a class="btn-floating  btn-large atras" style="margin-top:15px;" href="{{url("/Notice")}}"><i class=" material-icons white black-text">arrow_back</i></a>
            </div>
            <div class=" col s6">
                <img src="{{asset("/images/Logo.png")}}"/>
            </div>
            
        </div>
        <div class="divider"></div>
    </div>    
@else
    <header class="navbar-fixed">
        <nav class="nav-wrapper navigation light-blue darken-1 ">
            <ul id="Agenda" class="dropdown-content orange-text lighten-1">
                <li><a class="orange-text lighten-1" href="{{url("/Calendar")}}">Calendario</a></li>
                <li><a href="{{url("/Schedule")}}" class="orange-text lighten-1">Horarios</a></li>
            </ul>
            <div class="logo center z-depth-0">
                <img src="/CB/Resources/images/Logo.png" />
            </div>
            <a href="#" data-target="options" class="sidenav-trigger waves-effect">
                <i class="material-icons text-accent-1 large">menu</i>
            </a>
            <center>
                <div class="opti">
                    <center>
                        <ul id="nav-mobile" class="esconder">
                            <li><a class="waves-effect" href="{{url('/')}}">Inicio</a></li>
                            <li><a class="waves-effect" href="{{url('/Notice')}}">Noticias</a></li>
                            <li><a class="waves-effect dropdown-trigger agenda" data-target="Agenda" >Agenda</a></li>
                            <li><a class="waves-effect" href="{{url('/About')}}">Acerca de</a></li>
                        </ul>
                    </center>
                </div>
            </center>
            <ul id="options" class="sidenav" style="">
                <li><a class="waves-effect" href="{{url("/")}}">Inicio</a></li>
                <li><a class="waves-effect" href="{{url("/Notice")}}">Noticias</a></li>
                <li><a class="waves-effect" data-target="Agenda">Agenda</a></li>
                <li><a class="waves-effect" href="{{url("/About")}}">Acerca de</a></li>
            </ul>
        </nav>
    </header>
    <div class="abajo">         
    </div>
@endif
