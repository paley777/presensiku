@extends('landing.layouts.main')

@section('container')
    <div class="container">
        @isset($active)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $active }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endisset
        <div class="row gy-4 gy-md-0">
            <div
                class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                <div>
                    <h2 class="text-uppercase fw-bold" data-aos="zoom-in">Face Recognition</h2>
                    <p data-aos="zoom-in" class="my-3">Silakan pilih pada presensi yang tersedia, lalu masukkan file foto
                        untuk
                        otomatis memindai wajah.</p>
                    <form method="POST" action="/recognize" class="fontlink" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Presensi</label>
                            <select class="form-select" name="id_presensi" aria-label="Default select example" required>
                                <option value=" " selected>Pilih Presensi</option>
                                @foreach ($presences as $presence)
                                    <option value="{{ $presence->id }}">{{ $presence->nama_presensi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Input File</label>
                            <input class="form-control" type="file" accept="image/*" id="input1" name="input"
                                required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 position-relative">
                                <label for="validationCustom01" class="form-label">Console<span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" oninput="getValue();" id="output" name="console" required style="height: 200px"></textarea>
                            </div>
                            <div class="col-md-6 position-relative">
                                <br>
                                <button class="btn btn-outline-primary" type="button" onclick="myFunction()">
                                    Cek Wajah
                                </button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-xl-5 m-xl-5"><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;"
                        src="assets\juicy-two-resumes.gif" /></div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
        <script>
            function myFunction() {
                var image1 = document.getElementById('input1').files[0];
                const form = new FormData();
                form.append("image_input", image1, "input.PNG");

                const settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": "https://face-recognition18.p.rapidapi.com/recognize_face",
                    "method": "POST",
                    "headers": {
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
