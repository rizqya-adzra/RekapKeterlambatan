<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Rombel;
use App\Models\Rayon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $student = Student::where('name', 'LIKE', '%'.$request->search.'%')->orderBy('name', 'ASC')->simplePaginate(10);
        return view('admin.student.index', compact('student'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rombel = Rombel::all();
        $rayon = Rayon::all();
        $items = $rombel->merge($rayon);
        return view('admin.student.create', compact('rombel', 'rayon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);
        
        $student = Student::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        if($student) {
            return redirect()->route('student.index')->with('success', 'Data berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('failed', 'Data gagal di tambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rombel = Rombel::all();
        $rayon = Rayon::all();
        $student = Student::find($id);
        return view('admin.student.edit', compact('rombel', 'rayon', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        $rombel = $request->rombel_id;
        $rayon = $request->rayon_id;

        foreach($rombel as $key)
        $rombelFormat = Rombel::find($key);
    
        foreach($rayon as $key)
        $rayonFormat = Rayon::find($key);

        $afterRombel = [
            "id" => $key,
            "name_rombel" => $rombelFormat['rombel'],
        ];

        $afterRayon = [
            "id" => $key,
            "name_rayon" => $rayonFormat['rayon'],
        ];
        
        $proses = Student::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $afterRombel,
            'rayon_id' => $afterRayon,
        ]);

        if ($proses) {
            return redirect()->route('student.index')->with('success', 'Berhasil Mengubah Data Siswa!');
        } else {
            return redirect()->back()->with('failed', 'Gagal Mengubah Data Siswa!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::where('id', $id)->delete();
        if($student) {
            return redirect()->back()->with('success' , 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->with('failed', 'Data gagal dihapus');
        }
    }
}
