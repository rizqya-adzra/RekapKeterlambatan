<?php

namespace App\Http\Controllers;

use App\Models\Late;
use Illuminate\Http\Request;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $students = 0;
            $lateCount = 0;
        } else {
            $rayon = Rayon::where('user_id', $user->id)->first();

            $students = Student::where('rayon_id', $rayon->id)->count();

            $lateCount = Late::whereHas('student', function ($query) use ($rayon) {
                $query->where('rayon_id', $rayon->id);
            })->whereDate('created_at', today())->count();
            
        }

        $student = Student::count();
        $rayonCount = Rayon::count();
        $rombel = Rombel::count();
        $rayon = Rayon::count();
        $admin = User::where('role', 'admin')->count();
        $ps = User::where('role', 'ps')->count();

        $pembimbing = Rayon::where('user_id', $user->id)->first();

        return view('admin.dashboard', compact('student', 'ps', 'admin', 'rayonCount', 'rombel', 'rayon', 'students', 'pembimbing', 'lateCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
