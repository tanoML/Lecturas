@extends('layouts.app')

@section('title', 'Iniciar sesion alumno')

@section('sidebar')
  <header>
    @include('components.general.navbar')
  </header>
@endsection

@section('content')
<div class="container">

  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
    </div>
  @endif

  {{-- @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif --}}



<div class="d-flex justify-content-center">
  <div class="p-1">

    <img class="img_perfil" src="{{ asset('storage/userPerfil.png')  }}" alt="logo_usuario">
    <hr>
      <h3 class="title_login">Bienvenido Alumno</h3>
    <hr>
    <form method="POST" action="{{ route('enterStudent') }}">
      @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Correo electronico</label>
          <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Contrasenia</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Recordarme</label>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar sesion</button>
      </form>

  </div>
</div>

 

</div>
@endsection

@section('beforefooter')
    @include('components.beforeFooter')
@endsection
