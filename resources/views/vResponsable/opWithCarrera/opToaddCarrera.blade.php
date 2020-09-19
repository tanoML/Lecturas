@extends('layouts.app')

@section('title', 'Agregar campus')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection
@section('content')
<div class="container">
@isset($success)
<div class="alert alert-success" role="alert">
     {{$success}}
</div>
@endisset

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    <div class="row text-center">
        <div class="col">
            <h3>Panel para agregar, editar o eliminar las carreras</h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
                <form method="POST" action="{{ route('addCarrera', $idCampus) }}">
                  @csrf
                    <div class="form-group">
                        <label for="newCarrera">Campus {{ $nameCampus->name }}</label>
                        <input name="newCarrera" type="text" class="form-control" id="newCarrera" placeholder="Nombre de la nueva carrera." required value="{{ old('newCarrera') }}">
                        <small id="newCarrera" class="form-text text-muted">Por favor ingrese el nombre de la carrera de forma completa, como se muestra en la tabla </small>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
                <a class="btn btn-warning my-2" href="{{ route('OpWithCarrers') }}">Regresar</a><br>
                <a href="{{ route('addCarreraAnothCampus') }}">Ingresar carrera de otro campus.</a>

        </div>
        <div class="col-sm-8">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Last</th>
                    <th scope="col">Operaciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($allCarreras as $keyCarrera => $item)
                        <tr>
                        <th scope="row">{{ $keyCarrera + 1 }}</th>
                        <td>{{ $item->carrera }}</td>
                        <td>{{ $item->updated_at->diffForHumans() }}</td>
                        <td>
                            <div class="d-flex flex-row bd-highlight mb-3">
                                <div class="p-2 bd-highlight">
                                    <a href="{{ route('viewToEditCarrera', $item->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <form action="{{ route('deleteCarrera', $item->id) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              {{ $allCarreras->links() }}
        </div>
    </div>
</div>
@endsection