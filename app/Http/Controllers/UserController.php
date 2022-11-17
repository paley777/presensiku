<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth()->user()->role === 'Administrator') {
            return view('dashboard.users.index', [
                'active' => 'manajemen',
                'users' => User::orderBy('created_at', 'desc')
                    ->filter(request(['search']))
                    ->paginate(15)
                    ->withQueryString(),
            ]);
        } else {
            return redirect('/')->with('loginError', 'Anda tidak memiliki otoritas untuk mengakses halaman tersebut. Hubungi admin.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth()->user()->role === 'Administrator') {
            return view('dashboard.users.create', [
                'active' => 'manajemen',
            ]);
        } else {
            return redirect('/')->with('loginError', 'Anda tidak memiliki otoritas untuk mengakses halaman tersebut. Hubungi admin.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'fullname' => 'required',
            'nip' => 'required',
            'role' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'password' => 'required',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'Akun baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Auth()->user()->role === 'Administrator') {
            return view('dashboard.users.edit', [
                'user' => $user,
                'active' => 'manajemen',
            ]);
        } else {
            return redirect('/')->with('loginError', 'Anda tidak memiliki otoritas untuk mengakses halaman tersebut. Hubungi admin.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'id' => 'required',
            'fullname' => 'required',
            'nip' => 'required',
            'role' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'password' => 'required',
        ];
        $validatedData = $request->validate($rules);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::where('id', $validatedData['id'])->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'Akun telah diubah!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth()->user()->role === 'Administrator') {
            User::destroy($user->id);

            return redirect('/dashboard/users')->with('success', 'Akun telah dihapus.');
        } else {
            return redirect('/')->with('loginError', 'Anda tidak memiliki otoritas untuk mengakses halaman tersebut. Hubungi admin.');
        }
    }
}
