@extends('layouts.panel')

@section('title')
  Gestionar Horario
@endsection

@section('content')

<form action="{{ url('/schedule') }}" method="post">
  @csrf
  <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Desde aquí puedes gestionar tu horario</h3>
          </div>
          <div class="col text-right">
            <button type="submit" class="btn btn-sm btn-success">Guardar cambios</button>
          </div>
        </div>
      </div>

      <div class="card-body">
        @if(session('notification'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Exito!</strong> {{ session('notification') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(session('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Los cambios se han guardado pero ten en cuenta que:
              <ul>
                  @foreach (session('errors') as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul>
              </strong>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
      </div>

      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Día</th>
              <th scope="col">Activo</th>
              <th scope="col">Turno mañana</th>
              <th scope="col">Turno tarde</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($workDays as $key => $workDay)
              <tr>
                <th>{{ $days[$key] }}</th>
                  <td>
                    <label class="custom-toggle">
                      <input type="checkbox"  name="active[]" value="{{ $key }}"
                      @if($workDay->active) checked @endif>
                      <span class="custom-toggle-slider rounded-circle"></span>
                    </label>
                  </td>
                  <td>
                    <div class="row">
                      <div class="col">
                        <select class="form-control" name="morning_start[]">
                            @for ($i=6; $i<=11; $i++)
                              <option value="{{ ($i<10 ? '0' : '') . $i }}:00"
                                @if($i.':00 AM' == $workDay->morning_start) selected @endif>
                                {{$i}}:00 am
                              </option>
                              <option value="{{ ($i<10 ? '0' : '') . $i }}:00"
                                @if($i.':30 AM' == $workDay->morning_start) selected @endif>
                                {{$i}}:30 am
                              </option>
                            @endfor
                        </select>
                      </div>

                      <div class="col">
                        <select class="form-control" name="morning_end[]">
                            @for ($i=6; $i<=11; $i++)
                              <option value="{{ ($i<10 ? '0' : '') . $i }}:00"
                                @if($i.':00 AM' == $workDay->morning_end) selected @endif>
                                {{$i}}:00 am
                              </option>
                              <option value="{{ ($i<10 ? '0' : '') . $i }}:00"
                                @if($i.':30 AM' == $workDay->morning_end) selected @endif>
                                {{$i}}:30 am
                              </option>
                            @endfor
                        </select>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="row">
                      <div class="col">
                        <select class="form-control" name="afternoon_start[]">
                            @for ($i=1; $i<=11; $i++)
                              <option value="{{$i+12}}:00"
                                @if($i.':00 PM' == $workDay->afternoon_start) selected @endif>
                                {{$i}}:00 PM
                              </option>
                              <option value="{{$i+12}}:00"
                                @if($i.':30 PM' == $workDay->afternoon_start) selected @endif>
                                {{$i}}:30 PM
                              </option>
                            @endfor
                        </select>
                      </div>

                      <div class="col">
                        <select class="form-control" name="afternoon_end[]">
                            @for ($i=1; $i<=11; $i++)
                            <option value="{{$i+12}}:00"
                                @if($i.':00 PM' == $workDay->afternoon_end) selected @endif>
                                {{$i}}:00 PM
                              </option>
                              <option value="{{$i+12}}:00"
                                @if($i.':30 PM' == $workDay->afternoon_end) selected @endif>
                                {{$i}}:30 PM
                              </option>
                            @endfor
                        </select>
                      </div>
                    </div>



                  </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</form>

@endsection
