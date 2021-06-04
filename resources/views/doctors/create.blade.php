@extends('layouts.panel')

@section('title')
  Agregando Médicos
@endsection

@section('content')
  <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Agregando Médicos</h3>
          </div>
          <div class="col text-right">
            <a href="{{ url('doctors') }}" class="btn btn-sm btn-default">Volver</a>
          </div>
        </div>
      </div>

      <div class="card-body">
        @if ($errors->any())
          <ul>
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <li>{{ $error }}</li>
                </div>
            @endforeach
          </ul>
         @endif
        <form action="{{ url('doctors') }}" method="post">
          @csrf
            <div class="form-group">
                <label for="name">Nombre del médico:</label>
                <input type="text" name="name" class="form-control form-control-sm" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="text" name="email" class="form-control form-control-sm" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" class="form-control form-control-sm" value="{{ old('dni') }}">
            </div>

            <div class="form-group">
                <label for="address">Dirección:</label>
                <input type="text" name="address" class="form-control form-control-sm" value="{{ old('address') }}">
            </div>

            <div class="form-group">
                <label for="phone">Teléfono:</label>
                <input type="text" name="phone" class="form-control form-control-sm" value="{{ old('phone') }}">
            </div>

            <button type="submit" class="btn btn-sm btn-primary">
              Guardar
            </button>
        </form>
      </div>
  </div>
@endsection
