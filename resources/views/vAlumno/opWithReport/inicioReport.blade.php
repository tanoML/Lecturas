@extends('layouts.app')
@section('title', 'Reporte')
@section('sidebar')
  <header>
    @include('components.alumno.navbar');
  </header>
@endsection

@section('content')
<div class="container">

    <h1>Reporte de lecturas</h1>

    <hr class="my-3">

   <div class="row">
       <div class="col">
        <form>
          
            <div class="form-group">
              <label for="exampleFormControlSelect1">Example select</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Example textarea</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="15"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Entregar</button>

            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
       </div>
   </div>

      

</div>
@endsection
