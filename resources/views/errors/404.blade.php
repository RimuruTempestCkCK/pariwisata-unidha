@extends('layouts.public')

@section('title', '404 - Halaman Tidak Ditemukan')

@section('content')
<section class="py-24 sm:py-32 flex items-center justify-center min-h-[60vh] bg-slate-50">
    <div class="max-w-xl mx-auto px-4 text-center space-y-6">
        <div class="inline-flex items-center justify-center w-24 h-24 rounded-3xl bg-amber-100 text-amber-600 font-extrabold text-4xl shadow-inner">
            404
        </div>
        
        <div class="space-y-2">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900">
                Halaman Tidak Ditemukan
            </h1>
            <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                Mohon maaf, halaman yang Anda cari tidak tersedia atau mungkin telah dipindahkan.
            </p>
        </div>

        <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('home') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-bold text-sm text-white bg-blue-900 hover:bg-blue-800 transition-colors shadow-md">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Kembali ke Beranda</span>
            </a>
            <a href="{{ route('berita.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl font-semibold text-sm text-slate-700 bg-white border border-slate-300 hover:bg-slate-50 transition-colors">
                Lihat Berita Terbaru
            </a>
        </div>
    </div>
</section>
@endsection
