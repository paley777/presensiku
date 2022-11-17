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
                <h2>Manajemen Kelas</h2>
                <p class="w-lg-50">Cari, lihat, tambah, ubah dan hapus data.</p>
            </div>
            <div class="row">
                <div class="col-9">
                    <form action="/dashboard/kelas">
                        <div class="input-group mb-3 fontlink">
                            <input type="text" class="form-control" placeholder="Cari Berdasarkan Nama Kelas"
                                name="search" value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-3">
                    <a href="/dashboard/kelas/create" class="btn btn-primary"><svg class="bi bi-plus-circle-fill"
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z">
                            </path>
                        </svg> Tambah Kelas Baru</a>
                </div>
            </div>
        </div>
        <table class="table table-hover fontlink">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Jumlah Siswa</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($kelas as $key => $kela)
                        <td>{{ $kelas->firstItem() + $key }}</td>
                        <td>{{ $kela->nama_kelas }}</td>
                        <td>{{ $kela->jumlah }}</td>
                        <td>
                            <a href="/dashboard/kelas/{{ $kela->id }}/edit" class="badge bg-warning border-0">Edit</a>
                            <form action="/dashboard/kelas/{{ $kela->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Anda Yakin?')">Hapus</button>
                            </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center">
                {{ $kelas->links() }}
            </div>
        </div>
    </div>
@endsection
