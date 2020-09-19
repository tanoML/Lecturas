@extends('layouts.app')
@section('title', 'Verificacion de cuenta') 
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
              <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
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
                <a class="nav-link" href="">Acerca de</a>
              </li>

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
             
          </ul>
        </div>
      </nav>
  </header>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Por favor verifica tu correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un mensaje nuevo a tu correo electrónico por favor revisalo.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder, por favor revisa tu correo elctronico, para poder confirmar tu cuenta.') }}
                    {{ __('Si no has recibido el correo de confirmacion') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('puede volver a reenviar el correo electrónico haciendo click aqui') }}</button>.
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
