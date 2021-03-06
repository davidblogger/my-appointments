@extends('layouts.form')

@section('title', 'Registro de Usuario')
@section('subtitle', 'Ingresa tus datos para registrarte')

@section('content')
<div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">

            <div class="card-body px-lg-5 py-lg-5">

                <!--Mostrar errores-->
                @if($errors->any())
                <div class="text-center text-muted mb-4">
                    <small class="text-danger">Ha ocurrido un error</small>
                </div>
                <div class="alert alert-danger" role="alert">
                     {{ $errors->first() }}
                </div>
                @endif



              <div class="text-center text-muted mb-4">

              </div>
              <form role="form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nombre" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Contrase??a" type="password" name="password" required autocomplete="new-password">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Confirmar contrase??a" type="password" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>


                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Confirmar registro</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
