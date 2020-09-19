@extends('layouts.app')

@section('title', 'Lista de Docentes')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection

@section('content')
<div class="container">

  <div class="row">
    <div class="col">
      <header><h3>Lista de profesores registrados</h3></header>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre(s)</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Establecer como</th>
          </tr>
        </thead>
          <tbody>
              @foreach ($allUser as $key => $item)
                  <tr>
                      <th scope="row">{{ $key + 1 }}</th>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->lastName }}</td>
                      <td>
                          <form class="form-inline" action="{{ route('updateRol') }}" method="post">
                              @csrf
                              @method('PUT')
                              
                              <div class="custom-control custom-switch">
                                <input type="hidden" name="employee" value="{{ $item->id }}">
                                  {{-- <input name="{{ $item->id }}" type="checkbox" class="custom-control-input" id="customSwitch{{ $key + 1 }}"> --}}
                                  {{-- <label class="custom-control-label" for="customSwitch{{ $key + 1 }}"></label> --}}
                              </div>
                              <button class="btn btn-primary btn-sm mx-2" type="submit">Responsable</button>
                          </form>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>

    </div>
    <div class="col">
      <header><h3>Lista de responsables.</h3></header>

      <table class="table table-bordered table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre(s)</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Operacion</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($allRepUser as $keyR => $itemOfResp)
            <tr>
              <th scope="row">{{ $keyR + 1 }}</th>
              <td>{{ $itemOfResp->name }}</td>
              <td>{{ $itemOfResp->lastName }}</td>
              <td>
               
                @if ($itemOfResp->id == Auth::user()->id)
                  <button class="btn btn-primary btn-sm mx-2" type="button"  v-on:click="flagChangeResponsable = !flagChangeResponsable" v-if="flagChangeResponsable && flagToQuitResponsable">Cambiar</button>
                  <button class="btn btn-danger btn-sm mx-2" type="button" v-if="flagChangeResponsable && flagToQuitResponsable" v-on:click="flagToQuitResponsable = !flagToQuitResponsable">Quitar</button>
                  {{-- AQUI EMPIEZA LA OPCION PARA CAMBIAR AL USUARIO DE RESPONSABLE--}}
                  <form action="{{ route('changeRolOfResp') }}" method="POST" class="form-inline" v-if="!flagChangeResponsable">
                    @csrf
                    @method('PUT')
                    <div class="form-group mx-sm-1 mb-2">
                      <select name="userToChange" class="form-control  form-control-sm" id="exampleFormControlSelect1" required>
                        <option value="" selected disabled>Elejir un usuario</option>
                        @foreach ($allUser as $itemChange)
                          <option value="{{ $itemChange->id }}">{{ $itemChange->name }} {{ $itemChange->lastName }}</option>
                        @endforeach
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mb-2">Elejir</button>
                    <button class="btn btn-danger btn-sm mb-2 mx-1" v-on:click="flagChangeResponsable = !flagChangeResponsable">Cancelar</button>
                  </form>
                  {{-- AQUI TERMINA LA OPCION PARA CAMBIAR AL USUARIO DE RESPONSABLE --}}

                  {{-- AQUI EMPIEZA LA OPCION PARA QUITAR AL RESPONSABLE COMPLETAMENTE --}}
                  <form action="{{ route('deleteRolOfResp') }}" class="form-inline" method="post" v-if="!flagToQuitResponsable">
                    @csrf
                    @method('DELETE')
                    <label for="quitResp">Esta seguro en dejar el puesto ? </label>
                    <input type="hidden" name="respActual" value="{{ $itemOfResp->id }}">
                    <button type="submit" class="btn btn-primary btn-sm mb-2 mx-1">Si</button>
                    <button type="button" class="btn btn-danger btn-sm mb-2 mx-1" v-on:click="flagToQuitResponsable = !flagToQuitResponsable">No</button>
                  </form>
                  {{-- AQUI TERMINA LA OPCION PARA QUITAR AL RESPONSABLE COMPLETAMENTE --}}

                @else
                  <button class="btn btn-primary btn-sm mx-2" type="button" disabled>None</button>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>

      </table>


    </div>
    
  </div>
</div>
@endsection
