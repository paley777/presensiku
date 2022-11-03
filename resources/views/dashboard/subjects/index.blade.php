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
            <h5 class="card-title" id="fontheader">Manajemen Mata Pelajaran</h5>
            <p class="card-text" id="fontp">Seluruh mata pelajaran terdapat di tabel ini</p>
            <div class="row">
                <div class="col-9">
                    <form action="/dashboard/subjects">
                        <div class="input-group mb-3 fontlink">
                            <input type="text" class="form-control" placeholder="Cari Berdasarkan Nama Mata Pelajaran"
                                name="search" value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-3">
                    <a href="/dashboard/subjects/create" class="btn text-white bg-primary border-0">+ Tambah Mata Pelajaran
                        Baru</a>
                </div>
            </div>
            <table class="table table-hover fontlink">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Mata Pelajaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($subjects as $key => $subject)
                            <td>{{ $subjects->firstItem() + $key }}</td>
                            <td>{{ $subject->nama_mapel }}</td>
                            <td>
                                <a href="/dashboard/subjects/{{ $subject->id }}/edit"
                                    class="badge bg-warning border-0">Edit</a>
                                <form action="/dashboard/subjects/{{ $subject->id }}" method="post" class="d-inline">
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
                    {{ $subjects->links() }}
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            @presensiku
        </div>
    </div>
@endsection
