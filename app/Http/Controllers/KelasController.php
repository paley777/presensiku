<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kelas.index', [
            'active' => 'manajemen',
            'kelas' => Kelas::orderBy('created_at', 'desc')
                ->filter(request(['search']))
                ->paginate(15)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kelas.create', [
            'active' => 'manajemen',
        ]);
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
            'nama_kelas' => 'required|unique:kelas',
            'jumlah' => 'required',
        ]);
        Kelas::create($validatedData);

        return redirect('/dashboard/kelas')->with('success', 'Kelas baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kela)
    {
        return view('dashboard.kelas.edit', [
            'kela' => $kela,
            'active' => 'manajemen',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kela)
    {
        if ($request->nama_kelas == $kela->nama_kelas) {
            $rules = [
                'id' => 'required',
                'nama_kelas' => 'required',
                'jumlah' => 'required',
            ];
            $validatedData = $request->validate($rules);
            Kelas::where('id', $validatedData['id'])->update($validatedData);

            return redirect('/dashboard/kelas')->with('success', 'Kelas telah diubah!.');
        } else {
            $rules = [
                'id' => 'required',
                'nama_kelas' => 'required|unique:kelas',
                'jumlah' => 'required',
            ];
            $validatedData = $request->validate($rules);
            Kelas::where('id', $validatedData['id'])->update($validatedData);

            return redirect('/dashboard/kelas')->with('success', 'Kelas telah diubah!.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kela)
    {
        Kelas::destroy($kela->id);
        return redirect('/dashboard/kelas')->with('success', 'Kelas telah dihapus.');
    }
}
