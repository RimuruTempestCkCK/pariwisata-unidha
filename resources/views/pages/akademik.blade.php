@extends('layouts.public')

@section('title', 'Akademik & Kurikulum')
@section('meta_description', 'Informasi akademik, kurikulum, sistem perkuliahan, dan praktik pembelajaran Program Studi S1 Pariwisata UNIDHA.')

@section('content')
<!-- Page Banner -->
<section class="bg-gradient-to-r from-slate-950 via-blue-950 to-slate-900 text-white py-16 sm:py-20 border-b border-slate-800 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <span class="inline-block px-3 py-1 rounded-full bg-amber-500/20 text-amber-400 text-xs font-bold uppercase tracking-wider mb-3">
            Pendidikan & Pembelajaran
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mb-4">
            Akademik & Kurikulum
        </h1>
        <p class="text-slate-300 max-w-2xl text-base sm:text-lg">
            Kurikulum adaptif yang memadukan teori manajemen kepariwisataan modern, keterampilan operasional hospitality, dan studi lapangan berbasis kearifan lokal.
        </p>
    </div>
</section>

<!-- Breadcrumb -->
@include('components.breadcrumb', ['items' => ['Akademik' => null]])

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 space-y-16">
    <!-- Pengantar Akademik -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-6 space-y-5">
            <span class="text-xs font-bold text-amber-600 tracking-wider uppercase block">Pendekatan Belajar</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight">
                Pendidikan Sarjana yang Menghubungkan Teori dengan Praktik Nyata
            </h2>
            <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                Sistem perkuliahan di Program Studi S1 Pariwisata dirancang dengan pola pembelajaran berbasis studi kasus, simulasi operasional, lokakarya, dan magang industri bersertifikasi.
            </p>
            <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                Mahasiswa tidak hanya mempelajari konsep dasar kepariwisataan, namun juga dilatih merancang itinerary tour, mengorganisasi agenda MICE berskala besar, menyusun studi kelayakan destinasi, dan mengoperasikan strategi digital marketing pariwisata.
            </p>
        </div>

        <div class="lg:col-span-6">
            <div class="grid grid-cols-2 gap-4">
                <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-2">
                    <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-900 flex items-center justify-center font-bold">
                        1
                    </div>
                    <h4 class="font-bold text-slate-900 text-sm">Gelar Akademik</h4>
                    <p class="text-xs text-slate-500">Sarjana Pariwisata (S.Par.) dengan pengakuan kompetensi nasional.</p>
                </div>
                <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-2">
                    <div class="w-10 h-10 rounded-lg bg-amber-100 text-amber-800 flex items-center justify-center font-bold">
                        8
                    </div>
                    <h4 class="font-bold text-slate-900 text-sm">Masa Studi Normal</h4>
                    <p class="text-xs text-slate-500">8 Semester (4 Tahun) dengan beban studi {{ $curricula->sum('sks') ?: 144 }} SKS.</p>
                </div>
                <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-2">
                    <div class="w-10 h-10 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <h4 class="font-bold text-slate-900 text-sm">Magang Industri</h4>
                    <p class="text-xs text-slate-500">Program internship di hotel berbintang, biro perjalanan, dan dinas pariwisata.</p>
                </div>
                <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-2">
                    <div class="w-10 h-10 rounded-lg bg-purple-100 text-purple-800 flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h4 class="font-bold text-slate-900 text-sm">Riset Lapangan</h4>
                    <p class="text-xs text-slate-500">Studi ke destinasi wisata budaya Minangkabau dan bahari.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Struktur Kurikulum & Mata Kuliah Database -->
    <section class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm space-y-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <span class="text-xs font-bold text-blue-900 tracking-wider uppercase block">Kerangka Kurikulum</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Daftar Mata Kuliah Unggulan</h2>
                <p class="text-slate-600 text-xs sm:text-sm mt-1">
                    Struktur kurikulum yang dipelajari selama perkuliahan di S1 Pariwisata UNIDHA:
                </p>
            </div>
            <span class="px-3.5 py-1.5 rounded-xl bg-blue-50 text-blue-900 font-bold text-xs whitespace-nowrap self-start md:self-auto">
                Total: {{ count($curricula) }} Mata Kuliah
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold border-b border-slate-200">
                    <tr>
                        <th class="px-5 py-3.5 w-24">Kode</th>
                        <th class="px-5 py-3.5">Nama Mata Kuliah & Uraian</th>
                        <th class="px-5 py-3.5 w-36">Konsentrasi</th>
                        <th class="px-5 py-3.5 w-24 text-center">Beban SKS</th>
                        <th class="px-5 py-3.5 w-28 text-center">Semester</th>
                        <th class="px-5 py-3.5 w-24 text-center">Sifat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse($curricula as $matkul)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-5 py-4 font-mono font-bold text-blue-900">{{ $matkul->kode }}</td>
                            <td class="px-5 py-4">
                                <span class="font-bold text-slate-900 text-sm block">{{ $matkul->nama }}</span>
                                <span class="text-[11px] text-slate-400">{{ $matkul->deskripsi }}</span>
                            </td>
                            <td class="px-5 py-4">
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-amber-50 text-amber-800">
                                    {{ $matkul->konsentrasi }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-center font-bold text-slate-900">{{ $matkul->sks }} SKS</td>
                            <td class="px-5 py-4 text-center font-semibold text-slate-600">Semester {{ $matkul->semester }}</td>
                            <td class="px-5 py-4 text-center">
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $matkul->sifat === 'Wajib' ? 'bg-blue-100 text-blue-800' : 'bg-emerald-100 text-emerald-800' }}">
                                    {{ $matkul->sifat }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-8 text-center text-slate-400">Daftar mata kuliah sedang dimutakhirkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 rounded-xl bg-blue-50/70 border border-blue-200 text-xs text-slate-600 flex items-start gap-3">
            <svg class="w-5 h-5 text-blue-700 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <div>
                <strong class="text-slate-900">Catatan Dokumen Akademik:</strong> Distribusi mata kuliah rinci per semester, silabus resmi, dan pedoman tugas akhir dapat diakses oleh mahasiswa aktif melalui sistem informasi akademik kampus atau sekretariat program studi.
            </div>
        </div>
    </section>

    <!-- Fasilitas Pendukung Pembelajaran -->
    <section class="space-y-6">
        <div class="text-center max-w-2xl mx-auto space-y-2">
            <span class="text-xs font-bold text-amber-600 tracking-wider uppercase block">Sarana & Prasarana</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Fasilitas Pendukung Perkuliahan</h2>
            <p class="text-slate-600 text-xs sm:text-sm">
                UNIDHA menyediakan fasilitas yang menunjang aktivitas belajar mengajar secara optimal di kampus Sawahan Padang.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-6 border border-slate-200 text-center space-y-2 shadow-xs">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-900 mx-auto flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h4 class="font-bold text-slate-900 text-sm">Laboratorium Komputer</h4>
                <p class="text-xs text-slate-500">Mendukung mata kuliah sistem reservasi, perancangan grafis, dan pemasaran digital.</p>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-slate-200 text-center space-y-2 shadow-xs">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-700 mx-auto flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <h4 class="font-bold text-slate-900 text-sm">Perpustakaan & E-Resource</h4>
                <p class="text-xs text-slate-500">Koleksi referensi buku, jurnal pariwisata terindeks, dan ruang baca nyaman.</p>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-slate-200 text-center space-y-2 shadow-xs">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-700 mx-auto flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <h4 class="font-bold text-slate-900 text-sm">Ruang Seminar & Aula</h4>
                <p class="text-xs text-slate-500">Wadah kuliah umum praktisi, pelatihan MICE, workshop, dan pameran karya.</p>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-slate-200 text-center space-y-2 shadow-xs">
                <div class="w-12 h-12 rounded-xl bg-sky-50 text-sky-700 mx-auto flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/></svg>
                </div>
                <h4 class="font-bold text-slate-900 text-sm">Akses Kampus & Wi-Fi</h4>
                <p class="text-xs text-slate-500">Konektivitas internet berkecepatan tinggi di seluruh area kampus UNIDHA.</p>
            </div>
        </div>
    </section>
</div>
@endsection
