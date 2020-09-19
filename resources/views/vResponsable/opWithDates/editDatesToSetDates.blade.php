@extends('layouts.app')

@section('title', 'Editar fecha')
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
        <h3>Panel para editar la fecha</h3>
  </div>
  <hr>

  <div class="row justify-content-md-center">
    
    <form action="{{ route('dates.update', $dateToEdit->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="dateSPP">Fecha de inicio para el @switch($dateToEdit->parcial)
              @case(1) Primer @break
              @case(2) Segundo @break
              @case(3) Tercero @break
              @endswitch  
              parcial: </label>
          
              <input type="date" name="dateStart" id="dateSPP" value="{{ $dateToEdit->dateStart }}" min="{{ $dateToEdit->dateStart }}">
        </div>
  
        <div class="form-group">
          <label for="dateEndPP">Fecha final para el  
              @switch($dateToEdit->parcial)
              @case(1) Primer @break
              @case(2) Segundo @break
              @case(3) Tercero @break
              @endswitch
              parcial: </label>
  
          <input type="date" name="dateEnd" id="dateEndPP" value="{{ $dateToEdit->dateEnd }}" min="{{ $timenow }}">
        </div>
      
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  
    
  </div>

  <div class="row justify-content-md-center">
    <a href="{{ route('dates.index') }}" class="btn btn-warning">Cancelar</a>
  </div>

  
 


</div>
@endsection