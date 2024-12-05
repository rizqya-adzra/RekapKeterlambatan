<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Late;
use App\Models\Student;

class LateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $late = Late::where('id', 'LIKE', '%'. $request->search .'%')->orderBy('id', 'ASC')->simplePaginate(10);
        return view('admin.late.index', compact('late'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::all();
        return view('admin.late.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required',
        ]);

        $student = $request->student;
        foreach($student as $key)
        $detailFormat = Student::find($key);

        $studentFormat = [
            "id" => $key,
            "name" => $detailFormat['name'],   
            "nis" => $detailFormat['nis']
        ];

        $file = $request->file('bukti');
        $filePath = $file->storeAs('uploads', time() . '_' . $file->getClientOriginalName(), 'public');

        $late = Late::create([
            'student_id' => $studentFormat,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $filePath, 
        ]);

        if($late) {
            return redirect()->route('late.index')->with('success', 'Data berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('failed', 'Data gagal di ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
