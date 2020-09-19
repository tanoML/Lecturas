@extends('layouts.app')

@section('title', 'Titulos aceptados')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection

@section('content')
<div class="container">
  <hr>
  <div class="row justify-content-md-center">
      <h2>Lista de titulos almacenados en el sistema</h2>
  </div>
  <hr>

  <br>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Autor</th>
        <th scope="col">Editar</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
      

</div>
@endsection
