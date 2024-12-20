<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Rayon;
use App\Models\User;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 5);
    
        $search = $request->get('search', ''); 
    
        $user = User::all();
    
        $rayon = Rayon::where('rayon', 'LIKE', '%' . $search . '%')->with('user')->orderBy('rayon', 'ASC')->paginate($perPage);
    
        return view('admin.rayon.index', compact('rayon', 'user', 'perPage', 'search'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('role', 'ps')->get();
        return view('admin.rayon.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        $request->validate ([
            'rayon' => 'required',
            'user_id' => 'required'
        ]);

        $rayon = Rayon::create([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        if($rayon) {
            return redirect()->route('rayon.index')->with('success', 'Data berhasil ditambahkan!');
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
        $user = User::where('role', 'ps')->get();
        $rayon = Rayon::find($id);
        return view('admin.rayon.edit', compact('rayon', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate ([
            'rayon' => 'required',
            'user_id' => 'required'
        ]);

        $rayon = Rayon::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        if($rayon) {
            return redirect()->route('rayon.index')->with('success', 'Data berhasil Diedit!');
        } else {
            return redirect()->back()->with('failed', 'Data gagal di edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rombel = Rayon::where('id', $id)->delete();
        if($rombel) {
            return redirect()->back()->with('success' , 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->with('failed', 'Data gagal dihapus');
        }
    }
}
