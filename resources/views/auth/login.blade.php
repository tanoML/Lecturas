@extends('layouts.app')

@section('title', 'Iniciar sesion')
@section('sidebar')
  <header>
      @include('components.general.navbar')
  </header>
@endsection

@section('content')
<div class="container my-3 ">
    <div class="row justify-content-center">
        <div class="col-md-6">

            {{-- <div class="jumbotron jumbotron-fluid"> --}}

                {{-- <div class="card"> --}}
                {{-- <div class="card-header">{{ __('Iniciar sesion') }}</div> --}}

                {{-- <div class="card-body"> --}}

                <div class="shadow-lg p-3 mb-5 bg-white rounded">

                   
                    <form method="POST" action="{{ route('login') }}" class="rounded py-4">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Haz olvidado tu contrasenia?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                </div>


                    {{-- </div> --}}

                {{-- </div> --}}

            {{-- </div> --}}

        </div>
    </div>
</div>
@endsection


@section('beforefooter')
    @include('components.beforeFooter')
@endsection
