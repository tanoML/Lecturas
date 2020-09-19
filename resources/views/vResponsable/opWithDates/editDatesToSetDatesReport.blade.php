@extends('layouts.app')

@section('title', 'Editar fecha para reporte')
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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
  <hr>
  <div class="row justify-content-md-center">
      <h3>Editar la fecha seleccionada</h3>
  </div>
  <hr>

  <div class="row justify-content-md-center">
      <form action="{{ route('datesReport.update', $dateData->id) }}" method="post">
        @csrf
        @method('PUT')
          <div class="form-group">
            <label for="dateStart">Fecha de inicio para la entrega del 
                @switch($dateData->parcial)
                    @case(1) Primer @break
                    @case(2) Segundo @break
                    @case(3) Tercero @break
                    @default  Nada
                @endswitch
                parcial:
            </label>
            <input type="date" name="dateStart" id="dateStart" value="{{ $dateData->dateStartR }}"  min="" required>
          </div>
          <div class="form-group">
            <label for="dateEnd">Fecha final para la entrega del 
                @switch($dateData->parcial)
                    @case(1) Primer @break
                    @case(2) Segundo @break
                    @case(3) Tercero @break
                    @default  Nada
                @endswitch
            parcial: </label>

            <input type="date" name="dateEnd" id="dateEnd" value="{{ $dateData->dateEndR }}" min="" required>
          </div>
          <button type="submit" class="btn btn-primary">Aplicar cambios</button>
      </form>
 </div>
  
<br>
<a href="{{ route('datesReport.index') }}">Regresar</a>
</div>
@endsection
