@extends('layouts.app')
@section('title', 'Iniciar sesion docente')
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

  <div class="d-flex justify-content-center">
    <div class="p-1 bd-highlight">

      <img class="img_docente" src="{{ asset('storage/userPerDocente.png')  }}" alt="logo_usuario_docente">
      <hr>
      <h3 class="title_login">Bienvenido Docente</h3>
      <hr>
      <form  action="{{ route('enterTeacher') }}" method="POST">
        @csrf
          <div class="form-group">
            <label for="email">Correo electronico</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contrasenia</label>
            <input name="password" type="password" class="form-control" id="password">
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

