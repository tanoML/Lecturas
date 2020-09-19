@extends('layouts.app')

@section('title', 'Inicio')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection

@section('content')
@if (session('encontrado'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('encontrado') }}
    </div>
@endif

<div class="container">
    <div class="row">
        {{-- start to my carrers --}}
        <div class="col">
            @if ($allCarrerofResp->count() > 1)
                <header><h3>Carreras a cargo actualmente.</h3></header>
                <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allCarrerofResp as $keyR => $item)
                    <tr>
                        <th scope="row">{{ $keyR + 1 }}</th>
                        <td>{{ $item->carrera }}</td>
                        <td> 
                        <form action="{{ route('deleteCarreOfResp') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button name="carrera" value="{{ $item->id }}" type="submit" class="btn btn-danger">Quitar</button>
                        </form>
        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            @else
                <emptycarrer-component></emptycarrer-component>
            @endif
        </div>
        {{-- end to my carrers --}}

        {{-- start to availble carrers --}}
        <div class="col">
            @if ($allCarrerAvailable->count() > 1)
            <header><h3>Carreras disponibles.</h3></header>
            <form action="{{ route('chooseMyCarrers') }}" method="post">
            @csrf
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Carreras</th>
                <th scope="col">Opcion</th>
                </tr>
            </thead>
                <tbody>
                @foreach ($allCarrerAvailable as $keyC => $item)
                    <tr>
                    <th scope="row">{{ $keyC + 1 }}</th>
                    <td>{{ $item->carrera }}</td>
                    <td>
                        <div class="custom-control custom-checkbox">
                        <input name="carreras_{{$item->id}}" type="checkbox" class="custom-control-input" id="customCheck{{$item->id}}" value="{{$item->id}}">
                        <label class="custom-control-label" for="customCheck{{$item->id}}">Elegir</label>
                        </div>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button class="btn btn-primary" type="submit">Guardar cambios</button>
        </form>
        @else
            <emptydata-component></emptydata-component>
        @endif
        </div>
        {{-- end to availble carrers --}}
        {{-- <div class="col">

            <div class="d-flex justify-content-center">
                <div class="p-3 bd-highlight">
                    <button class="btn btn-primary" v-if="!flagToaddCarrera " v-on:click="flagToaddCarrera = !flagToaddCarrera">Agregar Carrera</button>
                    <button class="btn btn-danger" v-else v-on:click="flagToaddCarrera = !flagToaddCarrera">Cancelar</button>
                </div>

                <div class="p-3 bd-highlight">
                    <button class="btn btn-primary" v-if="!flagToaddCampus && !flagToaddCarrera"  v-on:click="flagToaddCampus = !flagToaddCampus">Agregar Campus</button>
                    <button class="btn btn-danger" v-else v-on:click="flagToaddCampus = !flagToaddCampus">Cancelar</button>
                </div>
            </div>
        </div> --}}

    </div>

    <div class="row py-4 ">
      <div class="col text-center">
        <a href="{{ route('ViewAddCampus') }}" class="btn btn-primary">Agregar o editar Campus</a>
      </div>
      <div class="col text-center">
        <a href="{{ route('viewPropertyCarrera') }}" class="btn btn-primary">Agregar o editar Carrera</a>
      </div>

        {{-- <addcampus-component routetochange="{{ route('addCampus') }}" token="{{ csrf_token() }}"    v-if="flagToaddCampus"></addcampus-component>
        <addcarrera-component v-else-if="flagToaddCarrera"></addcarrera-component> --}}

        {{-- VERIFICAR ESTE TUTORIAL PARA PODER CAMBIAR LAS VARIABLES LOCALES WEY --}}
        {{-- ENLACE: https://laracasts.com/series/learn-vue-2-step-by-step/episodes/24--}}

    </div>

</div>
@endsection


{{-- <div class="col">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Campus</th>
        <th scope="col">Operaciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($allCampus as $keyCa => $item)
        <tr>
          <th scope="row">{{ $keyCa + 1 }}</th>
          <td>{{ $item->name }}</td>
          <td>
            <button class="btn btn-warning">Editar</button>
            <button class="btn btn-primary">Ver carreras</button>
            <button class="btn btn-danger">Eliminar</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="col">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Carrera</th>
        <th scope="col">Operaciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($allCarrer as $keyCarrera => $item)
        <tr>
          <th scope="row">{{ $keyCarrera+1 }}</th>
          <td id="number{{$keyCarrera+1}}"  v-if="!flagToEditCarrera">{{ $item->carrera }}</td>
          <td id="number{{$keyCarrera+1}}" v-else>no mames culero</td>
          <td>
            <button class="btn btn-primary" v-on:click="flagToEditCarrera = !flagToEditCarrera">Editar</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $allCarrer->links() }}
</div> --}}