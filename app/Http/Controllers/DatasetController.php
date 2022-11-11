<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Student;
use App\Models\Kelas;
use App\Http\Requests\StoreDatasetRequest;
use App\Http\Requests\UpdateDatasetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.datasets.index', [
            'active' => 'datasets',
            'datasets' => Dataset::orderBy('created_at', 'desc')
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
    public function indexsiswa(Request $request)
    {
        if (Dataset::where('id_student', $request->id_siswa)->first()) {
            return redirect('/dashboard/students')->with('success', 'Dataset Telah Ada.');
        } else {
            return view('dashboard.datasets.create', [
                'active' => 'datasets',
                'student' => Student::where('id', $request->id_siswa)->first(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDatasetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDatasetRequest $request)
    {
        $validatedData = $request->validate([
            'id_student' => 'required',
            'fullname' => 'required',
            'dataset1' => 'image|file|max:50000',
            'dataset2' => 'image|file|max:50000',
            'dataset3' => 'image|file|max:50000',
        ]);
        if ($request->file('dataset1')) {
            $validatedData['dataset1'] = $request->file('dataset1')->store($validatedData['id_student']);
            $validatedData['dataset2'] = $request->file('dataset2')->store($validatedData['id_student']);
            $validatedData['dataset3'] = $request->file('dataset3')->store($validatedData['id_student']);
        }
        Dataset::create($validatedData);
        return redirect('/dashboard/datasets/')->with(['success', 'Dataset Siswa baru telah ditambahkan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dataset  $dataset
     * @return \Illuminate\Http\Response
     */
    public function show(Dataset $dataset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dataset  $dataset
     * @return \Illuminate\Http\Response
     */
    public function edit(Dataset $dataset)
    {
        return view('dashboard.datasets.edit', [
            'dataset' => $dataset,
            'active' => 'datasets',
            'kelas' => Kelas::orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDatasetRequest  $request
     * @param  \App\Models\Dataset  $dataset
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDatasetRequest $request, Dataset $dataset)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'id_student' => 'required',
            'fullname' => 'required',
            'dataset1' => 'image|file|max:50000',
            'dataset2' => 'image|file|max:50000',
            'dataset3' => 'image|file|max:50000',
        ]);
        if ($request->file('dataset1')) {
            $validatedData['dataset1'] = $request->file('dataset1')->store($validatedData['id_student']);
            $validatedData['dataset2'] = $request->file('dataset2')->store($validatedData['id_student']);
            $validatedData['dataset3'] = $request->file('dataset3')->store($validatedData['id_student']);
        }
        if ($request->file('dataset1')) {
            if ($dataset->dataset1) {
                Storage::delete($dataset['dataset1']);
                Storage::delete($dataset['dataset2']);
                Storage::delete($dataset['dataset3']);
            }
            $validatedData['dataset1'] = $request->file('dataset1')->store($validatedData['id_student']);
            $validatedData['dataset2'] = $request->file('dataset2')->store($validatedData['id_student']);
            $validatedData['dataset3'] = $request->file('dataset3')->store($validatedData['id_student']);
        }
        Dataset::where('id', $validatedData['id'])->update($validatedData);

        return redirect('/dashboard/datasets')->with('success', 'Dataset Siswa telah diubah!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dataset  $dataset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dataset $dataset)
    {
        Storage::deleteDirectory($dataset->id_student);
        if ($dataset->dataset1) {
            Storage::delete($dataset['dataset1']);
            Storage::delete($dataset['dataset2']);
            Storage::delete($dataset['dataset3']);
        }
        Dataset::destroy($dataset->id);

        return redirect('/dashboard/datasets')->with('success', 'Dataset Siswa telah dihapus.');
    }
}
