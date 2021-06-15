<!-- Navigation -->
<h6 class="navbar-heading text-muted">
  @if (auth()->user()->role == 'admin')
    Gestionar Datos
  @else
    Menú
  @endif
</h6>
<ul class="navbar-nav">
  @if (auth()->user()->role == 'admin')
      <li class="nav-item">
        <a class="nav-link" href="/home">
          <i class="ni ni-tv-2 text-primary"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/specialties">
          <i class="ni ni-atom text-blue"></i> Especialidades
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/doctors">
          <i class="ni ni-single-02 text-orange"></i> Médicos
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/patients">
          <i class="ni ni-satisfied text-info"></i> Pacientes
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Hasta Luego" onclick="event.preventDefault(); document.getElementById('formLogout').submit(); ">
          <i class="ni ni-key-25"></i> Cerrar sesión
        </a>
        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
          @csrf
        </form>
      </li>
  @elseif(auth()->user()->role == 'doctor')
      <li class="nav-item">
          <a class="nav-link" href="/schedule">
            <i class="ni ni-calendar-grid-58 text-primary"></i> Gestionar Horario
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/specialties">
          <i class="ni ni-time-alarm text-primary"></i> Mis citas
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/patients">
          <i class="ni ni-satisfied text-info"></i> Mis pacientes
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Hasta Luego" onclick="event.preventDefault(); document.getElementById('formLogout').submit(); ">
          <i class="ni ni-key-25"></i> Cerrar sesión
        </a>
        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
          @csrf
        </form>
      </li>
  @else {{-- patient --}}
      <li class="nav-item">
          <a class="nav-link" href="/home">
            <i class="ni ni-calendar-grid-58 text-primary"></i> Reservar cita
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/specialties">
          <i class="ni ni-laptop text-primary"></i> Mis citas
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Hasta Luego" onclick="event.preventDefault(); document.getElementById('formLogout').submit(); ">
          <i class="ni ni-key-25"></i> Cerrar sesión
        </a>
        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
          @csrf
        </form>
      </li>
  @endif
</ul>

@if (auth()->user()->role == 'admin')
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Reportes</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="ni ni-watch-time text-orange"></i> Frecuencia de Citas
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="ni ni-chart-bar-32 text-green"></i> Médicos más activos
    </a>
  </li>
</ul>
@endif