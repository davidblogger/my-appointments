@extends('layouts.panel')

@section('title')
  Editando Especialidad
@endsection

@section('content')
  <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Editando >> <i>{{$specialty->name}}</i></h3>
          </div>
          <div class="col text-right">
            <a href="{{ url('specialties') }}" class="btn btn-sm btn-default">Volver</a>
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
        <form action="{{ url('specialties/'.$specialty->id) }}" method="post">
          @csrf
          @method('PUT')
            <div class="form-group">
                <label for="name">Nombre de la especialidad</label>
                <input type="text" name="name" class="form-control form-control-sm" value="{{ old('name', $specialty->name) }}">
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" name="description" class="form-control form-control-sm" value="{{ old('description', $specialty->description) }}">
            </div>

            <button type="submit" class="btn btn-sm btn-primary">
              Guardar
            </button>
        </form>
      </div>
  </div>
@endsection
