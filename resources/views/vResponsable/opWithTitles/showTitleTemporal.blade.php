@extends('layouts.app')

@section('title', 'Informacion del titulo')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection

@section('content')
<div class="container">
  <hr>
  <div class="row justify-content-md-center">
      <h2>Informacion</h2>
  </div>
  <hr>

  <div class="row">
    <div class="col-md-8">
      <form>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Titulo: </label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Autor: </label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3">
          </div>
        </div>
        <div class="form-group row">
          <label for="nroPag" class="col-sm-2 col-form-label">Nro. paginas:</label>
          <div class="col-sm-10">
            <input type="number" name="nroPag" id="nroP" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label for="user" class="col-sm-2 col-form-label">Usuario</label>
          <div class="col-sm-10">
            <input type="text" name="user" id="user" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-2">Biblioteca</div>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck1">
              <label class="form-check-label" for="gridCheck1">
                El titulo se encuentra disponible en la biblioteca.
              </label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Guardar titulo en el sistema</button>
          </div>
        </div>
      </form>
    </div>
  </div>
 

  {{-- <div class="jumbotron jumbotron-fluid">
    <div class="container">
   
      <h3 class="display-5">{{ $dataT->id_user }}</h3>
      <h3 class="display-5">{{ $dataT->created_at }}</h3>
      <h3 class="display-5">{{ $dataT->updated_at }}</h3>
    </div>
  </div> --}}

 
  <a class="btn btn-primary" href="{{ route('check-titles.index') }}">Regresar</a>
      

</div>
@endsection
