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
    <style>
        canvas {
            position: absolute;
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
            <h5 class="card-title  text-center" id="fontheader">Edit Dataset {{ $dataset->fullname }}</h5>
            <p class="card-text" id="fontp"></p>
            <form class="row g-2 needs-validation" method="post" action="/dashboard/datasets/{{ $dataset->id }}"
                enctype="multipart/form-data" novalidate>
                @method('put')
                @csrf
                <div class="col-md-3 position-relative">
                    <label for="validationCustom01" class="form-label">ID Dataset.<span class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="id"
                        placeholder="Isi ID." value="{{ $dataset->id }}" readonly required>
                    <div class="invalid-tooltip">
                        Isi ID.
                    </div>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="validationCustom01" class="form-label">ID Siswa.<span class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="id_student"
                        placeholder="Isi ID." value="{{ $dataset->id_student }}" readonly required>
                    <div class="invalid-tooltip">
                        Isi ID.
                    </div>
                </div>
                <div class="col-md-6 position-relative">
                    <label for="validationCustom01" class="form-label">Nama Siswa<span class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="fullname"
                        placeholder="Isi Nama Siswa" value="{{ $dataset->fullname }}" required readonly>
                    <div class="invalid-tooltip">
                        Isi Nama Siswa.
                    </div>
                </div>
                <hr>
                <div class="col-md-12 position-relative">
                    <label for="validationCustom01" class="form-label">Dataset Siswa (Format .PNG)<span
                            class="text-danger">*</span></label>
                </div>
                <div class="col-md-4 position-relative">
                    <label for="validationCustom01" class="form-label">Dataset #1<span class="text-danger">*</span></label>
                    <input class="form-control" type="file" accept=".png" id="image" name="dataset1" required>
                    <div class="invalid-tooltip">
                        Isi Dataset Siswa.
                    </div>
                </div>
                <div class="col-md-4 position-relative">
                    <label for="validationCustom01" class="form-label">Dataset #2<span class="text-danger">*</span></label>
                    <input class="form-control" type="file" accept=".png" id="image" name="dataset2" required>
                    <div class="invalid-tooltip">
                        Isi Dataset Siswa.
                    </div>
                </div>
                <div class="col-md-4 position-relative">
                    <label for="validationCustom01" class="form-label">Dataset #3<span class="text-danger">*</span></label>
                    <input class="form-control" type="file" accept=".png" id="image" name="dataset3" required>
                    <div class="invalid-tooltip">
                        Isi Dataset Siswa.
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
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();

            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
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
    {{-- <script defer src="/js/face-api.min.js"></script>
    <script defer src="/js/script.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
    <script language="JavaScript">
        Webcam.set({
            width: 490,
            height: 350,
            image_format: 'png',
            png_quality: 100
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img name=gambar src="' + data_uri + '"/>';
            });
        }
    </script> --}}
@endsection
