@extends('layouts.app')

@section('title', 'Config. de Fechas')
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
        <h3>Panel para las configuraciones de las fechas</h3>
  </div>
  <hr>

  @if ($sizeTableDate == 0)
    <div class="row">
      <div class="col">
        <a href="{{ route('dates.create') }}" class="btn btn-primary">Agregar fechas para el registro de titulos</a>
      </div>
    </div>
  @endif

  <br>

@if ($sizeTableDate == 0)
  <emptytabledate-component></emptytabledate-component>
@else    
  <div class="row">
   
      <table class="table table-dark">
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
            @foreach ($allDates as $item)
              <tr>
                <th scope="row">{{ $item->parcial }}</th>
                <td>{{ $item->dateStart }}</td>
                <td>{{ $item->dateEnd }}</td>
                <td><a href="{{ route('dates.edit', $item->id) }}" type="button" class="btn btn-primary">Editar</a></td>
                <td><a href="{{ route('dates.show', $item->id) }}" class="btn btn-primary">Ver</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
  </div>
@endif
  
<div class="row">
  <a href="{{ route('inicioResponsable') }}">Regresar</a>
</div>



</div>
@endsection
