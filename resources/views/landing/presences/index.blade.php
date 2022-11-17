@extends('landing.layouts.main')

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
    <br>
    <div class="card mb-5 mt-5 position-relative top-50 start-50 translate-middle-x"
        style="max-width: 1300px;max-height:100%;">
        @isset($active)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $active }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endisset
        <div class="row g-0">
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ asset('storage/images/login.jpg') }}" class="img-fluid" style="width: 100%;object-fit: cover;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title" id="fontheader">Face Recognition</h5>
                    <p class="card-text fontlink">Silakan pilih pada presensi yang tersedia, lalu masukkan file foto untuk
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
                        </div>
                        <button class="btn btn-outline-primary" type="button" onclick="myFunction()">
                            Cek Wajah
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
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
                    "X-RapidAPI-Key": "8dabe2d056msh76be64041335aa8p11e3fajsn59c87fbbfa0c",
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
