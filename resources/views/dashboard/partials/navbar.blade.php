<nav class="navbar sticky-top navbar-light navbar-expand-md py-3"
    style="font-family: ABeeZee, sans-serif; background: var(--bs-white);">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/dashboard">
            <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" width="40" height="40"
                class=""><span> Dashsboard - PresensiKu</span></a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span
                class="visually-hidden">Toggle
                navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-2">
            <ul class="navbar-nav ms-auto">
                @if (Auth()->user()->role === 'Administrator')
                    <li class="nav-item dropdown ">
                        <a class="nav-link {{ $active === 'manajemen' ? 'active' : '' }} dropdown-toggle" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manajemen
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard/users">Manajemen Akun</a></li>
                            <li><a class="dropdown-item" href="/dashboard/kelas">Manajemen Kelas</a></li>
                            <li><a class="dropdown-item" href="/dashboard/subjects">Manajemen Mata Pelajaran</a></li>
                            <li><a class="dropdown-item" href="/dashboard/students">Manajemen Siswa</a></li>
                            <li><a class="dropdown-item" href="/dashboard/datasets">Manajemen Dataset</a></li>
                            <li><a class="dropdown-item" href="/dashboard/presences">Manajemen Presensi</a></li>
                            <li><a class="dropdown-item" href="/dashboard/reports">Manajemen Rekapitulasi</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown ">
                        <a class="nav-link {{ $active === 'manajemen' ? 'active' : '' }} dropdown-toggle" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manajemen
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard/presences">Manajemen Presensi</a></li>
                            <li><a class="dropdown-item" href="/dashboard/reports">Manajemen Rekapitulasi</a></li>
                        </ul>
                    </li>
                @endif
                <li class="nav-item"><a class="nav-link {{ $active === 'index' ? 'active' : '' }}"
                        href="/dashboard">Beranda</a></li>
            </ul>
        </div>
    </div>
</nav>
