<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rombel;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rombel = Rombel::where('rombel', 'LIKE', '%'.$request->search.'%')->orderBy('rombel', 'ASC')->simplePaginate(10);
        return view('admin.rombel.index', compact('rombel')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rombel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rombel' => 'required',
        ],
    [
        'rombel.required' => 'Wajib Diisi!'
    ]);

        $proses = Rombel::create([
            'rombel' => $request->rombel,
        ]); 

        if($proses) {
            return redirect()->route('rombel.index')->with('success', 'Data Rombel Berhasil Ditambahkan!');
        } else {
            return redirect()->back()->with('failed', 'Data gagal ditambahkan');
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
    public function edit(Request $request, $id)
    {
        if(!isset($request->rombel)) {
            return response()->json(['failed' => 'Stok tidak boleh kosong'], 400);
        }

        $rombel = Rombel::findOrFail($id);
        $rombel->update(['rombel' => $request->rombel]);

        return response()->json(['success' => 'Stok Berhasil diupdate'], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate ([
            'rombel' => 'required',
        ]);

        $rombel = Rombel::where('id', $id)->first();
        $proses = $rombel->update([
            'rombel' => $request->rombel
        ]);

        if($proses) {
            return redirect()->back()->with('success', 'Data berhasil di edit');
        } else {
            return redirect()->back()->with('failed', 'Data gagal di edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rombel = Rombel::where('id', $id)->delete();
        if($rombel) {
            return redirect()->back()->with('success' , 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->with('failed', 'Data gagal dihapus');
        }
    }
}
