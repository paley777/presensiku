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
                <h2>Tambah Presensi</h2>
                <p class="w-lg-50">Isi formulir di bawah ini.</p>
            </div>
            <form class="row g-2 needs-validation" method="post" action="/dashboard/presences" novalidate>
                @csrf
                <div class="col-md-9 position-relative">
                    <label for="validationCustom01" class="form-label">Nama Presensi<span
                            class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="nama_presensi"
                        placeholder="Isi Nama Presensi" required>
                    <div class="invalid-tooltip">
                        Isi Nama Presensi.
                    </div>
                </div>
                <div class="col-md-3 position-relative">
                    <label for="validationCustom01" class="form-label">ID Pembuat<span class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" value="{{ Auth()->user()->id }}"
                        name="id_user" placeholder="Isi Nama Presensi" readonly required>
                </div>
                <div class="col-md-4 position-relative">
                    <label for="validationCustom01" class="form-label">Kelas<span class="text-danger">*</span></label>
                    <select class="form-select" name="id_kelas" required>
                        @foreach ($kelas as $kela)
                            <option value="{{ $kela->id }}">{{ $kela->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 position-relative">
                    <label for="validationCustom01" class="form-label">Mata Pelajaran<span
                            class="text-danger">*</span></label>
                    <select class="form-select" name="id_mapel" required>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 position-relative">
                    <label for="validationCustom01" class="form-label">Status<span class="text-danger">*</span></label>
                    <input type="text" id="validationCustom01" class="form-control" name="status"
                        placeholder="Isi Nama Presensi" value="BELUM SELESAI" required readonly>
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
