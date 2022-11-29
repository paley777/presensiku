<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.subjects.index', [
            'active' => 'manajemen',
            'subjects' => Subject::orderBy('created_at', 'desc')
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
        return view('dashboard.subjects.create', [
            'active' => 'manajemen',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
        $validatedData = $request->validate([
            'nama_mapel' => 'required|unique:subjects',
        ]);
        Subject::create($validatedData);

        return redirect('/dashboard/subjects')->with('success', 'Mata Pelajaran baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('dashboard.subjects.edit', [
            'subject' => $subject,
            'active' => 'manajemen',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectRequest  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        if ($request->nama_mapel == $subject->nama_mapel) {
            $rules = [
                'id' => 'required',
                'nama_mapel' => 'required',
            ];
            $validatedData = $request->validate($rules);
            Subject::where('id', $validatedData['id'])->update($validatedData);

            return redirect('/dashboard/subjects')->with('success', 'Mata Pelajaran telah diubah!.');
        } else {
            $rules = [
                'id' => 'required',
                'nama_mapel' => 'required|unique:subjects',
            ];
            $validatedData = $request->validate($rules);
            Subject::where('id', $validatedData['id'])->update($validatedData);

            return redirect('/dashboard/subjects')->with('success', 'Mata Pelajaran telah diubah!.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        Subject::destroy($subject->id);
        return redirect('/dashboard/subjects')->with('success', 'Mata Pelajaran telah dihapus.');
    }
}
