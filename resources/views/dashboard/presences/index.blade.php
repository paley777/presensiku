@extends('dashboard.layouts.main')

@section('container')
    <div class="container" style="font-family: ABeeZee, sans-serif;">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h2>Manajemen Presensi</h2>
                <p class="w-lg-50">Cari, lihat, tambah, ubah dan hapus data.</p>
            </div>
            <div class="row">
                <div class="col-9">
                    <form action="/dashboard/presences">
                        <div class="input-group mb-3 fontlink">
                            <input type="text" class="form-control" placeholder="Cari Berdasarkan Nama Presensi"
                                name="search" value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-3">
                    <a href="/dashboard/presences/create" class="btn btn-primary"><svg class="bi bi-plus-circle-fill"
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                            </path>
                        </svg> Tambah Presensi Baru</a>
                </div>
            </div>
        </div>
        <table class="table table-hover fontlink">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Nama Presensi</th>
                    <th scope="col">Pembuat</th>
                    <th scope="col">Mata Pelajaran</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($presences as $key => $presence)
                        <td>{{ $presences->firstItem() + $key }}</td>
                        <td>{{ $presence->created_at }}</td>
                        <td>{{ $presence->nama_presensi }}</td>
                        <td>
                            @foreach ($users as $user)
                                @if ($presence->id_user == $user->id)
                                    {{ $user->fullname }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($subjects as $subject)
                                @if ($presence->id_mapel == $subject->id)
                                    {{ $subject->nama_mapel }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($kelas as $kela)
                                @if ($presence->id_kelas == $kela->id)
                                    {{ $kela->nama_kelas }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $presence->status }}</td>
                        <td>
                            <a href="/dashboard/presences/{{ $presence->id }}/edit"
                                class="badge bg-warning border-0">Edit</a>
                            <form action="/dashboard/presences/{{ $presence->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Anda Yakin?')">Hapus</button>
                            </form>
                            @if ($presence->status == 'BELUM SELESAI')
                                <form action="/dashboard/presences/start" method="post" class="d-inline">
                                    @csrf
                                    <input type="hidden" class="form-control" name="id"
                                        value="{{ old('id', $presence->id) }}" required readonly>
                                    <input type="hidden" class="form-control" name="id_kelas"
                                        value="{{ old('id', $presence->id_kelas) }}" required readonly>
                                    <button class="badge bg-primary border-0"
                                        onclick="return confirm('Mulai Presensi?')">Mulai Presensi</button>
                                </form>
                            @endif

                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center">
                {{ $presences->links() }}
            </div>
        </div>
    </div>
@endsection
