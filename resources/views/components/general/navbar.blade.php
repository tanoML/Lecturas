<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="{{ route('inicioRaiz') }}">
      <img class="rounded-circle " src="{{ asset('storage/unistmo_logo_sm_antiguo.png') }}" width="70px" height="70px" alt="logo_unistmo">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ Route::currentRouteName() == 'inicioRaiz' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('inicioRaiz') }}">Inicio <span class="sr-only">(current)</span></a>
        </li>
          <li class="nav-item  {{ Route::currentRouteName() == 'vFrases' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('vFrases') }}">Frases</a>
          </li>
          <li class="nav-item  {{ Route::currentRouteName() == 'vNoticias' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('vNoticias') }}">Noticias</a>
            </li>
          
            <li class="nav-item  {{ Route::currentRouteName() == 'login' ? ' active' : '' }}">
              <a class="nav-link" href="{{   route('login') }}">Iniciar</a>
            </li>

          {{-- <li class="nav-item {{ ((Route::currentRouteName()) == ('loginDocente')) ? ' active' : '' }} {{ ((Route::currentRouteName()) == ('loginStudent')) ? ' active' : '' }} dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Iniciar
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Docente</a>
              <a class="dropdown-item" href="#">Alumno</a>
            </div>
          </li> --}}

          <li class="nav-item {{ (Route::currentRouteName() == 'registroDocente') ? ' active' : '' }} {{ (Route::currentRouteName() == 'registroAlumno') ? ' active' : '' }}  dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfesor" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Registro
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfesor">
                <a class="dropdown-item" href="{{ route('registroDocente') }}">Docente</a>
                <a class="dropdown-item" href="{{ route('registroAlumno') }}">Alumno</a>
              </div>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'vAcercaDe' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('vAcercaDe') }}">Acerca de</a>
            </li>
      </ul>
      
    </div>
  </nav>