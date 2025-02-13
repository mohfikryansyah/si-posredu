<?php

use Carbon\Carbon;
use App\Models\Master;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IbuController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LansiaController;
use App\Http\Controllers\RemajaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\AppSettingController;
use App\Http\Controllers\PemeriksaanIbuController;
use App\Http\Controllers\PemeriksaanAnakController;
use App\Http\Controllers\PetugasKesehatanController;
use App\Http\Controllers\PemeriksaanLansiaController;
use App\Http\Controllers\PemeriksaanRemajaController;
use App\Http\Controllers\Kader\DashboardController as KaderController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\Masyarakat\DashboardController as MasyarakatController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/check-nik', function (Request $request) {
    // $nik = $request->query('nik');
    // return Master::where('nik', $nik)->exists()
    //     ? response()->json(['message' => 'NIK ditemukan', 'status' => true])
    //     : response()->json(['message' => 'NIK tidak ditemukan', 'status' => false], 404);

    $nik = $request->nik;
    $user = Master::where('nik', $nik)->first();

    if ($user) {
        return response()->json([
            'success' => true,
            'nama' => $user->nama,
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'NIK tidak ditemukan'
        ], 404);
    }
});

Route::prefix('admin')
    ->middleware('auth', CheckRole::class . ':ADMIN')
    ->group(function () {
        Route::get('/app-setting', [AppSettingController::class, 'index'])->name('app-setting.index');
        Route::put('/app-setting/{id}', [AppSettingController::class, 'update'])->name('app-setting.update');
    });
Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('blog/load-more', [BlogController::class, 'loadMore'])->name('blog.loadMore');
Route::get('blog/read/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::get('blog/search', [BlogController::class, 'search'])->name('blog.search');

Route::prefix('admin')
    ->middleware('auth', CheckRole::class . ':ADMIN')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/export-entitas-tanpa-pemeriksaan', [DashboardController::class, 'export'])->name('dashboard.export');
        Route::resource('/master', MasterController::class)->except(['destroy', 'update']);
        Route::delete('/master', [MasterController::class, 'destroy'])->name('master.destroy');
        Route::put('/master', [MasterController::class, 'update'])->name('master.update');
    });

Route::prefix('petugas')
    ->middleware('auth', CheckRole::class . ':KADER')
    ->group(function () {
        Route::get('/dashboard', [KaderController::class, 'index'])->name('dashboard.kader');
    });

Route::prefix('masyarakat')
    ->middleware('auth', CheckRole::class . ':MASYARAKAT')
    ->group(function () {
        Route::get('/dashboard', [MasyarakatController::class, 'index'])->name('dashboard.masyarakat');
    });

Route::middleware('auth', CheckRole::class . ':ADMIN')->group(function () {
    Route::resource('/employee', EmployeeController::class)->except('destroy');
    Route::delete('/employee', [EmployeeController::class, 'destroy'])->name('employee.destroy');
});

