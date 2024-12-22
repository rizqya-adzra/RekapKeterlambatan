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

        $students = 0;
        $lateCount = 0;
        $lateToday = 0;
        $lateThisWeek = 0;
        $lateThisMonth = 0;
        $lateThisYear = 0;
        $student = 0;
        $pembimbing = null;

        if ($user->role === 'admin') {
            $lateToday = Late::whereDate('date_time_late', today())->count();
            $lateThisWeek = Late::whereBetween('date_time_late', [now()->startOfWeek(), now()->endOfWeek()])->count();
            $lateThisMonth = Late::whereBetween('date_time_late', [now()->startOfMonth(), now()->endOfMonth()])->count();
            $lateThisYear = Late::whereBetween('date_time_late', [now()->startOfYear(), now()->endOfYear()])->count();

            $student = Student::count();
        } else {
            $rayon = Rayon::where('user_id', $user->id)->first();

            if ($rayon) {
                $students = Student::where('rayon_id', $rayon->id)->count();

                $lateCount = Late::whereHas('student', function ($query) use ($rayon) {
                    $query->where('rayon_id', $rayon->id);
                })->whereDate('date_time_late', today())->count();

                $pembimbing = $rayon;
            }
        }

        $rayonCount = Rayon::count();
        $rombel = Rombel::count();
        $rayon = Rayon::count();
        $admin = User::where('role', 'admin')->count();
        $ps = User::where('role', 'ps')->count();

        return view('admin.dashboard', compact(
            'ps',
            'admin',
            'rayonCount',
            'rombel',
            'rayon',
            'students',
            'pembimbing',
            'lateCount',
            'lateToday',
            'lateThisWeek',
            'lateThisMonth',
            'lateThisYear',
            'student'
        ));
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
