@extends('layouts.app')
@section('title', 'Agregar campus')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection

@section('content')
<div class="container">

{{-- start for message section --}}
@if (session('wrong') || session('success'))
    <div class="{{ session('success') != null ?  'alert alert-success' : "alert alert-danger"  }}"  role="alert">
          {{ session('success') != null ?   session('success') : session('wrong') .  session('campusChoice') . ' por que cuenta con carreras asociadas, primero debe eliminar sus carreras. ' }}
    </div>
@endif
{{-- end for message section --}}
{{-- start for error message  --}}
@error('campusNew')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
{{-- end for error message  --}}

    <div class="row justify-content-md-center">
        <h3>Panel para agregar, editar o modificar los campus.</h3>
    </div>
    <hr>
    <div class="row py-5">
        <div class="col">
            <form method="POST" action="{{ route('addCampus') }}">
              @csrf
              <div class="form-group">
                <label for="campusNew">Nombre del campus: </label>
                <input name="campusNew" type="text" class="form-control" id="campusNew">
                <small id="campusNew" class="form-text text-muted">Por favor solo agregue el nombre del campus por ejemplo: Tehuantepec</small>
              </div>
              <button type="submit" class="btn btn-primary">Agregar</button>
          </form>

          <a href="{{ route('OpWithCarrers') }}" class="btn btn-warning my-3">Regresar</a>

        </div>
        <div class="col">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Operaciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($allCampus as $keyCampus => $item)
                            <tr>
                                <th scope="row">{{ $keyCampus + 1 }}</th>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="d-flex flex-row bd-highlight mb-3">
                                        <div class="p-2 bd-highlight">
                                            <a href="{{ route('editCampus', $item->id) }}" class="btn btn-secondary">Editar</a>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            {{-- start form by delete --}}
                                            <form action="{{ route('deleteCampus', $item->id ) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="campus" value="{{ $item->name }}">
                                                <button type="submit" class="btn btn-danger">Borrar</button>
                                            </form>
                                            {{-- end form by delete --}} 
                                        </div>
                                    </div>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                  </table>
            
           
        </div>
      </div>
</div>
@endsection


