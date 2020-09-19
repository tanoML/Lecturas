@extends('layouts.app')

@section('title', 'Registro de docente')
@section('sidebar')
  <header>
      @include('components.general.navbar')
  </header>
@endsection


@section('content')
<div class="container">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="name">Nombre</label>
        <input name="name" type="text" class="form-control" id="name">
      </div>
      <div class="form-group col-md-6">
        <label for="secondName">Apellidos</label>
        <input name="lastName" type="text" class="form-control" id="secondName">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="campus">Campus</label>
        <select name="campus" id="campus" class="form-control" v-model="selected" @change="onGetCarrers()">
          <option value=""  disabled selected>Selecciona un campus</option>
          @foreach ($allCampus as $campus)
            <option value="{{ $campus->id }}">{{ $campus->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="carrera">Carrera</label>
        <select name="carrer" id="carrera" class="form-control">
          <option value="" disabled selected>Elija su carrera por favor</option>
          <option v-for="carrer in carrers" :key="carrer.id" v-bind:value="carrer.id"> @{{ carrer.carrera }} </option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="email">Correo</label>
        <input name="email" type="email" class="form-control" id="email">
      </div>
      <div class="form-group col-md-4">
        <label for="inputPassword4">Contrasenia</label>
        <input name="password" type="password" class="form-control" id="inputPassword4" autocomplete="off">
      </div>
      <div class="form-group col-md-4">
        <label for="inputPassword4Verified">Repetir contrasenia</label>
        <input name="password_confirmation" type="password" class="form-control" id="inputPassword4Verified" autocomplete="off">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
  </form>
</div>
@endsection


@section('beforefooter')
    @include('components.beforeFooter')
@endsection
