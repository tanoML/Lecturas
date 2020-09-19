@extends('layouts.app')

@section('title', 'Actualizar datos')
@section('sidebar')
  <header>
    @include('components.responsable.navbar')
  </header>
@endsection

@section('content')
<div class="container">

  @if (session('updateResp'))
  <div class="alert alert-success">
      <ul>
          <li>{{ session('updateResp') }}</li>
      </ul>
  </div>
@endif

 <div class="d-flex justify-content-center">

  <div class="p-2 bd-highlight">
    <div class="card" style="width: 18rem;">
      <img src="{{ asset('storage/userPerfilD.jpg') }}" class="card-img-top" alt="perfil">
      <div class="card-body">
        <h5 class="card-title">Datos registrados</h5>
        <p class="card-text">
          Nombre: {{ Auth::user()->name}} {{ Auth::user()->lastName }} <br>
          Correo: {{ Auth::user()->email }} <br>
          Campus: {{ $instituto->nameCampus }} <br>
          Carrera: {{ $instituto->carrera }} <br>
        </p>
      
        <transition name="slide-fade">
          <a class="btn btn-primary" v-on:click="flagUpdateResponsable = !flagUpdateResponsable" v-if="!flagUpdateResponsable">Editar datos</a>
        </transition>
        <footer v-if="!flagUpdateResponsable"><a href="{{ route('showFormPassResp') }}">Actualizar contrasenia</a></footer>
     
      </div>
    </div>
  </div>

<transition name="slide-fade">
  <div class="p-2 bd-highlight" v-if="flagUpdateResponsable">


    <form action="{{ route('readyToUpdateResp') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Nombre</label>
        <input name="name" type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" autofocus>
      </div>
      <div class="form-group">
        <label for="lastName">Apellidos</label>
        <input name="lastName" type="text" class="form-control" id="lastName" value="{{ Auth::user()->lastName }}">
      </div>
      <div class="form-group">
        <label for="campus">Campus</label>
        <select name="campus" class="form-control" id="campus" v-model="selectedUpdateRes" @change="getCarrersResponsableUpdate()">
          <option value="" disabled selected>Seleccione su nuevo campus</option>
          @foreach ($allCampus as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach

        </select>
      </div>
      <div class="form-group">
        <label for="carrera">Carrera</label>
        <select name="carrer" class="form-control" id="carrera">
          <option disabled selected>Seleccione su nueva carrera</option>
          <option v-for="carrer in carrers" :key="carrer.id" v-bind:value="carrer.id">@{{ carrer.carrera }}</option>

        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Correo electronico</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Auth::user()->email}}">
      </div>
      
      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
    <footer>
      <button class="btn btn-primary" v-on:click="flagUpdateResponsable = !flagUpdateResponsable">Cancelar</button>
    </footer>
  </div>

</transition>

</div>

      

</div>
@endsection
