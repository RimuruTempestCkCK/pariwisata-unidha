@extends('layouts.public')

@section('title', 'Kemahasiswaan & HIMPAR')
@section('meta_description', 'Kehidupan kemahasiswaan dan Himpunan Mahasiswa Pariwisata Dharma Andalas (HIMPAR) Universitas Dharma Andalas Padang.')

@section('content')
<!-- Page Banner -->
<section class="bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 text-white py-16 sm:py-24 border-b border-slate-800 relative overflow-hidden">
    <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -left-20 -top-20 w-80 h-80 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center sm:text-left">
        <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-500/20 border border-amber-400/30 text-amber-300 text-xs font-bold uppercase tracking-wider mb-4">
            <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
            Aktivitas Mahasiswa & Komunitas
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mb-4 leading-tight">
            Kemahasiswaan & HIMPAR UNIDHA
        </h1>
        <p class="text-slate-300 max-w-2xl text-base sm:text-lg leading-relaxed">
            Wadah kreasi, kepemimpinan, persaudaraan, dan aksi nyata mahasiswa pariwisata di kampus serta masyarakat.
        </p>
    </div>
</section>

<!-- Breadcrumb -->
@include('components.breadcrumb', ['items' => ['Kemahasiswaan' => null]])

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-20 space-y-20">
    <!-- Pengenalan HIMPAR -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
        <div class="lg:col-span-7 space-y-6">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-lg bg-amber-50 border border-amber-200/80 text-amber-900 text-xs font-bold uppercase tracking-wider shadow-2xs">
                <svg class="w-3.5 h-3.5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <span>Himpunan Mahasiswa Resmi</span>
            </div>
            
            <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 leading-snug">
                {{ \App\Models\Setting::get('himpar_name', 'Himpunan Mahasiswa Pariwisata Dharma Andalas (HIMPAR)') }}
            </h2>
            
            <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                {{ \App\Models\Setting::get('himpar_desc', 'HIMPAR UNIDHA merupakan wadah resmi pengembangan potensi, kreativitas, kepemimpinan, dan solidaritas mahasiswa Program Studi S1 Pariwisata Universitas Dharma Andalas. Organisasi ini aktif merancang berbagai agenda positif, mulai dari studi banding destinasi wisata, pengabdian masyarakat, workshop peningkatan skill hospitality, seminar kepariwisataan, hingga perayaan hari pariwisata dunia (World Tourism Day).') }}
            </p>

            @php
                $socialHimpar = \App\Models\Setting::get('social_himpar', '@himpar.unidha');
                $himparClean = ltrim($socialHimpar, '@');
            @endphp
            <div class="pt-2 flex flex-wrap items-center gap-4">
                <a href="https://instagram.com/{{ $himparClean }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2.5 px-6 py-3 rounded-xl bg-gradient-to-r from-pink-600 via-rose-600 to-amber-600 hover:from-pink-700 hover:to-rose-700 text-white font-bold text-sm shadow-md shadow-pink-600/20 hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    <span>Ikuti Instagram {{ $socialHimpar }}</span>
                </a>
                <a href="{{ route('kontak') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl border border-slate-300 bg-white hover:bg-slate-50 text-slate-700 font-semibold text-sm shadow-xs transition-colors">
                    <span>Hubungi Sekretariat</span>
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <div class="lg:col-span-5">
            <div class="relative p-8 rounded-3xl bg-gradient-to-br from-slate-900 via-blue-950 to-slate-950 text-white shadow-xl border border-slate-800 space-y-6 overflow-hidden">
                <div class="absolute -right-8 -top-8 w-32 h-32 bg-amber-500/10 rounded-full blur-2xl"></div>
                
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-amber-500/20 border border-amber-400/30 text-amber-400 flex items-center justify-center font-bold shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div>
                        <span class="text-[11px] font-bold text-amber-400 uppercase tracking-widest block">Core Values</span>
                        <h3 class="text-xl font-bold text-white">Motto Kemahasiswaan</h3>
                    </div>
                </div>

                <div class="p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                    <p class="text-sm text-slate-200 leading-relaxed italic font-serif">
                        “{{ \App\Models\Setting::get('himpar_motto', 'Solidaritas, Kreativitas, Integritas, dan Dedikasi untuk Kemajuan Kepariwisataan Ranah Minang.') }}”
                    </p>
                </div>

                <div class="space-y-3 pt-2 border-t border-slate-800 text-xs text-slate-300">
                    <div class="flex items-center gap-3">
                        <div class="w-2.5 h-2.5 rounded-full bg-emerald-400 shadow-xs shadow-emerald-400/50"></div>
                        <span>Jejaring Forum Mahasiswa Pariwisata Nasional</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2.5 h-2.5 rounded-full bg-amber-400 shadow-xs shadow-amber-400/50"></div>
                        <span>Kolaborasi Aktif Antar Unit Kegiatan Mahasiswa UNIDHA</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2.5 h-2.5 rounded-full bg-blue-400 shadow-xs shadow-blue-400/50"></div>
                        <span>Keterlibatan dalam Program MBKM & Magang Nasional</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Kerja & Kegiatan Mahasiswa -->
    <section class="space-y-10">
        <div class="text-center max-w-2xl mx-auto space-y-3">
            <span class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-600 bg-amber-50 px-3 py-1 rounded-full border border-amber-200 uppercase tracking-wider">
                Aksi & Partisipasi Nyata
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                Ruang Aktivitas & Eksplorasi Mahasiswa
            </h2>
            <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                Rangkaian kegiatan terencana yang membangun karakter, kepekaan sosial, daya juang, dan kecakapan profesional insan pariwisata masa depan.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
            <div class="bg-white rounded-3xl p-7 border border-slate-200/90 shadow-sm hover:shadow-md hover:border-amber-400/60 transition-all duration-300 group flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold group-hover:scale-110 group-hover:bg-amber-500 group-hover:text-white transition-all shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h4 class="font-bold text-slate-900 text-lg group-hover:text-amber-800 transition-colors">
                        {{ \App\Models\Setting::get('kemahasiswaan_pilar1_title', 'Studi Lapangan & Destinasi') }}
                    </h4>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        {{ \App\Models\Setting::get('kemahasiswaan_pilar1_desc', 'Eksplorasi destinasi unggulan di Sumatera Barat, observasi kelompok sadar wisata (pokdarwis), dan analisis potensi amenitas pariwisata lokal.') }}
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-xs font-semibold text-amber-600">
                    <span>Eksplorasi Lapangan</span>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-7 border border-slate-200/90 shadow-sm hover:shadow-md hover:border-blue-400/60 transition-all duration-300 group flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center font-bold group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z"/></svg>
                    </div>
                    <h4 class="font-bold text-slate-900 text-lg group-hover:text-blue-900 transition-colors">
                        {{ \App\Models\Setting::get('kemahasiswaan_pilar2_title', 'Simulasi MICE & Event Kampus') }}
                    </h4>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        {{ \App\Models\Setting::get('kemahasiswaan_pilar2_desc', 'Praktik langsung bertindak sebagai organizing committee pada acara seminar, expo kampus, festival budaya Minangkabau, dan pertemuan ilmiah.') }}
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-xs font-semibold text-blue-700">
                    <span>Event Management</span>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-7 border border-slate-200/90 shadow-sm hover:shadow-md hover:border-emerald-400/60 transition-all duration-300 group flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all shadow-inner">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                    </div>
                    <h4 class="font-bold text-slate-900 text-lg group-hover:text-emerald-800 transition-colors">
                        {{ \App\Models\Setting::get('kemahasiswaan_pilar3_title', 'Pengabdian Masyarakat Wisata') }}
                    </h4>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        {{ \App\Models\Setting::get('kemahasiswaan_pilar3_desc', 'Pendampingan masyarakat desa wisata dalam hospitality dasar, kebersihan destinasi (Sapta Pesona), dan promosi digital melalui media sosial.') }}
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-xs font-semibold text-emerald-700">
                    <span>Dampak Komunitas</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri Dokumentasi Mahasiswa -->
    <section class="space-y-8 bg-slate-50/70 p-6 sm:p-10 rounded-3xl border border-slate-200/70">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 border-b border-slate-200/80 pb-6">
            <div>
                <span class="text-xs font-bold text-amber-600 tracking-wider uppercase block">Dokumentasi</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Galeri Kegiatan Mahasiswa</h2>
                <p class="text-slate-600 text-xs sm:text-sm mt-1">Potret interaksi, kebersamaan, dan pembelajaran aktif mahasiswa S1 Pariwisata UNIDHA.</p>
            </div>
            <a href="https://instagram.com/{{ $himparClean }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-slate-200 text-xs font-bold text-pink-600 hover:text-pink-700 hover:border-pink-300 shadow-2xs transition-all">
                <span>Lihat di Instagram</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
            <div class="group relative rounded-2xl overflow-hidden aspect-4/3 bg-slate-200 shadow-xs border border-slate-200/80">
                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=700&q=80" alt="Diskusi Mahasiswa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity p-4 flex items-end">
                    <p class="text-xs font-semibold text-white">Kolaborasi & Diskusi Proyek</p>
                </div>
            </div>

            <div class="group relative rounded-2xl overflow-hidden aspect-4/3 bg-slate-200 shadow-xs border border-slate-200/80">
                <img src="https://images.unsplash.com/photo-1528127269322-539801943592?auto=format&fit=crop&w=700&q=80" alt="Praktik Lapangan Destinasi" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity p-4 flex items-end">
                    <p class="text-xs font-semibold text-white">Observasi Destinasi Budaya</p>
                </div>
            </div>

            <div class="group relative rounded-2xl overflow-hidden aspect-4/3 bg-slate-200 shadow-xs border border-slate-200/80">
                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=700&q=80" alt="Kuliah Umum & Seminar" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity p-4 flex items-end">
                    <p class="text-xs font-semibold text-white">Kuliah Umum Praktisi</p>
                </div>
            </div>

            <div class="group relative rounded-2xl overflow-hidden aspect-4/3 bg-slate-200 shadow-xs border border-slate-200/80">
                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=700&q=80" alt="Acara Kampus UNIDHA" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity p-4 flex items-end">
                    <p class="text-xs font-semibold text-white">Kebersamaan Mahasiswa</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
