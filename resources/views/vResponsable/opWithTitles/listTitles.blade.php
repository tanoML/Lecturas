@extends('layouts.app')

@section('title', 'Inicio')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection

@section('content')
<div class="container">

  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


  <hr>
  <div class="row justify-content-md-center">
      <h2>Lista de titulos recibidos</h2>
  </div>
  <hr>
  <br>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Autor</th>
        <th scope="col">Operaciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($allTitle as $key => $item)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->author }}</td>
                <td>
                  <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="p-2 bd-highlight"><a href="{{ route('check-titles.show', $item->id) }}" class="btn btn-info">Confirmar datos</a></div>
                    <div class="p-2 bd-highlight"><a href="{{ route('check-titles.edit',$item->id) }}" class="btn btn-warning">Editar</a></div>
                    {{-- <div class="p-2 bd-highlight"><a href="{{ route('check-titles.store') }}" class="btn btn-success">Aceptar</a></div> --}}
                    <div class="p-2 bd-highlight">
                      <form action="{{ route('check-titles.destroy', $item->id) }}" method="post">@csrf @method('DELETE') <button type="submit" class="btn btn-danger">Rechazar</button></form>
                    </div>

                  </div>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{ $allTitle->links() }}
      

</div>
@endsection
