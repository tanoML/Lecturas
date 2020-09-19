@extends('layouts.app')

@section('title', 'Fechas programadas')
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
        <h3>Mas informacion sobre las fechas</h3>
  </div>
  <hr>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h3 class="display-4">Informacion </h3>
      <h4>Fecha de inicio: {{ $dateInfo->dateStart }}</h4>
      <h4>Fecha de termino: {{ $dateInfo->dateEnd }} </h4>
      <h4>Parcial: {{ $dateInfo->parcial }}</h4>
      <h4>Creado el: {{ $dateInfo->created_at }}</h4>
      <h4>Actualizado el: {{ $dateInfo->updated_at }}</h4>
    </div>
  </div>

  <div class="row">
      <a href="{{ route('dates.index') }}">Regresar</a>
  </div>

</div>
@endsection
