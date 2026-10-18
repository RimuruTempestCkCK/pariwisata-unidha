@extends('layouts.public')

@section('title', 'Tautan & Informasi Eksternal - S1 Pariwisata UNIDHA')
@section('meta_description', 'Direktori tautan resmi institusi, portal akademik, jurnal, dan informasi eksternal Universitas Dharma Andalas.')

@section('content')
<!-- Page Banner -->
<section class="bg-gradient-to-r from-slate-950 via-blue-950 to-slate-900 text-white py-16 sm:py-20 border-b border-slate-800 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <span class="inline-block px-3 py-1 rounded-full bg-amber-500/20 text-amber-400 text-xs font-bold uppercase tracking-wider mb-3">
            Direktori Tautan
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mb-4">
            Link & Portal Informasi Terkait
        </h1>
        <p class="text-slate-300 max-w-2xl text-base sm:text-lg">
            Akses langsung ke portal resmi Universitas Dharma Andalas, organisasi kemahasiswaan, dan referensi akademik kepariwisataan.
        </p>
    </div>
</section>

<!-- Breadcrumb -->
@include('components.breadcrumb', ['items' => ['Link & Informasi' => null]])

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 space-y-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Portal Utama UNIDHA -->
        <a href="https://unidha.ac.id" target="_blank" rel="noopener noreferrer" class="bg-white rounded-2xl p-6 border border-slate-200 hover:border-blue-500 hover:shadow-lg transition-all group flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-900 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 group-hover:text-blue-900 text-lg transition-colors">
                    Website Resmi Universitas Dharma Andalas
                </h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Portal utama universitas yang memuat profil pimpinan, seluruh fakultas, lembaga penjaminan mutu, dan informasi universitas.
                </p>
            </div>
            <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-blue-900">
                <span>unidha.ac.id</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </div>
        </a>

        <!-- Instagram Prodi -->
        <a href="https://instagram.com/s1pariwisata_unidha" target="_blank" rel="noopener noreferrer" class="bg-white rounded-2xl p-6 border border-slate-200 hover:border-pink-500 hover:shadow-lg transition-all group flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-xl bg-pink-100 text-pink-700 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 group-hover:text-pink-600 text-lg transition-colors">
                    Instagram Resmi S1 Pariwisata
                </h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Media sosial resmi program studi untuk publikasi visual perkuliahan, warta dosen, dan pencapaian akademik.
                </p>
            </div>
            <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-pink-600">
                <span>@s1pariwisata_unidha</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </div>
        </a>

        <!-- Instagram HIMPAR -->
        <a href="https://instagram.com/himpar.unidha" target="_blank" rel="noopener noreferrer" class="bg-white rounded-2xl p-6 border border-slate-200 hover:border-purple-500 hover:shadow-lg transition-all group flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 group-hover:text-purple-700 text-lg transition-colors">
                    Instagram HIMPAR UNIDHA
                </h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Kanal informasi kegiatan mahasiswa, dokumentasi acara kampus, studi trip, dan kepengurusan himpunan.
                </p>
            </div>
            <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-purple-700">
                <span>@himpar.unidha</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </div>
        </a>

        <!-- Halaman SPMB 2026 -->
        <a href="{{ route('spmb') }}" class="bg-white rounded-2xl p-6 border border-slate-200 hover:border-amber-500 hover:shadow-lg transition-all group flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 group-hover:text-amber-600 text-lg transition-colors">
                    Portal Penerimaan Mahasiswa Baru
                </h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Halaman informasi pendaftaran calon mahasiswa baru Program Studi S1 Pariwisata UNIDHA tahun akademik 2026/2027.
                </p>
            </div>
            <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-amber-600">
                <span>SPMB 2026</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </div>
        </a>

        <!-- Yayasan Pendidikan Dharma Andalas -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 flex flex-col justify-between opacity-90">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 text-lg">
                    Yayasan Pendidikan Dharma Andalas
                </h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Badan penyelenggara pendidikan tinggi Universitas Dharma Andalas yang berkomitmen memajukan SDM Sumatera Barat.
                </p>
            </div>
            <div class="pt-6 mt-4 border-t border-slate-100 text-xs text-slate-400">
                <span>Institusi Penyelenggara</span>
            </div>
        </div>

        <!-- Kementerian Pariwisata dan Ekonomi Kreatif -->
        <a href="https://kemenparekraf.go.id" target="_blank" rel="noopener noreferrer" class="bg-white rounded-2xl p-6 border border-slate-200 hover:border-emerald-500 hover:shadow-lg transition-all group flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 group-hover:text-emerald-700 text-lg transition-colors">
                    Kementerian Pariwisata RI
                </h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Regulasi, data kepariwisataan nasional, kalender karisma event nusantara, dan riset pariwisata Indonesia.
                </p>
            </div>
            <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-emerald-700">
                <span>kemenparekraf.go.id</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </div>
        </a>
    </div>
</div>
@endsection
