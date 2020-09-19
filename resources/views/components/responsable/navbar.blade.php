<nav class="navbar navbar-expand-lg  navbar-dark navbarResponsable">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ Request::is('vResponsable/welcome') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('inicioResponsable') }}">Inicio<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown {{ Request::is('vResponsable/lecturas/*') ? ' active' : '' }}">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Lecturas 
              @if ($sizeTempTitles > 0 )
                <span class="badge badge-pill badge-light">Nuevos</span>
                <span class="sr-only">unread messages</span>
              @endif
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('check-titles.index') }}">Recibidos <span class="badge badge-dark">{{ $sizeTempTitles<10 ? $sizeTempTitles : '9+'  }}</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('accepted-titles.index') }}">Aceptados</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('viewConfigEmployee') }}">Config. Responsable</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Configuracion</a>
            </div>
          </li>
          <li class="nav-item dropdown {{ Request::is('vResponsable/instituto/*') ? ' active' : '' }}">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownOperaciones" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Instituto  
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownOperaciones">
              <a class="dropdown-item" href="{{ route('OpWithCarrers') }}">Carreras</a>
              <a class="dropdown-item" href="{{ route('statusDocente') }}">Usuario docente</a>
              <a class="dropdown-item" href="{{ route('statuStudent') }}">Usuario alumno</a>
            </div>
          </li>
          <li class="nav-item dropdown  {{ Request::is('vResponsable/configuracion/*') ? ' active' : '' }}">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{--Start of the user name --}}
              {{ Auth::user()->name }} <span class="caret"></span> 
              {{--end of the user name --}}
            </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('updateDataResp') }}">
                      Configuracion
                    </a>
                    <a href="#" class="dropdown-item">Acerca de</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
      </ul>
    </div>
  </nav>