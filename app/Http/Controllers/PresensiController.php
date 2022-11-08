<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\Kelas;
use App\Models\Subject;
use App\Models\User;
use App\Models\Student;
use App\Models\Report;
use App\Http\Requests\StorePresensiRequest;
use App\Http\Requests\UpdatePresensiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.presences.index', [
            'active' => 'presences',
            'kelas' => Kelas::orderBy('created_at', 'desc')->get(),
            'users' => User::orderBy('created_at', 'desc')->get(),
            'subjects' => Subject::orderBy('created_at', 'desc')->get(),
            'presences' => Presensi::orderBy('created_at', 'desc')
                ->filter(request(['search']))
                ->paginate(5)
                ->withQueryString(),
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function start(Request $request)
    {
        $presence = Presensi::where('id', $request->id)->first();
        return view('dashboard.presences.start', [
            'active' => 'presences',
            'kelas' => Kelas::where('id', $presence->id_kelas)->first(),
            'users' => User::where('id', $presence->id_user)->get(),
            'subjects' => Subject::where('id', $presence->id_mapel)->get(),
            'students' => Student::where('id_kelas', $request->id_kelas)->get(),
            'presence' => Presensi::where('id', $request->id)->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.presences.create', [
            'kelas' => Kelas::orderBy('created_at', 'desc')->get(),
            'subjects' => Subject::orderBy('created_at', 'desc')->get(),
            'active' => 'presences',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePresensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePresensiRequest $request)
    {
        $validatedData = $request->validate([
            'nama_presensi' => 'required',
            'id_user' => 'required',
            'id_kelas' => 'required',
            'id_mapel' => 'required',
            'status' => 'required',
        ]);
        Presensi::create($validatedData);
        return redirect('/dashboard/presences/')->with(['success', 'Presensi baru telah ditambahkan.']);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePresensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $size = count(collect($request)->get('id_presensi'));
        for ($i = 0; $i <= $size - 1; $i++) {
            $data = [
                [
                    'id_presensi' => $request->id_presensi[$i],
                    'nama_presensi' => $request->nama_presensi[$i],
                    'id_siswa' => $request->id_siswa[$i],
                    'status' => $request->status[$i],
                ],
            ];
            Report::insert($data);
        }
        Presensi::where('id', $request->id_presensi)->update([
            'status' => 'SELESAI',
        ]);
        return redirect('/dashboard/presences/')->with(['success', 'Presensi telah Diselesaikan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function show(Presensi $presensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Presensi $presence)
    {
        return view('dashboard.presences.edit', [
            'presensi' => $presence,
            'active' => 'presences',
            'kelas' => Kelas::orderBy('created_at', 'desc')->get(),
            'subjects' => Subject::orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePresensiRequest  $request
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePresensiRequest $request, Presensi $presensi)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nama_presensi' => 'required',
            'id_user' => 'required',
            'id_kelas' => 'required',
            'id_mapel' => 'required',
            'status' => 'required',
        ]);
        Presensi::where('id', $validatedData['id'])->update($validatedData);

        return redirect('/dashboard/presences')->with('success', 'Presensi telah diubah!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presensi $presence)
    {
        $idreport = Report::where('id_presensi', $presence->id)->get('id');
        Report::destroy($idreport);
        Presensi::destroy($presence->id);
        return redirect('/dashboard/presences')->with('success', 'Presensi telah dihapus.');
    }
}