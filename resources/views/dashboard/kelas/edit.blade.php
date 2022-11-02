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
            <h5 class="card-title  text-center" id="fontheader">Edit Kelas</h5>
            <p class="card-text" id="fontp"></p>
            <form class="row g-2 needs-validation" method="POST" action="/dashboard/kelas/{{ $kela->id }}" novalidate>
                @method('put')
                @csrf
                <div class="col-md-12 position-relative">
                    <label for="validationCustom01" class="form-label">ID<span class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="id" placeholder="ID"
                        value="{{ old('id', $kela->id) }}" required readonly>
                    <div class="invalid-tooltip">
                        Isi ID.
                    </div>
                </div>
                <div class="col-md-9 position-relative">
                    <label for="validationCustom01" class="form-label">Nama Kelas<span class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="nama_kelas"
                        placeholder="Isi Nama Kelas" value="{{ old('nama_kelas', $kela->nama_kelas) }}" required>
                    <div class="invalid-tooltip">
                        Isi Nama Kelas.
                    </div>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="validationCustom01" class="form-label">Jumlah Siswa<span
                            class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="jumlah"
                        placeholder="Isi Jumlah Siswa" value="{{ old('jumlah', $kela->jumlah) }}"  required>
                    <div class="invalid-tooltip">
                        Isi Jumlah Siswa.
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
