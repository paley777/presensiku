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
                <h2>Tambah Kelas</h2>
                <p class="w-lg-50">Isi formulir di bawah ini.</p>
            </div>
            <form class="row g-2 needs-validation" method="post" action="/dashboard/kelas" novalidate>
                @csrf
                <div class="col-md-9 position-relative">
                    <label for="validationCustom01" class="form-label">Nama Kelas<span class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="nama_kelas"
                        placeholder="Isi Nama Kelas" required>
                    <div class="invalid-tooltip">
                        Isi Nama Kelas.
                    </div>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="validationCustom01" class="form-label">Jumlah Siswa<span
                            class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="jumlah"
                        placeholder="Isi Jumlah Siswa" required>
                    <div class="invalid-tooltip">
                        Isi Jumlah Siswa.
                    </div>
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
