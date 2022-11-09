<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Dataset;
use App\Models\Presensi;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index', [
            'active' => 'index',
            'countusers' => User::count(),
            'countkelas' => Kelas::count(),
            'countsubjects' => Subject::count(),
            'countstudents' => Student::count(),
            'countdatasets' => Dataset::count(),
            'countpresences' => Presensi::count(),
        ]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
