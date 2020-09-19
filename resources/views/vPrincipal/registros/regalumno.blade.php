@extends('layouts.app')
@section('title', 'Registro de alumno')
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

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="name">Nombre</label>
          <input name="name" type="text" class="form-control" id="nameAlumno">
        </div>
        <div class="form-group col-md-6">
          <label for="secondName">Apellidos</label>
          <input name="lastName" type="text" class="form-control" id="secondNameAlumno">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="email">Correo</label>
          <input name="email" type="email" class="form-control" id="email"  placeholder="name@example.com">
        </div>
        <div class="form-group col-md-4">
          <label for="password">Contrasenia</label>
          <input name="password" type="password" class="form-control" id="password">
        </div>
        <div class="form-group col-md-4">
          <label for="password_confirmation">Confirmar Contrasenia</label>
          <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="campus">Campus</label>
          <select name="campus" id="campus" class="form-control" v-model="selected" @change="onGetCarrers()">
            <option disabled value="" selected>Selecciona un campus</option>
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
        <div class="form-group col-md-6">
          <label for="resposanble">Responsable</label>
          <select name="responsable" class="form-control" id="responsable">
            <option value="1" selected>Tania</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="periodo">Periodo</label>
          <select name="periodo" class="form-control" id="periodo">
            <option value="1" selected >2020-2021A</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="name">Matricula</label>
          <input name="matricula" type="text" class="form-control" id="matricula">
        </div>
        <div class="form-group col-md-4">
          <label for="semestre">Semestre</label>
            <select name="semestre" class="form-control" id="semestre">
              <option value="" selected disabled>Porfavor elija su semestre</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="sexo">Sexo</label>
            <select name="sexo" class="form-control" id="sexo">
              <option value="" selected disabled>Porfavor elija su sexo</option>
              <option value="M">Mujer</option>
              <option value="H">Hombre</option>
            </select>
        </div>
      </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </form>
</div>
@endsection


@section('beforefooter')
    @include('components.beforeFooter')
@endsection
