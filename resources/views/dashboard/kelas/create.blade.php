@extends('dashboard.layouts.main')

@section('container')
    <div class="container" style="font-family: ABeeZee, sans-serif;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h2>Tambah Kelas</h2>
                <p class="w-lg-50">Isi formulir di bawah ini.</p>
            </div>
            <form class="row g-2 needs-validation" method="post" action="/dashboard/kelas">
                @csrf
                <div class="col-md-9 position-relative">
                    <label for="validationCustom01" class="form-label">Nama Kelas<span class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="nama_kelas"
                        placeholder="Isi Nama Kelas" required>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="validationCustom01" class="form-label">Jumlah Siswa<span
                            class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01"
                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                        class="form-control" name="jumlah" placeholder="Isi Jumlah Siswa" required>
                </div>
                <p>
                    (Wajib terisi untuk kolom dengan tanda "<span class="text-danger">*</span>").
                </p>
                <button class="btn btn-outline-primary" type="submit">
                    Simpan Data
                </button>
            </form>
        </div>
    </div>
@endsection
