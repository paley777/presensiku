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
            <h5 class="card-title  text-center" id="fontheader">Mata Pelajaran Baru</h5>
            <p class="card-text" id="fontp"></p>
            <form class="row g-2 needs-validation" method="post" action="/dashboard/subjects" novalidate>
                @csrf
                <div class="col-md-12 position-relative">
                    <label for="validationCustom01" class="form-label">Nama Mata Pelajaran<span
                            class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="nama_mapel"
                        placeholder="Isi Nama Mata Pelajaran" required>
                    <div class="invalid-tooltip">
                        Isi Nama Mata Pelajaran.
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
