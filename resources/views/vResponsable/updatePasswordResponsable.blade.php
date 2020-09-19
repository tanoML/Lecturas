@extends('layouts.app')

@section('title', 'Actualizar contrasenia')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection

@section('content')
<div class="container">

  @if ($errors->any())
  <div class="alert alert-danger d-block" role="alert">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

@if (session('error'))
  <div class="alert alert-danger d-block" role="alert">
      {{ session('error') }}
  </div>
@endif


  <form method="POST" action="{{ route('readyToUpdatePassResp') }}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="contraseniaAntigua">Contrasenia actual</label>
      <input name="old_password" type="password" class="form-control" id="contraseniaAntigua">
    </div>
    <div class="form-group">
      <label for="contraseniaNueva">Contrasenia nueva</label>
      <input name="password" type="password" class="form-control" id="contraseniaNueva">
    </div>
    <div class="form-group">
      <label for="contraseniaConfirmar">Confirmar contrasenia nueva</label>
      <input name="password_confirmation" type="password" class="form-control" id="contraseniaConfirmar">
    </div>
 
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </form>

  <a href="{{ route('updateDataResp') }}" class="btn btn-primary">Cancelar</a>
      

</div>
@endsection
