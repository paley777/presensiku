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
    <div class="card">
        <div class="card-body" id="print">
            <div class="row align-items-center text-center">
                <div class="col">
                    <img src="{{ asset('storage/images/logo.png') }}" alt="" width="60" height="60"></a>
                    <h1 class="mt-1 fw-semibold" id="fontp">
                        Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi
                    </h1>
                    <h1 class="mt-1 fw-normal fst-italic fontlink">
                        SEKOLAH MENENGAH KEJURUAN NEGERI 1 KOTA BENGKULU
                    </h1>
                    <h1 class="mt-1 fw-normal fst-italic fontlink">
                        Presensi Kegiatan Belajar Mengajar
                    </h1>
                    <hr>
                </div>
            </div>
            <h1 class="mt-1 fw-normal fst-italic fontlink">
                Presensi ini bertajuk :
            </h1>
            <h5 class="card-title fw-bold" id="fontheader">{{ $presence->nama_presensi }}</h5>
            <h1 class="card-text fontlink fw-normal">Kelas {{ $kelas->nama_kelas }} pada
                {{ $presence->created_at->format('d/m/Y H:i:s') }}</h1>
            <h1 class="card-text fontlink fw-normal">Mata Pelajaran {{ $subjects->nama_mapel }}</h1>
            <h1 class="card-text fontlink fw-normal">Guru Pengampu {{ $users->fullname }}</h1>
            <hr>
            <table class="table table-hover fontlink">
                <thead>
                    <tr>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td>
                                @foreach ($students as $student)
                                    @if ($student->id == $report->id_siswa)
                                        <input type="text" class="form-control" value=" {{ $student->fullname }}"
                                            readonly required>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($students as $student)
                                    @if ($student->id == $report->id_siswa)
                                        <input type="text" class="form-control" value=" {{ $student->nisn }}" readonly
                                            required>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <input type="text" class="form-control" value=" {{ $report->status }}" readonly required>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        window.print();
    </script>
@endsection
