@extends('layouts.app')
@section('title', 'Lista de titulos')
@section('sidebar')
  <header>
    @include('components.docente.navbar')
  </header>
@endsection
@section('content')
<div class="container">

  <div class="row">
    @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
    @endif
  </div>

   <h1>Lista de titulos en la base de datos</h1>

   <br>
   <a href="{{ route('temporalTitlesDoc.create') }}" class="btn btn-primary">Sugerir titulos</a>
   <hr>

   <div class="row">
    <table class="table table-bordered">
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
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
   </div>
      
</div>
@endsection
