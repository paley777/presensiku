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
                <h2>Tambah Dataset {{ $student->fullname }}</h2>
                <p class="w-lg-50">Isi formulir di bawah ini.</p>
            </div>
            <form class="row g-2 needs-validation" method="post" action="/dashboard/datasets"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-3 position-relative">
                    <label for="validationCustom01" class="form-label">ID.<span class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="id_student"
                        placeholder="Isi ID." value="{{ $student->id }}" readonly required>
                </div>
                <div class="col-md-9 position-relative">
                    <label for="validationCustom01" class="form-label">Nama Siswa<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="fullname" placeholder="Isi Nama Siswa"
                        value="{{ $student->fullname }}" required readonly>
                    <input type="hidden" class="form-control" id="fullname" placeholder="Isi Nama Siswa"
                        value="{{ $student->id }} {{ $student->id }} {{ $student->id }}" required readonly>
                </div>
                <hr>
                <div class="col-md-12 position-relative">
                    <label for="validationCustom01" class="form-label">Dataset Siswa<span
                            class="text-danger">*</span></label>
                </div>
                <div class="col-md-4 position-relative">
                    <label for="validationCustom01" class="form-label">Dataset #1<span class="text-danger">*</span></label>
                    <input class="form-control" id="dataset1" type="file" accept="image/*" id="image"
                        name="dataset1" required>
                </div>
                <div class="col-md-4 position-relative">
                    <label for="validationCustom01" class="form-label">Dataset #2<span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="dataset2" accept="image/*" id="image"
                        name="dataset2" required>
                </div>
                <div class="col-md-4 position-relative">
                    <label for="validationCustom01" class="form-label">Dataset #3<span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="dataset3" accept="image/*" id="image"
                        name="dataset3" required>
                </div>
                <div class="col-md-6 position-relative">
                    <label for="validationCustom01" class="form-label">Console<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="output" style="height: 200px" required></textarea>
                </div>
                <div class="col-md-6 position-relative">
                    <label for="validationCustom01" class="form-label">Submit Dataset ke API<span
                            class="text-danger">*</span></label>
                    <p class="text-justify">
                        Pastikan tiga foto telah terinput ke masing-masing input field. Klik tombol dibawah
                        ini untuk mengunggah dataset ke API. (KLIK SIMPAN DATA KE API TERLEBIH DAHULU SEBELUM SIMPAN
                        DATA KE
                        SISTEM).
                    </p>
                    <button class="btn btn-outline-primary" type="button" onclick="myFunction()">
                        Simpan Data ke API
                    </button>
                </div>
                <p>
                    (Wajib terisi untuk kolom dengan tanda "<span class="text-danger">*</span>").
                </p>

                <button class="btn btn-outline-primary" type="submit">
                    Simpan Data ke Sistem
                </button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        function myFunction() {
            var fullname = document.getElementById('fullname').value;
            var image1 = document.getElementById('dataset1').files[0];
            var image2 = document.getElementById('dataset2').files[0];
            var image3 = document.getElementById('dataset3').files[0];
            const form = new FormData();
            form.append("face_image", image1, "image1.PNG");
            form.append("additional_face_image_0", image2, "image2.PNG");
            form.append("additional_face_image_1", image3, "image3.PNG");

            const settings = {
                "async": true,
                "crossDomain": true,
                "url": "https://face-recognition18.p.rapidapi.com/register_face",
                "method": "POST",
                "headers": {
                    "x-face-uid": fullname,
                    "X-RapidAPI-Key": "d41b70e58emsh9adb5963ced0c63p176e87jsn3ff8ebcc0995",
                    "X-RapidAPI-Host": "face-recognition18.p.rapidapi.com"
                },
                "processData": false,
                "contentType": false,
                "mimeType": "multipart/form-data",
                "data": form
            };

            $.ajax(settings).done(function(response) {
                var myArray = $.makeArray(response);
                document.getElementById("output").value = myArray;
            });
        }
    </script>
@endsection