Route::middleware('auth', CheckRole::class . ':ADMIN')->group(function () {
    Route::resource('/petugas-kesehatan', PetugasKesehatanController::class)->except('destroy');
    Route::delete('/petugas-kesehatan', [PetugasKesehatanController::class, 'destroy'])->name('petugaskesehatan.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', CheckRole::class . ':ADMIN,KADER'])->group(function () {
    Route::get('/ibu', [IbuController::class, 'index'])->name('ibu');
    Route::post('/ibu', [IbuController::class, 'store']);
    Route::put('/ibu', [IbuController::class, 'update']);
    Route::delete('/ibu', [IbuController::class, 'destroy'])->name('ibu.destroy');
});

Route::middleware(['auth', CheckRole::class . ':ADMIN,KADER'])->group(function () {
    Route::get('/pemeriksaan-ibu', [PemeriksaanIbuController::class, 'index'])->name('pemeriksaanIbu');
    Route::get('/ibu-hamil-tanpa-pemeriksaan', [PemeriksaanIbuController::class, 'tanpaPemeriksaanIbu'])->name('tanpaPemeriksaanIbu');
    Route::post('/pemeriksaan-ibu', [PemeriksaanIbuController::class, 'store']);
    Route::put('/pemeriksaan-ibu', [PemeriksaanIbuController::class, 'update']);
    Route::delete('/pemeriksaan-ibu', [PemeriksaanIbuController::class, 'destroy'])->name('pemeriksaanIbu.destroy');
});

Route::middleware(['auth', CheckRole::class . ':ADMIN,KADER'])->group(function () {
    Route::get('/anak', [AnakController::class, 'index'])->name('anak');
    Route::post('/anak', [AnakController::class, 'store']);
    Route::put('/anak', [AnakController::class, 'update']);
    Route::delete('/anak', [AnakController::class, 'destroy'])->name('anak.destroy');
});

Route::middleware(['auth', CheckRole::class . ':ADMIN,KADER'])->group(function () {
    Route::get('/pemeriksaan-anak', [PemeriksaanAnakController::class, 'index'])->name('pemeriksaanAnak');
    Route::get('/anak-tanpa-pemeriksaan', [PemeriksaanAnakController::class, 'tanpaPemeriksaanAnak'])->name('tanpaPemeriksaanAnak');
    Route::post('/pemeriksaan-anak', [PemeriksaanAnakController::class, 'store']);
    Route::put('/pemeriksaan-anak', [PemeriksaanAnakController::class, 'update']);
    Route::delete('/pemeriksaan-anak', [PemeriksaanAnakController::class, 'destroy'])->name('pemeriksaanAnak.destroy');
});

Route::middleware(['auth', CheckRole::class . ':ADMIN,KADER'])->group(function () {
    Route::get('/lansia', [LansiaController::class, 'index'])->name('lansia');
    Route::post('/lansia', [LansiaController::class, 'store']);
    Route::put('/lansia', [LansiaController::class, 'update']);
    Route::delete('/lansia', [LansiaController::class, 'destroy'])->name('lansia.destroy');
});

Route::middleware(['auth', CheckRole::class . ':ADMIN,KADER'])->group(function () {
    Route::get('/pemeriksaan-lansia', [PemeriksaanLansiaController::class, 'index'])->name('pemeriksaanLansia');
    Route::get('/lansia-tanpa-pemeriksaan', [PemeriksaanLansiaController::class, 'tanpaPemeriksaanLansia'])->name('tanpaPemeriksaanLansia');
    Route::post('/pemeriksaan-lansia', [PemeriksaanLansiaController::class, 'store']);
    Route::put('/pemeriksaan-lansia', [PemeriksaanLansiaController::class, 'update']);
    Route::delete('/pemeriksaan-lansia', [PemeriksaanLansiaController::class, 'destroy'])->name('pemeriksaanLansia.destroy');
});

Route::middleware(['auth', CheckRole::class . ':ADMIN,KADER'])->group(function () {
    Route::get('/remaja', [RemajaController::class, 'index'])->name('remaja');
    Route::post('/remaja', [RemajaController::class, 'store']);
    Route::put('/remaja', [RemajaController::class, 'update']);
    Route::delete('/remaja', [RemajaController::class, 'destroy'])->name('remaja.destroy');
});

Route::middleware(['auth', CheckRole::class . ':ADMIN,KADER'])->group(function () {
    Route::get('/pemeriksaan-remaja', [PemeriksaanRemajaController::class, 'index'])->name('pemeriksaanRemaja');
    Route::get('/remaja-tanpa-pemeriksaan', [PemeriksaanRemajaController::class, 'tanpaPemeriksaanRemaja'])->name('tanpaPemeriksaanRemaja');
    Route::post('/pemeriksaan-remaja', [PemeriksaanRemajaController::class, 'store']);
    Route::put('/pemeriksaan-remaja', [PemeriksaanRemajaController::class, 'update']);
    Route::delete('/pemeriksaan-remaja', [PemeriksaanRemajaController::class, 'destroy'])->name('pemeriksaanRemaja.destroy');
});

Route::middleware('auth', CheckRole::class . ':ADMIN')->group(function () {
    Route::resource('/categories', CategoryController::class)->except('destroy');
    Route::delete('/categories', [CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::middleware('auth', CheckRole::class . ':ADMIN')->group(function () {
    Route::resource('/posts', PostController::class)->except('destroy');
    Route::delete('/posts', [PostController::class, 'destroy'])->name('post.destroy');
});

Route::middleware('auth', CheckRole::class . ':ADMIN')->group(function () {
    Route::resource('/jadwal-pelayanan', PelayananController::class)->except('destroy');
    Route::delete('/jadwal-pelayanan', [PelayananController::class, 'destroy'])->name('jadwal-pelayanan.destroy');
});

Route::middleware('auth', CheckRole::class . ':ADMIN')->group(function () {
    Route::resource('/gallery', GalleryController::class)->except('destroy');
    Route::delete('/gallery', [GalleryController::class, 'destroy'])->name('gallery.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/pemeriksaan-ibu/show/{id}', [PemeriksaanIbuController::class, 'show'])->name('pemeriksaanIbu-show');
    Route::get('/pemeriksaan-anak/show/{id}', [PemeriksaanAnakController::class, 'show'])->name('pemeriksaanAnak-show');
    Route::get('/pemeriksaan-lansia/show/{id}', [PemeriksaanLansiaController::class, 'show'])->name('pemeriksaanLansia-show');
    Route::get('/pemeriksaan-remaja/show/{id}', [PemeriksaanRemajaController::class, 'show'])->name('pemeriksaanRemaja-show');
});

Route::middleware(['auth', CheckRole::class . ':KADER,ADMIN,MASYARAKAT'])->group(function () {
    Route::get('/ibu/export', [IbuController::class, 'export'])->name('ibu.export');
    Route::get('/pemeriksaan-ibu/export', [PemeriksaanIbuController::class, 'export'])->name('pemeriksaanIbu.export');
    Route::get('/anak/export', [AnakController::class, 'export'])->name('anak.export');
    Route::get('/pemeriksaan-anak/export', [PemeriksaanAnakController::class, 'export'])->name('pemeriksaanAnak.export');
    Route::get('/lansia/export', [LansiaController::class, 'export'])->name('lansia.export');
    Route::get('/pemeriksaan-lansia/export', [PemeriksaanLansiaController::class, 'export'])->name('pemeriksaanLansia.export');
    Route::get('/remaja/export', [RemajaController::class, 'export'])->name('remaja.export');
    Route::get('/pemeriksaan-remaja/export', [PemeriksaanRemajaController::class, 'export'])->name('pemeriksaanRemaja.export');
});

require __DIR__ . '/auth.php';
