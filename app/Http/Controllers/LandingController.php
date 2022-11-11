<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LandingController extends Controller
{
    //Homepage
    public function index()
    {
        return view('landing.index', [
            'active' => 'index',
        ]);
    }
    //Homepage
    public function login()
    {
        return view('landing.login', [
            'active' => 'index',
        ]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()
                ->intended('/dashboard')
                ->with('success', 'Selamat Datang di Dashboard PresensiKu!');
        }

        return back()->with('loginError', 'E-mail/Password Anda Salah, Coba Lagi!');
    }
}
