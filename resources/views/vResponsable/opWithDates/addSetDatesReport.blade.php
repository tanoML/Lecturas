@extends('layouts.app')

@section('title', 'Agregar fechas para reportes')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection

@section('content')
<div class="container">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <hr>
  <div class="row justify-content-md-center">
      <h3>Por favor ingrese todas las fechas para la entrega de los reportes en el parcial</h3>
  </div>
  <hr>
  
  <form action="{{ route('datesReport.store') }}" method="post">
      @csrf
      <div class="row">
          <div class="col">
            <label for="dateSendSPP">Fecha de inicio para la entrega del primer parcial: </label>
            <input type="date" name="dateSPP" id="dateSPP"  min="{{ $timenow }}" required>
          </div>
          <div class="col">
            <label for="dateSendEndPP">Fecha final para la entrega del primer parcial: </label>
            <input type="date" name="dateEndPP" id="dateEndPP"  min="{{ $timenow }}" required>
          </div>
      </div>
      <div class="row">
          <div class="col">
            <label for="dateSendSSP">Fecha de inicio para la entrega del segundo parcial: </label>
            <input type="date" name="dateSSP" id="dateSSP"  min="{{ $timenow }}" required>
          </div>
          <div class="col">
            <label for="dateSendEndSP">Fecha final para la entrega del segundo parcial: </label>
            <input type="date" name="dateEndSP" id="dateEndSP"  min="{{ $timenow }}" required>
          </div>
      </div>
      <div class="row">
          <div class="col">
            <label for="dateSendSTP">Fecha de inicio para la entrega del tercer parcial: </label>
            <input type="date" name="dateSTP" id="dateSTP"  min="{{ $timenow }}" required>
          </div>
          <div class="col">
            <label for="dateSendEndTP">Fecha final para la entrega del tercer parcial: </label>
            <input type="date" name="dateEndTP" id="dateEndTP"  min="{{ $timenow }}" required>
          </div>
      </div>
      <button type="submit" class="btn btn-primary">Establecer</button>
  </form>
 
<br>

<a href="{{ route('datesReport.index') }}">Regresar</a>
  

</div>
@endsection
