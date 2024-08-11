<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IbuController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use ArielMejiaDev\LarapexCharts\LarapexChart;

Route::get('/', function () {
    $dataPetugas = [111, 121, 125, 135, 145, 155, 165];
    $data = json_encode($dataPetugas);
    return view('home', [
        'data' => $data
    ]);
});

Route::get('/dashboard', function () {
    $dataPetugas = [111, 121, 125, 135, 145, 155, 165];
    $data = json_encode($dataPetugas);
    return view('dashboard', [
        'user' => User::all(),
        'data' => $data
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/employee', EmployeeController::class)->middleware(['auth', 'verified']);
Route::resource('/ibu', IbuController::class)->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
