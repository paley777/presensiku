<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Presensi;
use App\Models\Kelas;
use App\Models\Subject;
use App\Models\User;
use App\Models\Student;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.reports.index', [
            'active' => 'manajemen',
            'kelas' => Kelas::orderBy('created_at', 'desc')->get(),
            'users' => User::orderBy('created_at', 'desc')->get(),
            'subjects' => Subject::orderBy('created_at', 'desc')->get(),
            'presences' => Presensi::orderBy('created_at', 'desc')
                ->filter(request(['search']))
                ->paginate(5)
                ->withQueryString(),
        ]);
    }

    //Report Print
    public function print(Request $request)
    {
        $presence = Presensi::where('id', $request->id)->first();
        return view('dashboard.reports.print', [
            'active' => 'manajemen',
            'kelas' => Kelas::where('id', $presence->id_kelas)->first(),
            'users' => User::where('id', $presence->id_user)->first(),
            'subjects' => Subject::where('id', $presence->id_mapel)->first(),
            'students' => Student::where('id_kelas', $presence->id_kelas)->get(),
            'presence' => Presensi::where('id', $request->id)->first(),
            'reports' => Report::where('id_presensi', $presence->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportRequest  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
