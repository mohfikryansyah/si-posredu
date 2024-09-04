<?php

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use App\Models\Pelayanan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IbuController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LansiaController;
use App\Http\Controllers\RemajaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PemeriksaanIbuController;
use App\Http\Controllers\PemeriksaanAnakController;
use App\Http\Controllers\PemeriksaanLansiaController;
use App\Http\Controllers\PemeriksaanRemajaController;

Route::get('/', function () {
    $dataPetugas = [111, 121, 125, 135, 145, 155, 165];
    $data = json_encode($dataPetugas);
    return view('home', [
        'data' => $data,
        'pelayanans' => Pelayanan::latest()->take(2)->get(),
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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

Route::middleware('auth')->group(function () {
    Route::get('/pemeriksaan-anak', [PemeriksaanAnakController::class, 'index'])->name('pemeriksaanAnak');
    Route::get('/pemeriksaan-anak/show/{id}', [PemeriksaanAnakController::class, 'show'])->name('pemeriksaanAnak-show');
    Route::post('/pemeriksaan-anak', [PemeriksaanAnakController::class, 'store']);
    Route::put('/pemeriksaan-anak', [PemeriksaanAnakController::class, 'update']);
    Route::delete('/pemeriksaan-anak', [PemeriksaanAnakController::class, 'destroy'])->name('pemeriksaanAnak.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/lansia', [LansiaController::class, 'index'])->name('lansia');
    Route::post('/lansia', [LansiaController::class, 'store']);
    Route::put('/lansia', [LansiaController::class, 'update']);
    Route::delete('/lansia', [LansiaController::class, 'destroy'])->name('lansia.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/pemeriksaan-lansia', [PemeriksaanLansiaController::class, 'index'])->name('pemeriksaanLansia');
    Route::get('/pemeriksaan-lansia/show/{id}', [PemeriksaanLansiaController::class, 'show'])->name('pemeriksaanLansia-show');
    Route::post('/pemeriksaan-lansia', [PemeriksaanLansiaController::class, 'store']);
    Route::put('/pemeriksaan-lansia', [PemeriksaanLansiaController::class, 'update']);
    Route::delete('/pemeriksaan-lansia', [PemeriksaanLansiaController::class, 'destroy'])->name('pemeriksaanLansia.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/remaja', [RemajaController::class, 'index'])->name('remaja');
    Route::post('/remaja', [RemajaController::class, 'store']);
    Route::put('/remaja', [RemajaController::class, 'update']);
    Route::delete('/remaja', [RemajaController::class, 'destroy'])->name('remaja.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/pemeriksaan-remaja', [PemeriksaanRemajaController::class, 'index'])->name('pemeriksaanRemaja');
    Route::get('/pemeriksaan-remaja/show/{id}', [PemeriksaanRemajaController::class, 'show'])->name('pemeriksaanRemaja-show');
    Route::post('/pemeriksaan-remaja', [PemeriksaanRemajaController::class, 'store']);
    Route::put('/pemeriksaan-remaja', [PemeriksaanRemajaController::class, 'update']);
    Route::delete('/pemeriksaan-remaja', [PemeriksaanRemajaController::class, 'destroy'])->name('pemeriksaanRemaja.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('/categories', CategoryController::class)->except('destroy');
    Route::delete('/categories', [CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('/posts', PostController::class)->except('destroy');
    Route::delete('/posts', [PostController::class, 'destroy'])->name('post.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('/jadwal-pelayanan', PelayananController::class)->except('destroy');
    Route::delete('/jadwal-pelayanan', [PelayananController::class, 'destroy'])->name('jadwal-pelayanan.destroy');
});

require __DIR__ . '/auth.php';
