<style>
    #fontheader {
        font-size: 1.563rem !important;
    }

    #fontheader2 {
        font-size: 4rem !important;
    }

    #fontp {
        font-size: 1.25rem !important;
    }

    .fontlink {
        font-size: 1rem !important;
    }

    .text-justify {
        text-align: justify;
    }

    .navbar {
        background-image: linear-gradient(to top, #12145c 0%, #1d52a6 100%);
    }

    .sidebar {
        background-image: linear-gradient(to top, #12145c 0%, #1d52a6 100%);
    }
</style>
<style>
    .bd-placeholder-img {
        font-size: 1rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 1rem;
        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
</style>
<style>
    .sidebar {
        position: fixed;
    }
</style>
<style>
    /* The sticky class is added to the navbar with JS when it reaches its scroll position */
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
    }
</style>
<main class="d-flex flex-nowrap text-white">
    <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px; min-height: 100%;">
        <br>
        <br>
        <br>
        <br>
        <div class="dropdown" id="fontlink">
            <a href="#" class="d-flex align-items-center link-light text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <h6 class>{{ Auth()->user()->fullname }}</h6>
            </a>
            <h1 class="fontlink">{{ Auth()->user()->role }}</h1>
            <ul class="dropdown-menu text-small shadow">
                <li>
                    <form class="d-flex" action="/logout" method="post">
                        @csrf
                        <button class="dropdown-item" id="fontlink" type="submit">Keluar Akun</button>
                    </form>
                </li>
            </ul>
        </div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto" id="fontlink">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link {{ $active === 'index' ? 'active' : 'link-light' }}"
                    aria-current="page">
                    <i class="bi bi-house-fill"></i> Beranda
                </a>
            </li>
            @if (Auth()->user()->role === 'Administrator')
                <li>
                    <a href="/dashboard/users" class="nav-link {{ $active === 'users' ? 'active' : 'link-light' }}">
                        <i class="bi bi-flag-fill"></i> Manajemen Akun
                    </a>
                </li>
                <li>
                    <a href="/dashboard/kelas" class="nav-link {{ $active === 'kelas' ? 'active' : 'link-light' }}">
                        <i class="bi bi-newspaper"></i> Manajemen Kelas
                    </a>
                </li>
                <li>
                    <a href="/dashboard/subjects"
                        class="nav-link {{ $active === 'subjects' ? 'active' : 'link-light' }}">
                        <i class="bi bi-newspaper"></i> Manajemen Mata Pelajaran
                    </a>
                </li>
                <li>
                    <a href="/dashboard/students"
                        class="nav-link {{ $active === 'students' ? 'active' : 'link-light' }}">
                        <i class="bi bi-newspaper"></i> Manajemen Siswa
                    </a>
                </li>
            @endif
            <li>
                <a href="/dashboard/presences" class="nav-link {{ $active === 'presences' ? 'active' : 'link-light' }}">
                    <i class="bi bi-person-video2"></i> Manajemen Presensi
                </a>
            </li>
            <li>
                <a href="/dashboard/reports" class="nav-link {{ $active === 'reports' ? 'active' : 'link-light' }}">
                    <i class="bi bi-person-video2"></i> Manajemen Rekapitulasi
                </a>
            </li>
        </ul>
        <hr>
    </div>
</main>
<nav class="navbar fixed-top navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" id="fontp" href="/">
            <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" width="40" height="40" class="">
            PresensiKu - Sistem Presensi Siswa Sekolah
        </a>
    </div>
</nav>
