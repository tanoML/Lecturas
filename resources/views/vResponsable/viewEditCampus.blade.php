@extends('layouts.app')

@section('title', 'Editar campus')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection

@section('content')
<div class="container">
    <div class="alert alert-success" role="alert">
        <ul>
            <li>  {{ $success }} </li>
        </ul>
      </div>

    <div class="row justify-content-md-center">
        <h3>Por favor realice la modificacion del campus de forma responsable. Gracias.</h3>
    </div>
    <hr>

      <div class="row justify-content-md-center">
       <div class="col-sm-8">
        <form method="POST" action="{{ route('updateCampus', $idCampus) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="editcampus">Nombre del campus actual: {{ $campusEdit->name }}  </label>
              <input name="editcampus" type="text" class="form-control" id="editcampus" placeholder="Por favor ingrese el nuevo nombre del campus" required>
              <small id="editcampus" class="form-text text-muted">La edicion de dicho campus sera notificado a cada uno de los responsables</small>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
       </div>
      </div>

      <div class="row justify-content-md-center py-3">
          <div class="col-sm-8">
            <a href="{{ route('ViewAddCampus') }}" class="btn btn-warning">Cancelar</a>
          </div>
      </div>
</div>
@endsection


