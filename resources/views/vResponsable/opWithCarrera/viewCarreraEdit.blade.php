@extends('layouts.app')
@section('title', 'Editar carrera')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection
@section('content')
<div class="container">

    <div class="row">
        <div class="col text-center">
            <h3>
                Por favor edita la carrera de forma responsable. Gracias.
            </h3>
        </div>
    </div>
    <hr>
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <form method="POST"action="{{ route('readyToUpdateCarrera', $idCarrera) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="editCarrera">Nombre de la carrera actual: {{ $nameCarrera }} </label>
                  <input name="editCarrera" type="text" class="form-control" id="editCarrera" placeholder="Ingrese el nuevo nombre para la carrera" required>
                  <small id="editCarrera" class="form-text text-muted">Por favor ingrese el nombre de la carrera de forma similar a los que ya estan establecidos en el sistema.</small>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </form>
        </div>
    </div>

  
</div>
@endsection