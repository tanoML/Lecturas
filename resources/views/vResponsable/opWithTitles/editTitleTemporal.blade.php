@extends('layouts.app')

@section('title', 'Editar titulo')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection

@section('content')
<div class="container">
  <hr>
  <div class="row justify-content-md-center">
      <h2>Editar titulo</h2>
  </div>
  <hr>
  <br>

  <div class="row justify-content-center">
      <div class="col-md-8">
        <form method="POST" action="{{ route('check-titles.update', $dataE->id) }}">
          @csrf
          @method('PUT')
            <div class="form-group">
              <label for="autor">Autor</label>
              <input type="text" name="autorE" class="form-control" id="autor" value="{{ $dataE->author }}" aria-describedby="autorHelp">
              <small id="autorHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="titulo">Titulo</label>
              <input type="text" name="title" class="form-control" id="titulo" value="{{ $dataE->name }}" required>
            </div>
            <div class="form-group">
                <label for="nroPage">Numero de paginas</label>
                <input type="number" class="form-control" name="nroPagE" id="nroPagE" value="{{ $dataE->nroPage }}" required>
            </div>
            <div class="form-group form-check">
              <input name="saveTo" type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Agregar a los tiutlos aceptados</label>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
      </div>
  </div>

  <a href="{{ route('check-titles.index') }}" class="btn btn-primary">Regresar</a>
      

</div>
@endsection
