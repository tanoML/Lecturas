@extends('layouts.app')

@section('title', 'Acerca de')

@section('sidebar')
  <header>
    @include('components.general.navbar')
  </header>
@endsection

@section('content')
<div class="container">

    <div class="jumbotron">

      <div class="row justify-content-md-center">
        <div class="col-6 col-sm-4">

          <div class="shadow p-3 mb-5 bg-white rounded">
            <div class="card">
              <div class="card-body">
                This is some text within a card body. Lorem ipsum dolor 
                sit amet consectetur adipisicing elit. Eos, cumque!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, quisquam!
              </div>
            </div>
          </div>

        </div>
        <div class="col-6 col-sm-4">

          <div class="shadow p-3 mb-5 bg-white rounded">
            <div class="card">
              <div class="card-body">
                This is some text within a card body. Lorem ipsum, dolor sit amet 
                consectetur adipisicing elit. Ab, dolor aliquid? Quaerat earum laboriosam sapiente?
              </div>
            </div>
          </div>
        </div>

        <!-- Force next columns to break to new line at md breakpoint and up -->
        <div class="w-100 d-none d-md-block"></div>

        <div class="col-6 col-sm-4">

          <div class="shadow p-3 mb-5 bg-white rounded">
            <div class="card">
              <div class="card-body">
                This is some text within a card body.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore quisquam iusto facilis eos odio laborum.
              </div>
            </div>
          </div>

        </div>
        <div class="col-6 col-sm-4">

          <div class="shadow p-3 mb-5 bg-white rounded">
            <div class="card">
              <div class="card-body">
                This is some text within a card body.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit perspiciatis quas inventore optio, tempore iure!
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

    

</div>
@endsection

@section('beforefooter')
    @include('components.beforeFooter')
@endsection
