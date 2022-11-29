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
                <h2>Tambah Siswa</h2>
                <p class="w-lg-50">Isi formulir di bawah ini.</p>
            </div>
            <form class="row g-2 needs-validation" method="post" action="/dashboard/students"
                enctype="multipart/form-data">
                @csrf
                <div class="row py-5">
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <div class="card-body">
                                <img class="img-preview rounded-circle img-fluid"
                                    style="width: 150px;height:150px;object-fit: cover;">
                                <p class="text-muted mb-1">Preview Profile</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 position-relative">
                        <label for="validationCustom01" class="form-label">Nama Siswa<span
                                class="text-danger">*</span></label>
                        <input type="text" id="validationCustom01" class="form-control" name="fullname"
                            placeholder="Isi Nama Siswa" required>
                        <br>
                        <label for="validationCustom01" class="form-label">Kelas<span class="text-danger">*</span></label>
                        <select class="form-select" name="id_kelas" required>
                            @foreach ($kelas as $kela)
                                <option value="{{ $kela->id }}">{{ $kela->nama_kelas }}</option>
                            @endforeach
                        </select>
                        <br>
                        <label for="validationCustom01" class="form-label">NISN<span class="text-danger">*</span></label>
                        <input type="text" id="validationCustom01"
                            onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                            class="form-control" name="nisn" placeholder="Isi NISN Siswa" required>
                        <br>
                        <label for="validationCustom01" class="form-label">Foto Profil Siswa<span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="file" accept=".jpg,.gif,.png" id="image" name="foto"
                            onchange="previewImage()" required>
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
