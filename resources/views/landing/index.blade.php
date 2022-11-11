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
    @if (session()->has('loginError'))
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="card mb-5 mt-5 position-relative top-50 start-50 translate-middle-x"
        style="max-width: 1300px;max-height:100%;">
        <div class="row g-0">
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ asset('storage/images/login.jpg') }}" class="img-fluid" style="width: 100%;object-fit: cover;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title" id="fontheader">Selamat Datang</h5>
                    <p class="card-text fontlink">Hai! PresensiKu adalah sistem presensi yang dilengkapi dengan fitur
                        pengenalan wajah.</p>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="/login" class="btn btn-primary">Masuk Bagi Guru/Admin <i class="bi bi-arrow-up-right-circle-fill"></i></a>
                        <a href="/facerecognition" class="btn btn-warning">Presensi dengan Pengenalan Wajah <i class="bi bi-arrow-up-right-circle-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
@endsection
