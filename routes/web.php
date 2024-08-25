<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\PemeriksaanIbu;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IbuController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IbuHamilController;
use App\Http\Controllers\DashboardController;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Http\Controllers\PemeriksaanIbuController;

Route::get('/', function () {
    $dataPetugas = [111, 121, 125, 135, 145, 155, 165];
    $data = json_encode($dataPetugas);
    return view('home', [
        'data' => $data,
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/employee', EmployeeController::class)->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/ibu', [IbuController::class, 'index'])->name('ibu');
    Route::post('/ibu', [IbuController::class, 'store']);
    Route::put('/ibu', [IbuController::class, 'update']);
    Route::delete('/ibu', [IbuController::class, 'destroy'])->name('ibu.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/ibu-hamil', [IbuHamilController::class, 'index'])->name('ibu-hamil');
    Route::post('/ibu-hamil', [IbuHamilController::class, 'store']);
    Route::put('/ibu-hamil', [IbuHamilController::class, 'update']);
    Route::delete('/ibu-hamil', [IbuHamilController::class, 'destroy'])->name('ibu-hamil.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/pemeriksaan-ibu', [PemeriksaanIbuController::class, 'index'])->name('pemeriksaanIbu');
    Route::get('/pemeriksaan-ibu/show/{id}', [PemeriksaanIbuController::class, 'show'])->name('pemeriksaanIbu-show');
    Route::post('/pemeriksaan-ibu', [PemeriksaanIbuController::class, 'store']);
    Route::put('/pemeriksaan-ibu', [PemeriksaanIbuController::class, 'update']);
    Route::delete('/pemeriksaan-ibu', [PemeriksaanIbuController::class, 'destroy'])->name('pemeriksaanIbu.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/anak', [AnakController::class, 'index'])->name('anak');
    Route::post('/anak', [AnakController::class, 'store']);
    Route::put('/anak', [AnakController::class, 'update']);
    Route::delete('/anak', [AnakController::class, 'destroy'])->name('anak.destroy');
});

require __DIR__ . '/auth.php';
