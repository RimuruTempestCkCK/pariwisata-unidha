<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\LandingController;
use App\Http\Controllers\Admin\BannerLogoController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\CurriculumController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\KemahasiswaanController;
use App\Http\Controllers\Admin\PimpinanController;

/*
|--------------------------------------------------------------------------
| Web Routes - Frontend & Admin S1 Pariwisata UNIDHA
|--------------------------------------------------------------------------
*/

// ================= PUBLIC FRONTEND =================
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/profil', [PublicController::class, 'profil'])->name('profil');
Route::get('/akademik', [PublicController::class, 'akademik'])->name('akademik');
Route::get('/kemahasiswaan', [PublicController::class, 'kemahasiswaan'])->name('kemahasiswaan');
Route::get('/berita', [PublicController::class, 'berita'])->name('berita.index');
Route::get('/berita/{slug}', [PublicController::class, 'detailBerita'])->name('berita.show');
Route::get('/kontak', [PublicController::class, 'kontak'])->name('kontak');
Route::get('/link', [PublicController::class, 'link'])->name('link');
Route::get('/spmb-2026', [PublicController::class, 'spmb'])->name('spmb');


// ================= AUTHENTICATION =================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ================= ADMIN DASHBOARD (PROTECTED) =================
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Berita CRUD
    Route::get('/berita', [NewsController::class, 'index'])->name('berita');
    Route::post('/berita', [NewsController::class, 'store'])->name('berita.store');
    Route::put('/berita/{news}', [NewsController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{news}', [NewsController::class, 'destroy'])->name('berita.destroy');

    // Landing Page CRUD
    Route::get('/landing', [LandingController::class, 'index'])->name('landing');
    Route::post('/landing', [LandingController::class, 'store'])->name('landing.store');
    Route::put('/landing/{element}', [LandingController::class, 'update'])->name('landing.update');
    Route::delete('/landing/{element}', [LandingController::class, 'destroy'])->name('landing.destroy');

    // Banner & Logo
    Route::get('/banner-logo', [BannerLogoController::class, 'index'])->name('banner-logo');
    Route::put('/banner-logo/slide/{slide}', [BannerLogoController::class, 'updateSlide'])->name('banner-logo.slide');
    Route::post('/banner-logo/logo', [BannerLogoController::class, 'updateLogo'])->name('banner-logo.logo');
    Route::put('/banner-logo/theme', [BannerLogoController::class, 'updateTheme'])->name('banner-logo.theme');

    // Profil CRUD
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::post('/profil', [ProfilController::class, 'store'])->name('profil.store');
    Route::put('/profil/{profil}', [ProfilController::class, 'update'])->name('profil.update');
    Route::delete('/profil/{profil}', [ProfilController::class, 'destroy'])->name('profil.destroy');

    // Tata Kelola & Pimpinan CRUD
    Route::get('/pimpinan', [PimpinanController::class, 'index'])->name('pimpinan');
    Route::post('/pimpinan/header', [PimpinanController::class, 'updateHeader'])->name('pimpinan.header');
    Route::post('/pimpinan', [PimpinanController::class, 'store'])->name('pimpinan.store');
    Route::put('/pimpinan/{pimpinan}', [PimpinanController::class, 'update'])->name('pimpinan.update');
    Route::delete('/pimpinan/{pimpinan}', [PimpinanController::class, 'destroy'])->name('pimpinan.destroy');

    // Kurikulum CRUD
    Route::get('/kurikulum', [CurriculumController::class, 'index'])->name('kurikulum');
    Route::post('/kurikulum', [CurriculumController::class, 'store'])->name('kurikulum.store');
    Route::put('/kurikulum/{kurikulum}', [CurriculumController::class, 'update'])->name('kurikulum.update');
    Route::delete('/kurikulum/{kurikulum}', [CurriculumController::class, 'destroy'])->name('kurikulum.destroy');

    // Kemahasiswaan & HIMPAR
    Route::get('/kemahasiswaan', [KemahasiswaanController::class, 'index'])->name('kemahasiswaan');
    Route::post('/kemahasiswaan', [KemahasiswaanController::class, 'update'])->name('kemahasiswaan.update');

    // Link & Direktori CRUD
    Route::get('/link', [LinkController::class, 'index'])->name('link');
    Route::post('/link', [LinkController::class, 'store'])->name('link.store');
    Route::put('/link/{link}', [LinkController::class, 'update'])->name('link.update');
    Route::delete('/link/{link}', [LinkController::class, 'destroy'])->name('link.destroy');

    // Pengaturan Website, Kontak & Footer
    Route::get('/pengaturan', [SettingController::class, 'index'])->name('pengaturan');
    Route::post('/pengaturan', [SettingController::class, 'update'])->name('pengaturan.update');
});


// ================= FALLBACK 404 =================
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
