<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SI Magang Prodi</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is(checkRole(Auth::user()->id_role)) ? 'active' : '' }}" aria-current="page" href="/{{ checkRole(Auth::user()->id_role) }}">Home</a>
          </li>
          @if (Auth::user()->id_role ==  '1')
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/perusahaan*') ? 'active' : '' }}" href="{{ route('perusahaan.index') }}">Perusahaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/dosen*') ? 'active' : '' }}" href="{{ route('dosen.index') }}">Dosen</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/mahasiswa*') ? 'active' : '' }}" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/mentor*') ? 'active' : '' }}" href="{{ route('mentor.index') }}">Mentor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/applymagang*') ? 'active' : '' }}" href="{{ route('applymagang.index') }}">Apply Magang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/magang*') ? 'active' : '' }}" href="{{ route('magang.index') }}">Magang</a>
            </li>
          @elseif (Auth::user()->id_role == '3')
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/profile') ? 'active' : '' }}" href="{{ route('dosen.profile') }}">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/perusahaan*') ? 'active' : '' }}" href="{{ route('perusahaan.index') }}">Perusahaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/dosen*') ? 'active' : '' }}" href="{{ route('dosen.index') }}">Dosen</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/mahasiswa*') ? 'active' : '' }}" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/mentor*') ? 'active' : '' }}" href="{{ route('mentor.index') }}">Mentor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/applymagang*') ? 'active' : '' }}" href="{{ route('applymagang.index') }}">Apply Magang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/magang*') ? 'active' : '' }}" href="{{ route('magang.index') }}">Magang</a>
            </li>
          @elseif (Auth::user()->id_role == '2')
            <li class="nav-item">
              <a class="nav-link {{ Request::is('mahasiswa/profile') ? 'active' : '' }}" href="{{ route('mahasiswa.profile') }}">Profile</a>
            </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Form
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('mahasiswa.formApplyMagang') }}">Apply Magang</a></li>
              <li><a class="dropdown-item" href="{{ route('mahasiswa.formMagang') }}">Magang</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('mahasiswa/list-magang') ? 'active' : '' }}" href="{{ route('mahasiswa.listMagang') }}">Magang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('mahasiswa/list-apply-magang') ? 'active' : '' }}" href="{{ route('mahasiswa.listApplyMagang') }}">Apply Magang</a>
          </li>
          @endif
        </ul>
        <form class="d-flex" action='{{ route('logout') }}'>
          @csrf
          <button class="btn btn-outline-success" type="submit">Logout</button>
        </form>
      </div>
    </div>
  </nav>