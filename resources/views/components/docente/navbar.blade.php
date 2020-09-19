<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ Request::is('vDocente/welcome') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('inicioDocente') }}">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item {{ Request::is('vDocente/titulos/*') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('temporalTitlesDoc.index') }}">Titulos</a>
          </li>
          <li class="nav-item {{ Request::is('vDocente/citas/*') ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('vCitas') }}">Citas</a>
          </li>
          <li class="nav-item dropdown {{ Request::is('vDocente/configuracion/*') ? ' active' : '' }}">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{  Auth::user()->name}} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('updateDataDoc') }}">
                      Configuracion
                    </a>
                    <a href="{{ route('vistaAcercade') }}" class="dropdown-item">Acerca de</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                              {{ __('Salir') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
      </ul>
    </div>
  </nav>