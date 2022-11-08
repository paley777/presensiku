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
    <div class="card ">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-header fontlink">
            Dashboard
        </div>
        <div class="card-body">
            <h5 class="card-title" id="fontheader">{{ $presence->nama_presensi }}</h5>
            <p class="card-text" id="fontp">Untuk Siswa Kelas {{ $kelas->nama_kelas }}</p>
            <table class="table table-hover fontlink">
                <thead>
                    <tr>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $a = 0; ?>
                    <?php $b = 0; ?>
                    <?php $c = 0; ?>
                    <tr>
                        @foreach ($students as $student)
                            <form class="row g-2 needs-validation" method="post" action="/dashboard/presences/save">
                                @csrf
                                <td>
                                    <input type="text" class="form-control" name="id_presensi[]"
                                        value="{{ $presence->id }}" readonly hidden required>
                                    <input type="text" class="form-control" name="nama_presensi[]"
                                        value="{{ $presence->nama_presensi }}" readonly hidden required>

                                    <input type="text" class="form-control" name="id_siswa[]" value="{{ $student->id }}"
                                        readonly required hidden>

                                    <input type="text" class="form-control" value="{{ $student->fullname }}" readonly
                                        required>
                                </td>
                                <td><input type="text" class="form-control" value="{{ $student->nisn }}" readonly
                                        required></td>
                                <td>
                                    <input type="radio" name="status[{{ $a++ }}]" value="Hadir">Hadir</input>
                                    <input type="radio" name="status[{{ $b++ }}]" value="Izin">Izin</input>
                                    <input type="radio" name="status[{{ $c++ }}]" value="Alpa">Alpa</input>
                                </td>
                    </tr>
                    @endforeach
                    <button class="btn btn-outline-primary" type="submit">
                        Simpan Presensi
                    </button>
                    </form>
                </tbody>

            </table>
        </div>
    </div>
    <div class="card-footer text-muted">
        @presensiku
    </div>
    </div>
@endsection
