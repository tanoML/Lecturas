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
        <h3>Por favor establezca todas las fechas para la eleccion de titulos en los parciales.</h3>
  </div>
  <hr>

  
  <br>

  
      
  
  {{-- action="{{ route('setDateTitlePP') }}" --}}
    <form action="{{ route('dates.store') }}"  method="POST" >
      @csrf
      <div class="row">
        <div class="col">
          <label for="dateSPP">Fecha de inicio para el primer parcial: </label>
          <input type="date" name="dateSPP" id="dateSPP" min="{{ $timenow }}" required>
        </div>
        <div class="col">
          <label for="dateEndPP">Fecha final para el primer parcial: </label>
          <input type="date" name="dateEndPP" id="dateEndPP"  min="{{ $timenow }}" required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="dateSSP">Fecha de inicio para el segundo parcial: </label>
          <input type="date" name="dateSSP" id="dateSSP"  min="{{ $timenow }}" required>
        </div>
        <div class="col">
          <label for="dateEndSP">Fecha final para el segundo parcial: </label>
          <input type="date" name="dateEndSP" id="dateEndSP"  min="{{ $timenow }}" required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="dateSTP">Fecha de inicio para el tercer parcial: </label>
          <input type="date" name="dateSTP" id="dateSTP" min="{{ $timenow }}" required>
        </div>
        <div class="col">
          <label for="dateEndTP">Fecha final para el tercer parcial: </label>
          <input type="date" name="dateEndTP" id="dateEndTP" min="{{ $timenow }}" required>
        </div>
      </div>

      <button type="submit" class="btn btn-primary mb-2">Establecer</button>
    </form>

    

    <br>

    <a href="{{ route('dates.index') }}">Regresar</a>

</div>
@endsection
