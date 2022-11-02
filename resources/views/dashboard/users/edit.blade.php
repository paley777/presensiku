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
    <div class="card">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-header fontlink  text-center">
            Dashboard
        </div>
        <div class="card-body ">
            <h5 class="card-title  text-center" id="fontheader">Edit Akun</h5>
            <p class="card-text" id="fontp"></p>
            <form class="row g-2 needs-validation" method="POST" action="/dashboard/users/{{ $user->id }}" novalidate>
                @method('put')
                @csrf
                <div class="col-md-12 position-relative">
                    <label for="validationCustom01" class="form-label">ID<span class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="id"
                        placeholder="Isi Nama Anda" value="{{ old('id', $user->id) }}" required readonly>
                    <div class="invalid-tooltip">
                        Isi Nama Anda.
                    </div>
                </div>
                <div class="col-md-9 position-relative">
                    <label for="validationCustom01" class="form-label">Nama Lengkap<span
                            class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="fullname"
                        placeholder="Isi Nama Anda" value="{{ old('fullname', $user->fullname) }}" required>
                    <div class="invalid-tooltip">
                        Isi Nama Anda.
                    </div>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="validationCustom01" class="form-label">NIP<span class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="nip"
                        placeholder="Isi NIP Anda" value="{{ old('nip', $user->nip) }}" required>
                    <div class="invalid-tooltip">
                        Isi NIP Anda.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom01" class="form-label">Role<span class="text-danger">*</span></label>
                    <select class="form-select" name="role" aria-label="Pilih Role" required>
                        <option selected>Pilih role</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Guru">Guru</option>
                    </select>

                </div>
                <div class="col-md-6 position-relative">
                    <label for="validationCustom01" class="form-label">E-mail<span class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="email"
                        placeholder="Isi E-mail Anda" value="{{ old('email', $user->email) }}" required>
                    <div class="invalid-tooltip">
                        Isi E-mail Anda.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom01" class="form-label">Nomor Telepon<span
                            class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="no_hp"
                        placeholder="Isi Nomor Telepon Anda" value="{{ old('no_hp', $user->no_hp) }}" required>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="inputCity" class="form-label">Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="inputCity" placeholder="Isi Password Anda"
                        name="password" required>
                    <div class="invalid-tooltip">
                        Isi Password Anda.
                    </div>
                </div>
                <p>
                    (Wajib terisi untuk kolom dengan tanda "<span class="text-danger">*</span>").
                </p>
                <button class="btn btn-outline-primary" type="submit">
                    Ubah Data
                </button>
            </form>
        </div>
        <div class="card-footer text-muted">
            @presensiku
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection