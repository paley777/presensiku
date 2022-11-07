<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Kelas;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.students.index', [
            'active' => 'students',
            'kelas' => Kelas::orderBy('created_at', 'desc')->get(),
            'students' => Student::orderBy('created_at', 'desc')
                ->filter(request(['search']))
                ->paginate(5)
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
        return view('dashboard.students.create', [
            'kelas' => Kelas::orderBy('created_at', 'desc')->get(),
            'active' => 'students',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required',
            'id_kelas' => 'required',
            'nisn' => 'required',
            'foto' => 'image|file|max:10000',
        ]);
        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('students_profile');
        }
        Student::create($validatedData);
        return redirect('/dashboard/students/')->with(['success', 'Siswa baru telah ditambahkan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('dashboard.students.edit', [
            'student' => $student,
            'active' => 'students',
            'kelas' => Kelas::orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'fullname' => 'required',
            'id_kelas' => 'required',
            'nisn' => 'required',
            'foto' => 'image|file|max:10000',
        ]);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('students_profile');
        }

        if ($request->file('foto')) {
            if ($student->nama_gambar) {
                Storage::delete($member['nama_gambar']);
            }
            $validatedData['foto'] = $request->file('foto')->store('students_profile');
        }

        Student::where('id', $validatedData['id'])->update($validatedData);

        return redirect('/dashboard/students')->with('success', 'Siswa telah diubah!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if ($student->foto) {
            Storage::delete($student['foto']);
        }
        Student::destroy($student->id);

        return redirect('/dashboard/students')->with('success', 'Siswa telah dihapus.');
    }
}