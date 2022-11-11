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
                    <h5 class="card-title" id="fontheader">Masuk</h5>
                    <p class="card-text fontlink">Hai! Masuk ke dashboard PresensiKu dengan memasukkan e-mail dan kata sandi
                        di
                        bawah ini.</p>
                    <form method="POST" action="/login" class="fontlink">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">E-mail</label>
                            <input type="text" name="email" class="form-control"aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">Masukkan e-mail anda.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
