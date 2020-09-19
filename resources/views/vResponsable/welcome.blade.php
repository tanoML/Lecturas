@extends('layouts.app')

@section('title', 'Inicio')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection

@section('content')
<div class="container">
  <hr>
  <div class="row justify-content-md-center">
      <h2>Bienvenido(a) Responsable {{ auth()->user()->name }}</h2>
  </div>
  <hr>

  <div class="row">
    <div class="col">
      <div class="d-flex flex-column bd-highlight mb-3">
        <div class="p-2 bd-highlight">
          <a href="{{ route('dates.index') }}" class="btn btn-primary">Configuracion de fechas para la eleccion del titulo</a>
        </div>
        <div class="p-2 bd-highlight">
          <a href="{{ route('datesReport.index') }}" class="btn btn-secondary">Configuracion de fechas para la entrega del reporte</a>
        </div>
      </div>
    </div>
  </div>

  <br>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
      

</div>
@endsection
