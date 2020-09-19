@extends('layouts.app')

@section('title', 'Actualizar datos')
@section('sidebar')
  <header>
    @include('components.alumno.navbar');
  </header>
@endsection
 
@section('content')
<div class="container">

  <div class="row">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    @if (session('updateChanges'))
      <div class="alert alert-success">
          <ul>
              <li>{{ session('updateChanges') }}</li>
          </ul>
      </div>
    @endif

  </div>

  <div class="row">
    <div class="col-sm-4">

      <div class="card">
        <img src="{{ asset('storage/userPerfil.jpg') }}" class="card-img-top" alt="perfil">
        <div class="card-body">
          <h5 class="card-title">{{ Auth::user()->name }} {{ Auth::user()->lastName }}</h5>
          <p class="card-text">
            Correo: {{ Auth::user()->email }} <br>
            Campus: {{ $instituto->name }}  <br>
            Carrera: {{ $instituto->carrera }} <br>
            Matricula: {{ $allData[0]->matricula }} <br>
            Semestre: {{ $allData[0]->id_semestre }} <br>
            Sexo: {{ $allData[0]->sexo }} <br>
          </p>
          <transition name="slide-fade">
          <a class="btn btn-primary" v-on:click="flagUpdateStudent = !flagUpdateStudent" v-if="!flagUpdateStudent">Editar datos</a>
          </transition>
          <footer>
            <a href="{{ route('formToUpdatePass') }}"  v-if="!flagUpdateStudent">Cambiar contrasenia</a>
          </footer>
        </div>

      </div>

    </div>

    <div class="col-sm-8">
<transition name="slide-fade">
  <div v-if="flagUpdateStudent">
      <form action="{{ route('storeUpdate') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Nombre</label>
            <input name="name" type="text" class="form-control" id="name" value="{{ Auth::user()->name }}">
          </div>
          <div class="form-group col-md-6">
            <label for="secondName">Apellidos</label>
            <input name="lastName" type="text" class="form-control" id="secondName" value="{{ Auth::user()->lastName }}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12 col-sm-12">
            <label for="campus">Campus</label>
            <select name="campus" id="campus" class="form-control" v-model="selectedUpdate" @change="getCarrersUpdate()">
                <option value="" disabled selected>{{ _('Campus actual: '). $instituto->name }}</option>
              @foreach ($allCampus as $key => $campus)
                    <option value="{{ $campus->id }}">{{ $campus->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12 col-sm-12">
            <label for="carrera">Cambiar Carrera</label>
            <select name="carrer" id="carrera" class="form-control">
              <option value="" disabled selected>{{ _('Carrera actual: ').  $instituto->carrera }}</option>
              <option value="" disabled v-if="flagCarrer == 0">{{ _('Por favor vuelva a elejir el campus si desea cambiar de carrera.') }}</option>
              
              <option v-for="carrer in carrers" :key="carrer.id" v-bind:value="carrer.id"> @{{ carrer.carrera }} </option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="email">Correo</label>
            <input name="email" type="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
          </div>

          <div class="form-group col-md-4">
              <label for="name">Matricula</label>
              <input name="matricula" type="text" class="form-control" id="matricula" value="{{ $allData[0]->matricula }}">
          </div>

          <div class="form-group col-md-4">
            <label for="semestre">Semestre</label>
            <select name="semestre" class="form-control" id="semestre">
              <option value="{{ $allData[0]->id_semestre }}" selected>{{ $allData[0]->id_semestre }}</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar datos</button>
      </form>
      <button class="btn btn-primary" v-on:click="flagUpdateStudent = !flagUpdateStudent">Cancelar</button>
    </div>
</transition>
    </div>
  </div>

</div>
@endsection
