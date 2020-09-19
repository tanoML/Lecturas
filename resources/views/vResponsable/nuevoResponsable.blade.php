@extends('layouts.app')
@section('title', 'Modificar')
@section('sidebar')
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('inicioResponsable') }}">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Lista</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Configuracion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Confg. Responsables</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Enlaces
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('/') }}">Principal</a>
                  <a class="dropdown-item" href="{{ url('vPrincipal/plantillas/frases') }}">Frases</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('vPrincipal/plantillas/noticias') }}">Noticias</a>
                  <a class="dropdown-item" href="{{ url('vPrincipal/plantillas/acercade') }}">Acerca de</a>
                </div>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Acerca de</a>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::guard('teacher')->user()->name }} <span class="caret"></span>
                 
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
  </header>
@endsection

@section('content')
<div class="container">

  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
  </div>

@endif

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($profesores as $item)
            <tr>
            <th scope="row">1</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->lastName }}</td>
            <td>
              <form action="{{ route('changeRol',  $item->id) }}" method="POST" class="form-inline">
                @csrf
                @method("PUT")
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Estado actual :  <b><em> {{ $item->role === 'responsable'  ?  "Responsable" : "Docente"    }} </em></b></label>
                  
                  <select name="rol" class="form-control mx-sm-2" id="exampleFormControlSelect1">
                    <option value="{{  $item->role === 'responsable'  ?  "teacher" : "responsable"  }}">Asignar como: {{ $item->role === 'responsable'  ?  "Docente" : "Responsable"    }}</option>
                  </select>

                  </div>

                  @if (Auth::guard('teacher')->user()->id ==  $item->id)
                  {{-- HABRIA QUE VER SI COLOCO TODO LO DEMAS EN DISABLED --}}
                  <button disabled type="submit" class="btn btn-primary">Asignar</button>
                  @else
                    <button type="submit" class="btn btn-primary">Asignar</button>
                  @endif

               </form>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>


</div>
@endsection

@push('scripts')
<script>
  setTimeout(function(){$('.alert').alert('close')},2000);
</script>
@endpush