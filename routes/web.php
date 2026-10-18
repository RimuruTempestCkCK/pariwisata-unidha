<?php

use Illuminate\Support\Facades\Route;
use App\Services\NewsDataService;

/*
|--------------------------------------------------------------------------
| Web Routes - Frontend S1 Pariwisata UNIDHA
|--------------------------------------------------------------------------
*/

// ================= PUBLIC FRONTEND =================
Route::get('/', function () {
    $latestNews = NewsDataService::getLatest(3);
    return view('pages.home', compact('latestNews'));
})->name('home');

Route::get('/profil', function () {
    return view('pages.profil');
})->name('profil');

Route::get('/akademik', function () {
    return view('pages.akademik');
})->name('akademik');

Route::get('/kemahasiswaan', function () {
    return view('pages.kemahasiswaan');
})->name('kemahasiswaan');

Route::get('/berita', function () {
    $newsList = NewsDataService::getAll();
    return view('pages.berita', compact('newsList'));
})->name('berita.index');

Route::get('/berita/{slug}', function (string $slug) {
    $news = NewsDataService::findBySlug($slug);
    
    if (!$news) {
        abort(404, 'Berita tidak ditemukan.');
    }

    $allNews = NewsDataService::getAll();
    $relatedNews = array_values(array_filter($allNews, fn($item) => $item['slug'] !== $slug));
    $relatedNews = array_slice($relatedNews, 0, 3);

    return view('pages.detail-berita', compact('news', 'relatedNews'));
})->name('berita.show');

Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');

Route::get('/link', function () {
    return view('pages.link');
})->name('link');

Route::get('/spmb-2026', function () {
    return view('pages.spmb');
})->name('spmb');


// ================= AUTHENTICATION MOCKUP =================
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


// ================= ADMIN DASHBOARD MOCKUP =================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        $newsList = NewsDataService::getAll();
        return view('admin.pages.dashboard', compact('newsList'));
    })->name('dashboard');

    Route::get('/berita', function () {
        $newsList = NewsDataService::getAll();
        return view('admin.pages.berita', compact('newsList'));
    })->name('berita');

    Route::get('/landing', function () {
        return view('admin.pages.landing');
    })->name('landing');

    Route::get('/banner-logo', function () {
        return view('admin.pages.banner-logo');
    })->name('banner-logo');

    Route::get('/profil', function () {
        return view('admin.pages.profil');
    })->name('profil');

    Route::get('/kurikulum', function () {
        return view('admin.pages.kurikulum');
    })->name('kurikulum');

    Route::get('/pengaturan', function () {
        return view('admin.pages.pengaturan');
    })->name('pengaturan');
});


// ================= FALLBACK 404 =================
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
