<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 5);
    
        $search = $request->get('search', ''); 
    
        $user = User::where('name', 'LIKE', '%' . $search . '%')->orderBy('name', 'ASC')->paginate($perPage);
    
        return view('admin.user.index', compact('user', 'perPage', 'search'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'nullable', 
        ]);
    
        $nameParts = explode(' ', $request->name); 
        $emailParts = explode('@', $request->email); 
    
        $defaultPassword = (isset($nameParts[0]) ? $nameParts[0] : '') .
                            (isset($nameParts[1]) ? $nameParts[1] : '') .
                            (isset($nameParts[2]) ? $nameParts[2] : '') .
                            (isset($emailParts[0]) ? $emailParts[0] : '');
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($defaultPassword),
        ]);
    
        if($user) {
            return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('failed', 'User gagal ditambahkan!');
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
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $proses = User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        if ($proses) {
            return redirect()->route('user.index')->with('success', 'Berhasil Mengubah Data Akun!');
        } else {
            return redirect()->back()->with('failed', 'Gagal Mengubah Data Akun!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rombel = User::where('id', $id)->delete();
        if($rombel) {
            return redirect()->back()->with('success' , 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->with('failed', 'Data gagal dihapus');
        }
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],
        );

        $proses = $request->only(['email', 'password']); 
        if (Auth::attempt($proses)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('failed', 'Login gagal, silahkan coba lagi');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('logout', 'Anda telah Logout!');
    }
        
}
