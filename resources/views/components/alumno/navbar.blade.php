<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ Request::is('vAlumno/welcome') ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('inicioStudent') }}">Inicio<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{ Request::is('vAlumno/reporte/*') ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('Wreporte') }}">Reporte</a>
        </li>
        <li class="nav-item {{ Request::is('vAlumno/titulos/*') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('temporalTitlesAlu.index') }}">Titulos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Citas</a>
          </li>
          <li class="nav-item dropdown {{ Request::is('vAlumno/configuracion/*') ? ' active' : '' }}">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('updateData') }}">{{ _('Configuracion') }}</a>
                  <a href="#" class="dropdown-item">Acerca de</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Cerrar sesion') }}
                     </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                </div>
            </li>
        {{-- @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                     {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    @endguest --}}
      </ul>
    </div>
  </nav>