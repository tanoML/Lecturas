@extends('layouts.app')
@section('title', 'Sugerir titulos')
@section('sidebar')
  <header>
    @include('components.docente.navbar')
  </header>
@endsection
@section('content')
<div class="container">

   <h2>Por favor tenga en cuenta que los titulos deben ser de categoria para lecturas</h2>

  <div class="row justify-content-center">
      <div class="col-md-6">
        <form method="POST" action="{{ route('temporalTitlesDoc.store') }}">
          @csrf
            <div class="form-group">
              <label for="name">Titulo de la lectura</label>
              <input name="name" type="text" class="form-control" id="name" aria-describedby="tituloLect"  required>
              <small id="tituloLect" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="author">Autor</label>
              <input name="author" type="text" class="form-control" id="author" required>
            </div>
            <div class="form-group">
              <label for="numberOfPage">Numero de paginas</label>
              <input type="number" name="numPag" id="numberOfPage" class="form-control" required>
              <small id="numberOfPage" class="form-text text-muted">We need to ask, if this column it is necessary, becasuse we can to check the number of times the stud choose a title</small>
            </div>
            <div class="form-group form-check">
              <input name="library" type="checkbox" class="form-check-input" id="library">
              <label class="form-check-label" for="library">El titulo se encuentra disponible en la biblioteca</label>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
      </div>
  </div>

  <div class="row my-2">
      <a href="{{ route('temporalTitlesDoc.index') }}" class="btn btn-secondary">Regresar</a>
  </div>
   
      
</div>
@endsection
