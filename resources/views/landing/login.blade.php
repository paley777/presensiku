@extends('landing.layouts.main')

@section('container')
    @if (session()->has('loginError'))
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="container py-4 py-xl-5">
        <div class="row gy-4 gy-md-0">
            <div
                class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                <div style="max-width: 350px;">
                    <h2 class="text-uppercase fw-bold" data-aos="zoom-in">Masuk</h2>
                    <p data-aos="zoom-in" class="my-3">Masuk ke dashboard PresensiKu dengan memasukkan e-mail dan kata
                        sandi
                        di
                        bawah ini.</p>
                    <form method="POST" action="/login" class="fontlink">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">E-mail</label>
                            <input type="text" name="email" class="form-control"aria-describedby="emailHelp"
                                data-aos="zoom-in" required>
                            <div id="emailHelp" class="form-text">Masukkan e-mail anda.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                            <input type="password" name="password" data-aos="zoom-in" class="form-control"
                                id="exampleInputPassword1" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Masuk</button>
                    </form>

                </div>
            </div>
            <div class="col-md-6">
                <div class="p-xl-5 m-xl-5"><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;"
                        src="assets\juicy-boy-clicks-on-mouse.gif" /></div>
            </div>
        </div>
    </div>
@endsection
