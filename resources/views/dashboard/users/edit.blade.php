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
                <h2>Ubah Akun</h2>
                <p class="w-lg-50">Isi formulir di bawah ini.</p>
            </div>
            <form class="row g-2 needs-validation" method="POST" action="/dashboard/users/{{ $user->id }}">
                @method('put')
                @csrf
                <div class="col-md-12 position-relative">
                    <label for="validationCustom01" class="form-label">ID<span class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="id"
                        placeholder="Isi Nama Anda" value="{{ old('id', $user->id) }}" required readonly>
                </div>
                <div class="col-md-9 position-relative">
                    <label for="validationCustom01" class="form-label">Nama Lengkap<span
                            class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="fullname"
                        placeholder="Isi Nama Anda" value="{{ old('fullname', $user->fullname) }}" required>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="validationCustom01" class="form-label">NIP<span class="text-danger">*</span></label>
                    <input type="text"
                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                        id="validationCustom01" class="form-control" name="nip" placeholder="Isi NIP Anda"
                        value="{{ old('nip', $user->nip) }}" required>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom01" class="form-label">Role<span class="text-danger">*</span></label>
                    <select class="form-select" name="role" aria-label="Pilih Role" required>
                        <option selected value="">Pilih role</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Guru">Guru</option>
                    </select>

                </div>
                <div class="col-md-6 position-relative">
                    <label for="validationCustom01" class="form-label">E-mail<span class="text-danger">*</span></label>
                    <input type="email" id="validationCustom01" class="form-control" name="email"
                        placeholder="Isi E-mail Anda" value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom01" class="form-label">Nomor Telepon<span
                            class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01"
                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                        class="form-control" name="no_hp" placeholder="Isi Nomor Telepon Anda"
                        value="{{ old('no_hp', $user->no_hp) }}" required>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="inputCity" class="form-label">Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="inputCity" placeholder="Isi Password Anda"
                        name="password" required>
                </div>
                <p>
                    (Wajib terisi untuk kolom dengan tanda "<span class="text-danger">*</span>").
                </p>
                <button class="btn btn-outline-primary" type="submit">
                    Ubah Data
                </button>
            </form>
        </div>
    </div>
@endsection
