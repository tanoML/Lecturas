@extends('layouts.app')

@section('title', 'Config. fechas para reportes')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection

@section('content')

@if (session('messages'))
    <div class="alert alert-success">
        {{ session('messages') }}
    </div>
@endif

<div class="container">
  <hr>
  <div class="row justify-content-md-center">
      <h3>Panel para la configuracion de las fechas</h3>
  </div>
  <hr>

  @if ($tam == 0)
    <a href="{{ route('datesReport.create') }}" class="btn btn-primary">Agregar fechas para el envio del reporte</a>
    <emptytabledatereport-component></emptytabledatereport-component>
  @else
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Parcial</th>
          <th scope="col">Fecha de inicio</th>
          <th scope="col">Fecha limite</th>
          <th scope="col">Editar</th>
          <th scope="col">Mas info.</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($allDate as $item)
          <tr>
            <th scope="row">{{ $item->parcial }}</th>
            <td>{{ $item->dateStartR }}</td>
            <td>{{ $item->dateEndR }}</td>
            <td><a href="{{ route('datesReport.edit', $item->id) }}" class="btn btn-warning">Editar</a></td>
            <td><a href="{{ route('datesReport.show', $item->id) }}" type="button" class="btn btn-secondary">Ver</a></td>
          </tr>
        @endforeach
     
      
      
      </tbody>
    </table>
  @endif
  
<br>
<a href="{{ route('inicioResponsable') }}">Regresar</a>
</div>
@endsection
