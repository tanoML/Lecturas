@extends('layouts.app')

@section('title', 'Actualizar contrasenia')
@section('sidebar')
  <header>
    @include('components.alumno.navbar');
  </header>
@endsection
@section('content')
<div class="container">
  
  <div class="row">
    @if ($errors->any())
      <div class="alert alert-danger d-block" role="alert">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    @if (session('error'))
      <div class="alert alert-danger d-block" role="alert">
          {{ session('error') }}
      </div>
    @endif


  </div>
  <div class="row">
  
    <div class="col-sm-8">

      <form action="{{ route('updatePassword') }}" method="POST">
        @csrf
        @method('PUT')
      
        <div class="form-row">
        
            <div class="form-group col-md-4">
                <label for="oldPassword">Contrasenia actual</label>
                <input name="password_old" type="password" class="form-control" id="oldPassword" autocomplete="off">
              </div>
    
          <div class="form-group col-md-4">
            <label for="newPassword">Contrasenia nueva</label>
            <input name="password" type="password" class="form-control" id="newPassword" autocomplete="off">
          </div>
    
          <div class="form-group col-md-4">
            <label for="newPasswordConfirm">Repetir contrasenia nueva</label>
            <input name="password_confirmation" type="password" class="form-control" id="newPasswordConfirm" autocomplete="off">
          </div>
    
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
       
      </form>

    </div>
  </div>

</div>
@endsection
