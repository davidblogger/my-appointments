@extends('layouts.panel')

@section('title')
  Editando Pacientes
@endsection

@section('content')
  <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Editando Pacientes</h3>
          </div>
          <div class="col text-right">
            <a href="{{ url('patients/') }}" class="btn btn-sm btn-default">Volver</a>
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
        <form action="{{ url('patients/'.$patient->id) }}" method="post">
          @csrf
          @method('PUT')
            <div class="form-group">
                <label for="name">Nombre del paciente:</label>
                <input type="text" name="name" class="form-control form-control-sm" value="{{ old('name', $patient->name) }}">
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="text" name="email" class="form-control form-control-sm" value="{{ old('email', $patient->email) }}">
            </div>

            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" class="form-control form-control-sm" value="{{ old('dni', $patient->dni) }}">
            </div>

            <div class="form-group">
                <label for="address">Dirección:</label>
                <input type="text" name="address" class="form-control form-control-sm" value="{{ old('address', $patient->address) }}">
            </div>

            <div class="form-group">
                <label for="phone">Teléfono:</label>
                <input type="text" name="phone" class="form-control form-control-sm" value="{{ old('phone', $patient->phone) }}">
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="text" name="password" class="form-control form-control-sm" value="">
                <small class="text-warning"><i>Ingrese un valor sólo si desea modificar la contraseña</i></small>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">
              Guardar
            </button>
        </form>
      </div>
  </div>
@endsection
