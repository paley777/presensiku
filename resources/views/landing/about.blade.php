@extends('landing.layouts.main')

@section('container')
    <div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Tentang Kami</h2>
                <p class="w-lg-50">PresensiKu adalah Sistem Presensi Siswa di Sekolah dengan Fitur Face Recognition yang
                    dibuat dalam rangka memenuhi tugas Proyek Perangkat Lunak dua mahasiswa Informatika Universitas
                    Bengkulu.</p>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2">
            <div class="col">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="w-100"><img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px;"
                            src="assets\juicy-man-studying-financial-analytics.gif" /></div>
                    <div class="py-4 py-lg-0 px-lg-4">
                        <h4>Kerangka Kerja Laravel</h4>
                        <p>Sistem ini berdiri dalam kerangka kerja Laravel versi 9 dengan PHP 8.1.6.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="w-100"><img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px;"
                            src="\assets\juicy-girl-working-at-home.gif" /></div>
                    <div class="py-4 py-lg-0 px-lg-4">
                        <h4>Fitur Face Recognition dengan API.</h4>
                        <p>Face Recognition dengan API dari. <a href="https://rapidapi.com/organization/arsa-technology">
                                Arsa Technology</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-4 py-xl-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Pengembang</h2>
                    <p class="w-lg-50">Bertemu dengan dua mahasiswa penggarap sistem ini.</p>
                </div>
            </div>
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-lg-2">
                <div class="col">
                    <div class="card border-0 shadow-none">
                        <div class="card-body d-flex align-items-center p-0"><img
                                class="rounded-circle flex-shrink-0 me-3 fit-cover" width="130" height="130"
                                src="assets\_MG_0151.JPG" />
                            <div>
                                <h5 class="fw-bold text-primary mb-0">Valleryan Virgil Zuliuskandar</h5>
                                <p class="text-muted mb-1">Pengembang</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 shadow-none">
                        <div class="card-body d-flex align-items-center p-0"><img
                                class="rounded-circle flex-shrink-0 me-3 fit-cover" width="130" height="130"
                                src="assets\2021-07-31-094609048.jpg" />
                            <div>
                                <h5 class="fw-bold text-primary mb-0"><strong>Rizky Cakra Mandala</strong></h5>
                                <p class="text-muted mb-1">Analis Sistem</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="position-relative py-4 py-xl-5">
            <div class="container position-relative">
                <div class="row mb-5">
                    <div class="col-md-8 col-xl-6 text-center mx-auto">
                        <h2>Hubungi Kami</h2>
                        <p class="w-lg-50">Pertanyaan, tanggapan, kritik dan saran dari Anda sangat berarti untuk kami,
                            hubungi kami dari kanal berikut.</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="d-flex flex-column justify-content-center align-items-start h-100">
                            <div class="d-flex align-items-center p-3">
                                <div
                                    class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon">
                                    <svg class="bi bi-telephone" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="px-2">
                                    <h6 class="mb-0">Telepon</h6>
                                    <p class="mb-0">+62-896-3204-6116</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center p-3">
                                <div
                                    class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon">
                                    <svg class="bi bi-envelope" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="px-2">
                                    <h6 class="mb-0">Email</h6>
                                    <p class="mb-0">valleyfeeds7@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
