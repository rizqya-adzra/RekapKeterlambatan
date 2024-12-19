<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Late;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;

class LateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validatedData = $request->validate([
            'search' => 'nullable|string|max:255',
        ]);

        $late = Late::with('student')->orderBy('id', 'ASC')->simplePaginate(10);

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

        $file = $request->file('bukti');
        $filePath = $file->storeAs('uploads', time() . '_' . $file->getClientOriginalName(), 'public');

        $late = Late::create([
            'student_id' => $request->student,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $filePath,
        ]);

        if ($late) {
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
        $lates = Late::where('student_id', $id)->with('student')->get();
        return view('admin.late.show', compact('lates'));
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
        $late = Late::where('id', $id)->delete();
        if ($late) {
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->with('failed', 'Data gagal dihapus');
        }
    }

    public function downloadPDF($id)
    {
        $lates = Late::with('student')->find($id);
        // dd($lates);
        view()->share('late', $lates);
        $pdf = Pdf::loadView('admin.late.donwload', compact('lates'));
        return $pdf->download('surat_pernyataan_' . $lates->student->nis . '.pdf');
    }
}
