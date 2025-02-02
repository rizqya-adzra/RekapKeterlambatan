<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');

Route::middleware(['isLogin'])->group(function() {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    
    Route::prefix('/rombel')->name('rombel.')->group(function(){
        Route::get('/', [RombelController::class, 'index'])->name('index');
        Route::get('/create', [RombelController::class, 'create'])->name('create');
        Route::post('/store', [RombelController::class, 'store'])->name('store');
        Route::put('/edit/{id}', [RombelController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [RombelController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RombelController::class, 'destroy'])->name('delete');
    });
    
    Route::prefix('/rayon')->name('rayon.')->group(function() {
        Route::get('/', [RayonController::class, 'index'])->name('index');
        Route::get('/create', [RayonController::class, 'create'])->name('create');
        Route::post('/store', [RayonController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [RayonController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [RayonController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RayonController::class, 'destroy'])->name('delete');
    });
    
    Route::prefix('/user')->name('user.')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
        Route::post('/user/reset-password/{id}', [UserController::class, 'resetPassword'])->name('reset');
    });
    
    Route::prefix('/student')->name('student.')->group(function() {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('/store', [StudentController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [StudentController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('delete');
});

Route::prefix('/late')->name('late.')->group(function() {
    Route::get('/', [LateController::class, 'index'])->name('index');
    Route::get('/create', [LateController::class, 'create'])->name('create');
    Route::post('/store', [LateController::class, 'store'])->name('store');
    Route::get('/show/{id}', [LateController::class, 'show'])->name('show');
    Route::delete('/delete/{id}', [LateController::class, 'destroy'])->name('delete');
    Route::get('/download/{id}', [LateController::class, 'downloadPDF'])->name('download');
    Route::get('/export/excel', [LateController::class, 'exportExcel'])->name('export-excel');
});

});