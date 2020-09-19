@extends('layouts.app')
@section('title', 'Agregar campus')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h3></h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
           <div class="row">
               <div class="col">
                <form method="POST" action="{{ route('showCarrerasAnotherC') }}">
                    @csrf
                    <div class="form-group">
                        <label for="addCarreraCam">Primero debe elegir un campus </label>
                        <select name="selectCampus" class="form-control" id="addCarreraCam">
                        <option value="" disabled selected>Por favor elija un campus</option>
                        @foreach ($allCampus as $item)
                            @if ($item->id != $idCampus)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>     
                            @endif              
                        @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ver carreras</button>
                </form>
               </div>
           </div>
               @if (isset($allCarrerasByCampus))
               <div class="row">
                   <div class="col">
                    <form method="POST" action="{{ route('readyToaddNewCarreraOfAC', $campusSel->id) }}">
                     @csrf
                      {{-- <div class="form-group">
                        <label for="campusselected">Campus elejido</label>
                        <input name="campusSel" type="text" id="campusselected" class="form-control" placeholder="{{ $campusSel->name }}" >
                      </div> --}}

                        <div class="form-group">
                        <label for="newCarreraForC">Nombre de la carrera para el campus {{ $campusSel->name }}. </label>
                        <input name="carreraToAdd" type="text" class="form-control" id="newCarreraForC" required>
                        <small id="carreraToAdd" class="form-text text-muted">Por favor ingrese el nombre de completo.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                   </div>
                </div>
               @endif
           

        </div>
        <div class="col">
            @if (isset($allCarrerasByCampus))
                @if ($allCarrerasByCampus->count() > 0)
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($allCarrerasByCampus as $item)
                            <tr>
                            <th scope="row">1</th>
                            <td>{{ $item->carrera}}</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p>Valla al parecer este campus no tiene carreras.</p>                    
                @endif
            @else
                <p>Por favor elija su campus</p>
            @endif
        </div>
    </div>
</div>
@endsection