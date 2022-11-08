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
            <h5 class="card-title" id="fontheader">Manajemen Siswa</h5>
            <p class="card-text" id="fontp">Seluruh Siswa terdapat di tabel ini</p>
            <div class="row">
                <div class="col-9">
                    <form action="/dashboard/students">
                        <div class="input-group mb-3 fontlink">
                            <select class="form-select" name="search" aria-label="Default select example" required>
                                <option value=" " selected>Pilih Kelas</option>
                                @foreach ($kelas as $kela)
                                    <option value="{{ $kela->id }}">{{ $kela->nama_kelas }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-3">
                    <a href="/dashboard/students/create" class="btn text-white bg-primary border-0">+ Tambah Siswa Baru</a>
                </div>
            </div>
            <table class="table table-hover fontlink">
                <thead>
                    <tr>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($students as $student)
                            <td>{{ $student->fullname }}</td>
                            <td>{{ $student->nisn }}</td>
                            <td>
                                @foreach ($kelas as $kela)
                                    @if ($student->id_kelas === $kela->id)
                                        {{ $kela->nama_kelas }}
                                    @endif
                                @endforeach
                            </td>
                            <td><img class="rounded" width="100px" height="100px" style="object-fit: cover;"
                                    src="{{ asset('storage/' . $student->foto) }}">
                            </td>
                            <td>
                                <a href="/dashboard/students/{{ $student->id }}/edit"
                                    class="badge bg-warning border-0">Edit</a>
                                <form action="/dashboard/datasets/siswa" method="post" class="d-inline">
                                    @csrf
                                    <input type="text" id="validationCustom01" class="form-control" name="id_siswa"
                                        value="{{ $student->id }}" hidden required>
                                    <button class="badge bg-primary border-0" type="submit">
                                        Tambah Dataset
                                    </button>
                                </form>
                                <form action="/dashboard/students/{{ $student->id }}" method="post" class="d-inline">
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
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        @presensiku
    </div>
    </div>
@endsection
