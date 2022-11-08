@extends('dashboard.layouts.main')

@section('container')
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
    </style>
    <div class="card ">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-header fontlink">
            Dashboard
        </div>
        <div class="card-body">
            <h5 class="card-title" id="fontheader">Manajemen Presensi</h5>
            <p class="card-text" id="fontp">Seluruh presensi terdapat di tabel ini</p>
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
                    <a href="/dashboard/presences/create" class="btn text-white bg-primary border-0">+ Tambah Presensi
                        Baru</a>
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
        <div class="card-footer text-muted">
            @presensiku
        </div>
    </div>
@endsection
