@extends('layouts.app')

@section('title', 'Mas info. de las fechas')
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
      <h3>Informacion sobre la fecha establecida</h3>
  </div>
  <hr>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h3 > Fecha de inicio: {{ $findDateR->dateStartR }}</h3>
      <h3 >Fecha limite: {{ $findDateR->dateEndR }}</h3>
      <h3 >Parcial: {{ $findDateR->parcial }}</h3>
      <h3 >Creado: {{ $findDateR->created_at }}</h3>
      <h3 >Actualizado: {{ $findDateR->updated_at }}</h3>
    </div>
  </div>
  
<br>
<a href="{{ route('datesReport.index') }}">Regresar</a>
</div>
@endsection
