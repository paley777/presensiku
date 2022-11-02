@extends('dashboard.layouts.main')

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
    <div class="card text-center">
        <div class="card-header fontlink">
            Dashboard
        </div>
        <div class="card-body">
            <h5 class="card-title" id="fontheader">Selamat Datang di Dashboard PresensiKu</h5>
            <p class="card-text" id="fontp">Rekapitulasi Sistem PresensiKu di bawah ini</p>
            <div class="card-group">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" id="fontheader2">1000</h5>
                        <p class="card-text">Jumlah siswa terdata</p>
                        <p class="card-text"><small class="text-muted">Last refresh page</small></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" id="fontheader2">5023</h5>
                        <p class="card-text">Jumlah presensi terdata</p>
                        <p class="card-text"><small class="text-muted">Last refresh page</small></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" id="fontheader2">{{ $countusers }}</h5>
                        <p class="card-text">Jumlah akun terdata</p>
                        <p class="card-text"><small class="text-muted">Last refresh page</small></p>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer text-muted">
            @presensiku
        </div>
    </div>
@endsection
