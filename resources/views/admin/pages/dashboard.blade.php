@extends('admin.layouts.app')

@section('title', 'Ringkasan Dashboard')

@section('admin_content')
<div class="space-y-8 max-w-7xl mx-auto">
    <!-- Welcome Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Dashboard Pengelola Website</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Selamat datang di panel pengelolaan konten Program Studi S1 Pariwisata Universitas Dharma Andalas.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.berita') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white font-bold text-xs shadow-md transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>Kelola Berita & Publikasi</span>
            </a>
        </div>
    </div>

    <!-- Stat Cards Metric -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs space-y-3">
            <div class="flex items-center justify-between text-slate-500">
                <span class="text-xs font-bold uppercase tracking-wider">Total Publikasi</span>
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-900 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-slate-900">{{ $totalNews }}</span>
                <span class="text-xs text-emerald-600 font-semibold">Artikel Berita</span>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs space-y-3">
            <div class="flex items-center justify-between text-slate-500">
                <span class="text-xs font-bold uppercase tracking-wider">Mata Kuliah Aktif</span>
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-slate-900">{{ $totalCurricula }}</span>
                <span class="text-xs text-amber-600 font-semibold">MK Terdaftar</span>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs space-y-3">
            <div class="flex items-center justify-between text-slate-500">
                <span class="text-xs font-bold uppercase tracking-wider">Hero Slides</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-emerald-700">{{ $totalSlides }}</span>
                <span class="text-xs text-slate-500">Slide Aktif</span>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs space-y-3">
            <div class="flex items-center justify-between text-slate-500">
                <span class="text-xs font-bold uppercase tracking-wider">Status SPMB</span>
                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-extrabold text-purple-800">Aktif</span>
                <span class="text-xs text-slate-500">T.A 2026/2027</span>
            </div>
        </div>
    </div>

    <!-- Berita Terkini Table & Quick Info Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Tabel Berita Terbaru -->
        <div class="lg:col-span-8 bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-bold text-slate-900">Publikasi Terakhir</h2>
                    <p class="text-xs text-slate-500">Daftar artikel yang saat ini tayang di website publik.</p>
                </div>
                <a href="{{ route('admin.berita') }}" class="text-xs font-bold text-blue-900 hover:text-amber-600">Kelola Semua &rarr;</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-3.5">Judul Warta</th>
                            <th class="px-6 py-3.5">Kategori</th>
                            <th class="px-6 py-3.5">Tanggal</th>
                            <th class="px-6 py-3.5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        @forelse($recentNews as $item)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-slate-900 line-clamp-1 max-w-xs">{{ $item->title }}</div>
                                    <span class="text-[11px] text-slate-400">Slug: {{ $item->slug }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-blue-50 text-blue-900">
                                        {{ $item->category }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-500 whitespace-nowrap">
                                    {{ $item->date_text ?? $item->created_at->translatedFormat('d M Y') }}
                                </td>
                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <a href="{{ route('berita.show', $item->slug) }}" target="_blank" class="text-blue-900 hover:underline font-bold mr-3">Pratinjau</a>
                                    <a href="{{ route('admin.berita') }}" class="text-amber-600 hover:underline font-semibold">Sunting</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-slate-400">Belum ada publikasi berita.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Info & Link Cepat -->
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs space-y-4">
                <h3 class="text-sm font-bold text-slate-900">Pintasan Halaman Publik</h3>
                <ul class="text-xs space-y-3">
                    <li class="flex items-center justify-between pb-2 border-b border-slate-100">
                        <span class="text-slate-600">Beranda (Hero, Visi, Karier)</span>
                        <a href="{{ route('home') }}" target="_blank" class="text-blue-900 hover:underline font-bold">Buka &rarr;</a>
                    </li>
                    <li class="flex items-center justify-between pb-2 border-b border-slate-100">
                        <span class="text-slate-600">Profil & Visi Misi</span>
                        <a href="{{ route('profil') }}" target="_blank" class="text-blue-900 hover:underline font-bold">Buka &rarr;</a>
                    </li>
                    <li class="flex items-center justify-between pb-2 border-b border-slate-100">
                        <span class="text-slate-600">Akademik & Kurikulum</span>
                        <a href="{{ route('akademik') }}" target="_blank" class="text-blue-900 hover:underline font-bold">Buka &rarr;</a>
                    </li>
                    <li class="flex items-center justify-between pb-2 border-b border-slate-100">
                        <span class="text-slate-600">Kemahasiswaan (HIMPAR)</span>
                        <a href="{{ route('kemahasiswaan') }}" target="_blank" class="text-blue-900 hover:underline font-bold">Buka &rarr;</a>
                    </li>
                    <li class="flex items-center justify-between">
                        <span class="text-slate-600">Penerimaan Mahasiswa Baru</span>
                        <a href="{{ route('spmb') }}" target="_blank" class="text-amber-600 hover:underline font-bold">SPMB 2026 &rarr;</a>
                    </li>
                </ul>
            </div>

            <!-- Panel Pengaturan Cepat -->
            <div class="bg-gradient-to-br from-blue-900 to-slate-900 text-white rounded-2xl p-6 shadow-md space-y-3">
                <div class="flex items-center gap-2 text-amber-400 font-bold text-xs uppercase">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Pengelolaan Terpusat</span>
                </div>
                <p class="text-xs text-slate-300 leading-relaxed">
                    Setiap perubahan pada hero slide, kurikulum, profil, artikel berita, dan pengaturan kontak langsung termutakhirkan secara langsung di seluruh halaman website publik.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
