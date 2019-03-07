@if ($n)
    <div class="logo center ">
        <img src="/CB/Resources/images/Logo.png"/>
        <div class="divider"></div>
    </div>    
@else
    <header class="navbar-fixed">
        <nav class="nav-wrapper navigation light-blue darken-1 ">
            <ul id="Agenda" class="dropdown-content orange-text lighten-1">
                <li><a class="orange-text lighten-1">Calendario</a></li>
                <li><a href="#!" class="orange-text lighten-1">Horarios</a></li>
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
                            <li><a class="waves-effect">Acerca de</a></li>
                        </ul>
                    </center>
                </div>
            </center>
            <ul id="options" class="sidenav">
                <li><a class="waves-effect">Inicio</a></li>
                <li><a class="waves-effect">Noticias</a></li>
                <li><a class="waves-effect">Agenda</a></li>
                <li><a class="waves-effect">Acerca de</a></li>
            </ul>
        </nav>
    </header>
    <div class="abajo">         
    </div>
@endif
