@extends('layouts.app')
@section('title', 'lista de titulos')
@section('sidebar')
  <header>
    @include('components.alumno.navbar');
  </header>
@endsection

@section('content')
<div class="container">

    <h1>Lista de titulos</h1>

    <hr class="my-5">

    <div class="row">
      <div class="col">
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
    </div>

    <div class="row">
      <a href="{{ route('temporalTitlesAlu.create') }}" class="btn btn-primary">Sugerir un titulo</a>
    </div>
      

</div>
@endsection
