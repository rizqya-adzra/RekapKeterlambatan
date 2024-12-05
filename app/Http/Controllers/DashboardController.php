<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all()->count();
        $rayon = Rayon::all()->count();
        $rombel = Rombel::all()->count();
        // $user = User::all()->count();
        $admin = User::where('role', 'admin')->count();
        $ps = User::where('role', 'ps')->count();
        return view('admin.dashboard', compact('student', 'ps', 'admin', 'rayon', 'rombel'));
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
