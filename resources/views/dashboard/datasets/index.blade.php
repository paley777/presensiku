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
            <h5 class="card-title" id="fontheader">Manajemen Dataset</h5>
            <p class="card-text" id="fontp">Seluruh Dataset Wajah Siswa terdapat di tabel ini</p>
            <div class="row">
                <div class="col-9">
                    <form action="/dashboard/datasets">
                        <div class="input-group mb-3 fontlink">
                            <input type="text" class="form-control" placeholder="Cari Berdasarkan Nama Siswa"
                                name="search" value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-hover fontlink">
                <thead>
                    <tr>
                        <th scope="col">ID Siswa.</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Dataset</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($datasets as $dataset)
                            <td>{{ $dataset->id_student }}</td>
                            <td>{{ $dataset->fullname }}</td>
                            <td>
                                <img class="" width="100px" height="100px" style="object-fit: cover;"
                                    src="{{ asset('storage/' . $dataset->dataset1) }}">
                                <img class="" width="100px" height="100px" style="object-fit: cover;"
                                    src="{{ asset('storage/' . $dataset->dataset2) }}">
                                <img class="" width="100px" height="100px" style="object-fit: cover;"
                                    src="{{ asset('storage/' . $dataset->dataset3) }}">
                            </td>
                            <td>
                                <a href="/dashboard/datasets/{{ $dataset->id }}/edit"
                                    class="badge bg-warning border-0">Edit</a>
                                <form action="/dashboard/datasets/{{ $dataset->id }}" method="post" class="d-inline">
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
                    {{ $datasets->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        @presensiku
    </div>
    </div>
@endsection
