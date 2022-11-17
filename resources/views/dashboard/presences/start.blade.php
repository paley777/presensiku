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
                <h2>{{ $presence->nama_presensi }}</h2>
                <p class="w-lg-50">Untuk Siswa Kelas {{ $kelas->nama_kelas }}</p>
            </div>
        </div>
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
                            @foreach ($reports as $report)
                                @if ($student->id == $report->id_siswa)
                                @else
                                    <td>
                                        <input type="text" class="form-control" name="id_presensi[]"
                                            value="{{ $presence->id }}" readonly hidden required>
                                        <input type="text" class="form-control" name="nama_presensi[]"
                                            value="{{ $presence->nama_presensi }}" readonly hidden required>

                                        <input type="text" class="form-control" name="id_siswa[]"
                                            value="{{ $student->id }}" readonly required hidden>

                                        <input type="text" class="form-control" value="{{ $student->fullname }}" readonly
                                            required>
                                    </td>
                                    <td><input type="text" class="form-control" value="{{ $student->nisn }}" readonly
                                            required></td>
                                    <td>
                                        <input type="radio" name="status[{{ $a++ }}]"
                                            value="Hadir">Hadir</input>
                                        <input type="radio" name="status[{{ $b++ }}]" value="Izin">Izin</input>
                                        <input type="radio" name="status[{{ $c++ }}]"
                                            value="Alpa">Alpa</input>
                                    </td>
                                @endif
                            @endforeach
                </tr>
                @endforeach
                <button class="btn btn-outline-primary" type="submit">
                    Simpan Presensi
                </button>
                </form>
            </tbody>
        </table>
    </div>
@endsection
