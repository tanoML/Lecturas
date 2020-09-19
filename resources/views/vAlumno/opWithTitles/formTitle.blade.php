@extends('layouts.app')
@section('title', 'Sugerir titulos')
@section('sidebar')
  <header>
    @include('components.alumno.navbar');
  </header>
@endsection

@section('content')
<div class="container">

    <h1>Panel para el ingreso de un titulo.</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('temporalTitlesAlu.store') }}">
              @csrf
                <div class="form-group">
                  <label for="titleA">Titulo</label>
                  <input name="titleA" type="text" class="form-control" id="titleA" aria-describedby="titleA" required>
                  <small id="titleA" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                  <label for="authorA">Autor</label>
                  <input name="authorA" type="text" class="form-control" id="authorA" required>
                </div>

                <div class="form-group">
                  <label for="nPag">Numero de paginas</label>
                  <input type="number" name="nPag" id="nPag" class="form-control" required>
                </div>

                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" disabled>
                  <label class="form-check-label" for="exampleCheck1">Elejir este titulo como mi lectura</label>
                  <small id="exampleCheck1" class="form-text text-muted">Si el titulo es aceptado tu lectura sera asignada en caso contrario tendra que elegir uno nuevo.</small>
                </div>

                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" disabled>
                  <label class="form-check-label" for="exampleCheck1">El titulo se encuentra en la biblioteca</label>
                  <small id="exampleCheck1" class="form-text text-muted">Ask to the teacher if it is neccesary for the students</small>
                </div>

                <button type="submit" class="btn btn-primary">Enviar titulo</button>
              </form>
        </div>
    </div>

    <div class="row">
      <a href="{{ route('inicioStudent') }}" class="btn btn-secondary">regresar</a>
    </div>
      

</div>
@endsection
