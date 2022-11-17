@extends('landing.layouts.main')

@section('container')
    <div class="container" style="font-family: ABeeZee, sans-serif;">
        @if (session()->has('loginError'))
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="row gy-4 gy-md-0">
            <div class="col-md-6">
                <div class="p-xl-5 m-xl-5"><img class="rounded img-fluid w-100 fit-cover" data-aos="fade-right"
                        style="min-height: 300px;"
                        src="assets\juicy-man-programmer-writing-code-and-make-web-design-on-a-pc.gif"></div>
            </div>
            <div class="col-md-6 d-md-flex align-items-md-center">
                <div style="max-width: 350px;">
                    <h2 class="text-uppercase fw-bold" data-aos="zoom-in">selamat datang di sistem presensi siswa</h2>
                    <p data-aos="zoom-in" class="my-3">Silakan pilih menu di bawah ini, untuk melanjutkan.</p><a
                        class="btn btn-primary btn-sm me-2" role="button" data-aos="zoom-in"
                        href="/facerecognition">Presensi
                        Mandiri</a><a class="btn btn-outline-primary btn-sm" role="button" data-aos="zoom-in"
                        href="/login">Masuk Sistem</a>
                </div>
            </div>
        </div>
    </div>
@endsection
