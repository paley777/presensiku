@extends('dashboard.layouts.main')

@section('container')
    <div class="container py-4 py-xl-5" style="font-family: ABeeZee, sans-serif;">
        <div class="row" data-aos="zoom-in">
            <div class="col-md-12">
                <section class="py-4 py-xl-5">
                    <div class="container">
                        <div
                            class="text-white bg-primary border rounded border-0 border-primary d-flex flex-column justify-content-between flex-lg-row p-4 p-md-5">
                            <div class="pb-2 pb-lg-1">
                                <h2 class="fw-bold mb-2">Hai, {{ Auth()->user()->fullname }}</h2>
                                <p class="mb-0">Kelola sistem presensi siswa hanya di sini. Cek beragam menu yang ada.
                                </p>
                            </div>
                            <form class="d-flex" action="/logout" method="post">
                                @csrf
                                <button class="btn btn-light fs-5 py-2 px-4" type="submit">Keluar Akun</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row" data-aos="zoom-in">
            <div class="col-md-12">
                <div class="text-center text-white-50 bg-primary border rounded border-0 p-3">
                    <div class="row row-cols-2 row-cols-md-3">
                        <div class="col-lg-3">
                            <div class="p-3">
                                <h4 class="display-5 fw-bold text-white mb-0">{{ $countstudents }}</h4>
                                <p class="mb-0">Jumlah siswa terdata</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3">
                                <h4 class="display-5 fw-bold text-white mb-0">{{ $countusers }}</h4>
                                <p class="mb-0">Jumlah akun terdata</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3">
                                <h4 class="display-5 fw-bold text-white mb-0">{{ $countkelas }}</h4>
                                <p class="mb-0">Jumlah kelas terdata</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3">
                                <h4 class="display-5 fw-bold text-white mb-0">{{ $countsubjects }}</h4>
                                <p class="mb-0">Jumlah mata pelajaran terdata</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3">
                                <h4 class="display-5 fw-bold text-white mb-0">{{ $countdatasets }}</h4>
                                <p class="mb-0">Jumlah dataset terdata</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3">
                                <h4 class="display-5 fw-bold text-white mb-0">{{ $countpresences }}</h4>
                                <p class="mb-0">Jumlah presensi terdata</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
