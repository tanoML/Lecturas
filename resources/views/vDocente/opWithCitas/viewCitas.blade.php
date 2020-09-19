@extends('layouts.app')
@section('title', 'Citas')
@section('sidebar')
  <header>
    @include('components.docente.navbar')
  </header>
@endsection
@section('content')
<div class="container">

   <h1>Panel para citas literarias</h1>

   <hr>
   <h3>Mis citas</h3>
   
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
     <a href="#" class="btn btn-primary">Enviar citas</a>
   </div>
      
</div>
@endsection
