@extends('layouts.public')

@section('title', 'Beranda')
@section('meta_description', 'Program Studi S1 Pariwisata Universitas Dharma Andalas Padang. Slogan: Creating Memories, Inspiring Journey, And Connecting Cultures, Creating Futures.')

@section('content')
<!-- HERO SLIDER SECTION (Reference: web-sekolah-starter.vercel.app & Authentic Data) -->
<section class="relative min-h-[580px] lg:min-h-[680px] flex items-center text-white overflow-hidden bg-slate-950" 
         x-data="{
            activeSlide: 0,
            slides: {{ $slides->toJson() }},
            timer: null,
            init() {
                this.startAutoSlide();
            },
            startAutoSlide() {
                this.timer = setInterval(() => {
                    this.nextSlide();
                }, 6000);
            },
            stopAutoSlide() {
                if (this.timer) clearInterval(this.timer);
            },
            nextSlide() {
                if (this.slides.length > 0) {
                    this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                }
            },
            prevSlide() {
                if (this.slides.length > 0) {
                    this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
                }
            },
            goToSlide(index) {
                this.activeSlide = index;
            }
         }"
         @mouseenter="stopAutoSlide()" 
         @mouseleave="startAutoSlide()">

    <!-- BACKGROUND SLIDES -->
    <div class="absolute inset-0 z-0 bg-slate-950">
        @foreach($slides as $index => $slide)
            <div class="absolute inset-0 w-full h-full" :class="activeSlide === {{ $index }} ? 'opacity-100 z-1' : 'opacity-0 z-0'" style="transition: opacity 1s ease-in-out;">
                <img src="{{ $slide->image }}" 
                     alt="{{ $slide->title }}" 
                     class="w-full h-full object-cover object-center">
            </div>
        @endforeach

        <!-- Softened Contrast Overlay for Clearer Background Image & Legible Typography -->
        <div class="absolute inset-0 bg-slate-950/45 z-2 pointer-events-none"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/85 via-slate-950/50 to-transparent z-2 pointer-events-none"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-slate-950/20 z-2 pointer-events-none"></div>
    </div>

    <!-- HERO CONTENT CONTAINER -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 w-full">
        <div class="max-w-3xl space-y-6">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-500/20 border border-amber-400/40 text-amber-300 text-xs sm:text-sm font-bold tracking-wider uppercase backdrop-blur-md">
                <span class="w-2 h-2 rounded-full bg-amber-400 animate-ping"></span>
                <span x-text="slides[activeSlide]?.eyebrow || '{{ $landingElements['Hero Headline Tag']->konten ?? 'Let\'s Go to Join With Us' }}'"></span>
            </span>

            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-tight drop-shadow-md" x-text="slides[activeSlide]?.title || 'Selamat Datang di S1 Pariwisata UNIDHA'">
            </h1>

            <p class="text-base sm:text-xl text-slate-200 leading-relaxed font-light drop-shadow-sm max-w-2xl" x-text="slides[activeSlide]?.subtitle || '{{ $landingElements['Slogan Utama Hero']->konten ?? '“Creating Memories, Inspiring Journey, And Connecting Cultures, Creating Futures”' }}'">
            </p>

            <div class="pt-2 flex flex-wrap items-center gap-4">
                <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-bold text-sm text-slate-950 bg-amber-400 hover:bg-amber-300 transition-all shadow-lg shadow-amber-400/20 transform hover:-translate-y-0.5">
                    <span>{{ $landingElements['Deskripsi Pengantar Hero']->cta_text ?? 'Tentang Program Studi' }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                <a href="{{ route('akademik') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-semibold text-sm text-white bg-white/10 hover:bg-white/20 border border-white/25 backdrop-blur-md transition-all">
                    <span>Lihat Kurikulum & Fasilitas</span>
                </a>
            </div>
        </div>
    </div>

    <!-- NAV ARROWS -->
    <button type="button" 
            @click="prevSlide()" 
            aria-label="Sebelumnya"
            class="absolute left-4 sm:left-6 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-slate-950/60 hover:bg-amber-400 hover:text-slate-950 text-white backdrop-blur-md border border-white/20 flex items-center justify-center transition-all z-20 shadow-lg">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button type="button" 
            @click="nextSlide()" 
            aria-label="Berikutnya"
            class="absolute right-4 sm:right-6 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-slate-950/60 hover:bg-amber-400 hover:text-slate-950 text-white backdrop-blur-md border border-white/20 flex items-center justify-center transition-all z-20 shadow-lg">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
    </button>

    <!-- DOTS -->
    <div class="absolute bottom-6 inset-x-0 z-20 flex items-center justify-center gap-2">
        <template x-for="(slide, index) in slides" :key="index">
            <button type="button"
                    @click="goToSlide(index)"
                    :aria-label="'Slide ' + (index + 1)"
                    class="h-2 rounded-full transition-all duration-500"
                    :class="activeSlide === index ? 'w-8 bg-amber-400' : 'w-2 bg-white/40 hover:bg-white/80'">
            </button>
        </template>
    </div>
</section>

<!-- ===================== QUICK LINKS ===================== -->
<section class="relative z-20 -mt-10 lg:-mt-14 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-6">
        <!-- Card 1: Pendaftaran -->
        <a href="{{ route('spmb') }}" class="flex items-center justify-between p-6 rounded-2xl bg-white shadow-xl border border-slate-100 hover:shadow-2xl hover:border-amber-400/50 hover:-translate-y-1 transition-all group">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center text-xl shrink-0 group-hover:bg-amber-500 group-hover:text-slate-950 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </div>
                <div>
                    <h4 class="font-extrabold text-slate-900 group-hover:text-blue-900 text-base">PENDAFTARAN SPMB</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Daftar sebagai Mahasiswa Baru 2026</p>
                </div>
            </div>
            <div class="text-slate-400 group-hover:text-amber-500 group-hover:translate-x-1 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </div>
        </a>

        <!-- Card 2: Kurikulum S.Par -->
        <a href="{{ route('akademik') }}" class="flex items-center justify-between p-6 rounded-2xl bg-white shadow-xl border border-slate-100 hover:shadow-2xl hover:border-blue-400/50 hover:-translate-y-1 transition-all group">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-900 flex items-center justify-center text-xl shrink-0 group-hover:bg-blue-900 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <div>
                    <h4 class="font-extrabold text-slate-900 group-hover:text-blue-900 text-base">Kurikulum 144 SKS</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Hospitality, MICE & Manajemen Destinasi</p>
                </div>
            </div>
            <div class="text-slate-400 group-hover:text-blue-900 group-hover:translate-x-1 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </div>
        </a>

        <!-- Card 3: Kampus & Lokasi -->
        <a href="{{ route('kontak') }}" class="flex items-center justify-between p-6 rounded-2xl bg-white shadow-xl border border-slate-100 hover:shadow-2xl hover:border-emerald-400/50 hover:-translate-y-1 transition-all group">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center text-xl shrink-0 group-hover:bg-emerald-700 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <h4 class="font-extrabold text-slate-900 group-hover:text-blue-900 text-base">Lokasi & Fasilitas</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Kampus Simpang Haru, Kota Padang</p>
                </div>
            </div>
            <div class="text-slate-400 group-hover:text-emerald-700 group-hover:translate-x-1 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </div>
        </a>
    </div>
</section>

<!-- ===================== PROFIL SINGKAT ===================== -->
<section class="py-16 sm:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            <!-- Media with Badge Overlap -->
            <div class="lg:col-span-5 relative">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                    <img src="https://pariwisata.unidha.ac.id/wp-content/uploads/2026/07/Universitas-Dharma-Andalas-1.jpg" 
                         alt="Gedung UNIDHA Padang" 
                         class="w-full h-80 sm:h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
                </div>
                <!-- Badge Stats Floating -->
                <div class="absolute -bottom-6 -right-2 sm:-right-6 bg-blue-900 text-white p-5 rounded-2xl shadow-xl border-4 border-white flex items-center gap-4">
                    <span class="text-3xl font-extrabold text-amber-400 leading-none">S1</span>
                    <div class="text-xs leading-snug">
                        <strong class="block font-bold">Sarjana Pariwisata</strong>
                        <span class="text-slate-300">FEB UNIDHA Padang</span>
                    </div>
                </div>
            </div>

            <!-- Content Column -->
            <div class="lg:col-span-7 space-y-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-amber-600 block mb-1">Sekilas Program Studi</span>
                    <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 leading-tight">
                        Mendidik Insan Pariwisata Berdaya Saing Global di Ranah Minang
                    </h2>
                </div>
                <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                    {{ $landingElements['Pengenalan UNIDHA']->konten ?? 'Program Studi S1 Pariwisata berada di bawah Fakultas Ekonomi dan Bisnis Universitas Dharma Andalas (UNIDHA), didirikan untuk merespons percepatan perkembangan pariwisata nasional dan internasional, khususnya mengangkat potensi kekayaan wisata alam dan kebudayaan Minangkabau.' }}
                </p>

                <!-- Points Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 space-y-1">
                        <div class="w-8 h-8 rounded-lg bg-amber-500/10 text-amber-600 flex items-center justify-center font-bold text-sm mb-2">
                            01
                        </div>
                        <h4 class="font-bold text-slate-900 text-sm">Kurikulum Berbasis Industri</h4>
                        <p class="text-xs text-slate-500">Mencakup perhotelan, MICE, sustainable tourism, dan bisnis digital travel.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 space-y-1">
                        <div class="w-8 h-8 rounded-lg bg-blue-500/10 text-blue-900 flex items-center justify-center font-bold text-sm mb-2">
                            02
                        </div>
                        <h4 class="font-bold text-slate-900 text-sm">Lokasi Kampus Strategis</h4>
                        <p class="text-xs text-slate-500">Terletak di Jl. Sawahan No. 103 Padang dengan akses sarana transportasi mudah.</p>
                    </div>
                </div>

                <div class="pt-2 flex items-center gap-4">
                    <a href="{{ route('profil') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-wider text-white bg-blue-900 hover:bg-blue-800 transition-colors shadow-md">
                        <span>Baca Profil Selengkapnya</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== COUNTER STATS ===================== -->
<section class="py-16 sm:py-20 bg-gradient-to-r from-blue-950 via-slate-900 to-blue-950 text-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            <div class="p-6 rounded-2xl bg-white/5 backdrop-blur-md border border-white/10">
                <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-amber-400/20 text-amber-400 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1">1992</div>
                <div class="text-xs text-slate-300">Tahun Berdiri Yayasan</div>
            </div>

            <div class="p-6 rounded-2xl bg-white/5 backdrop-blur-md border border-white/10">
                <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-sky-400/20 text-sky-400 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1">14+</div>
                <div class="text-xs text-slate-300">Program Studi di UNIDHA</div>
            </div>

            <div class="p-6 rounded-2xl bg-white/5 backdrop-blur-md border border-white/10">
                <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-emerald-400/20 text-emerald-400 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1">144</div>
                <div class="text-xs text-slate-300">Total SKS Jenjang S1</div>
            </div>

            <div class="p-6 rounded-2xl bg-white/5 backdrop-blur-md border border-white/10">
                <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-purple-400/20 text-purple-400 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                </div>
                <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1">31+</div>
                <div class="text-xs text-slate-300">Kali Pelaksanaan Wisuda</div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== PROSPEK KARIER ===================== -->
<section class="py-16 sm:py-24 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 space-y-2">
            <span class="text-xs font-bold uppercase tracking-widest text-amber-600 block">Karier & Masa Depan</span>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900">PROSPEK KARIER LULUSAN</h2>
            <p class="text-slate-600 text-sm">3 Pilar utama peluang kerja lulusan S1 Pariwisata UNIDHA di kancah nasional dan internasional.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Pilar 1 -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl border border-slate-200 transition-all flex flex-col group hover:-translate-y-1">
                <div class="relative h-52 overflow-hidden bg-slate-900">
                    <img src="https://pariwisata.unidha.ac.id/wp-content/uploads/2026/07/Hotel-MICE-Modern-di-Pusat-Ubud-SenS-Hotel-Spa-Hadirkan-Ballroom-dan-Fasilitas-Konferensi-Lengkap-1-e1747237185343.jpg" 
                         alt="Perhotelan & MICE" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-rose-500 text-white shadow-md">
                        Management
                    </span>
                </div>
                <div class="p-6 flex flex-col flex-grow space-y-3">
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-900 transition-colors">
                        Sektor Perhotelan, Akomodasi & MICE
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        {{ $landingElements['Pilar 01: Perhotelan & MICE']->konten ?? 'Sektor utama penyerap sarjana pariwisata. Memiliki jalur cepat manajerial di perhotelan, event organizer, convention & wedding planner berskala internasional.' }}
                    </p>
                    <div class="pt-4 mt-auto border-t border-slate-100 flex items-center justify-between text-xs">
                        <span class="text-slate-500 font-semibold flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            Konsentrasi Pilihan
                        </span>
                        <a href="{{ route('akademik') }}" class="font-bold text-amber-600 hover:text-amber-700 uppercase tracking-wider flex items-center gap-1">
                            <span>Pelajari</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pilar 2 -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl border border-slate-200 transition-all flex flex-col group hover:-translate-y-1">
                <div class="relative h-52 overflow-hidden bg-slate-900">
                    <img src="https://pariwisata.unidha.ac.id/wp-content/uploads/2026/07/gambar-tour-guide-10.jpg" 
                         alt="Tour & Travel" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-sky-600 text-white shadow-md">
                        Business
                    </span>
                </div>
                <div class="p-6 flex flex-col flex-grow space-y-3">
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-900 transition-colors">
                        Industri Perjalanan & Destinasi (Tour & Travel)
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        {{ $landingElements['Pilar 02: Tour & Destinasi']->konten ?? 'Merancang trip itinerary, mengembangkan desa wisata, pengelola destinasi berkelanjutan, hingga menjadi Tour Guide bersertifikat kompetensi nasional.' }}
                    </p>
                    <div class="pt-4 mt-auto border-t border-slate-100 flex items-center justify-between text-xs">
                        <span class="text-slate-500 font-semibold flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            Konsentrasi Pilihan
                        </span>
                        <a href="{{ route('akademik') }}" class="font-bold text-amber-600 hover:text-amber-700 uppercase tracking-wider flex items-center gap-1">
                            <span>Pelajari</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pilar 3 -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl border border-slate-200 transition-all flex flex-col group hover:-translate-y-1">
                <div class="relative h-52 overflow-hidden bg-slate-900">
                    <img src="https://pariwisata.unidha.ac.id/wp-content/uploads/2026/07/QzxyPf2tOCFlYzYknAmqPYhGnx00ti4HEadIQdJa-scaled.jpg" 
                         alt="Instansi Pemerintah" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-amber-500 text-slate-950 shadow-md">
                        Government
                    </span>
                </div>
                <div class="p-6 flex flex-col flex-grow space-y-3">
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-900 transition-colors">
                        Instansi Pemerintah & Akademisi
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        {{ $landingElements['Pilar 03: Pemerintah & Akademisi']->konten ?? 'Peluang besar di Kementerian Pariwisata dan Ekonomi Kreatif (Kemenparekraf), Dinas Pariwisata Daerah, penyusun regulasi promosi destinasi, dan akademisi.' }}
                    </p>
                    <div class="pt-4 mt-auto border-t border-slate-100 flex items-center justify-between text-xs">
                        <span class="text-slate-500 font-semibold flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            Peluang Karier Luas
                        </span>
                        <a href="{{ route('akademik') }}" class="font-bold text-amber-600 hover:text-amber-700 uppercase tracking-wider flex items-center gap-1">
                            <span>Pelajari</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== BERITA TERBARU ===================== -->
<section class="py-16 sm:py-24 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-amber-600 block mb-1">Informasi Terkini</span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900">
                    Berita & Warta Terbaru
                </h2>
                <p class="text-slate-600 text-sm mt-1">Kabar resmi kegiatan akademik, himpunan mahasiswa, dan prestasi Program Studi S1 Pariwisata UNIDHA.</p>
            </div>
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-blue-900 hover:text-amber-600 transition-colors">
                <span>Lihat Semua Berita</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($latestNews as $item)
                <article class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 hover:shadow-xl transition-all duration-300 flex flex-col group hover:-translate-y-1">
                    <div class="relative h-52 overflow-hidden bg-slate-100">
                        <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 bg-slate-950/80 backdrop-blur-md text-amber-400 text-xs px-3 py-1 rounded-full font-bold shadow-md">
                            {{ $item->category }}
                        </span>
                    </div>
                    <div class="p-6 flex flex-col flex-grow space-y-3">
                        <div class="flex items-center gap-3 text-xs text-slate-400">
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ $item->date_text ?? $item->created_at->translatedFormat('d F Y') }}
                            </span>
                            <span>&bull;</span>
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                {{ $item->author }}
                            </span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-blue-900 transition-colors line-clamp-2 leading-snug">
                            <a href="{{ route('berita.show', $item->slug) }}">
                                {{ $item->title }}
                            </a>
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 line-clamp-3 leading-relaxed">
                            {{ $item->summary }}
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-100">
                            <a href="{{ route('berita.show', $item->slug) }}" class="text-xs font-bold text-blue-900 group-hover:text-amber-600 flex items-center gap-1.5 transition-colors">
                                <span>Baca Selengkapnya</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-12 text-slate-500 text-sm">
                    Belum ada berita yang diterbitkan saat ini.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ===================== CTA SPMB 2026 ===================== -->
<section class="py-16 sm:py-20 bg-slate-950 text-white relative overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl p-8 sm:p-14 bg-gradient-to-r from-blue-950 via-slate-900 to-amber-950/40 border border-slate-800 shadow-2xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8 space-y-4">
                    <span class="inline-block px-3 py-1 rounded-full bg-amber-400 text-slate-950 text-xs font-bold uppercase tracking-wider">
                        Penerimaan Mahasiswa Baru (SPMB 2026)
                    </span>
                    <h2 class="text-2xl sm:text-4xl font-extrabold text-white leading-tight">
                        {{ $landingElements['Banner Penerimaan SPMB 2026']->parameter ?? 'Wujudkan Cita-cita Karier Pariwisata Anda Bersama UNIDHA' }}
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed max-w-2xl">
                        {{ $landingElements['Banner Penerimaan SPMB 2026']->konten ?? 'Bergabunglah dengan Prodi Pariwisata dan temukan bagaimana cara menghubungkan budaya, menciptakan kenangan tak terlupakan, dan membangun karier tanpa batas di kancah internasional.' }}
                    </p>
                    <div class="flex flex-wrap gap-4 pt-2 text-xs text-amber-300 font-semibold">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            Jalur Bebas Tes & Prestasi
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            Tersedia Program Beasiswa
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            Magang Hotel Bintang 5
                        </span>
                    </div>
                </div>

                <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3 justify-center">
                    <a href="{{ route('spmb') }}" class="inline-flex items-center justify-center gap-2 px-6 py-4 rounded-xl font-extrabold text-sm text-slate-950 bg-amber-400 hover:bg-amber-300 transition-all shadow-xl shadow-amber-400/20 transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        <span>{{ $landingElements['Banner Penerimaan SPMB 2026']->cta_text ?? 'Daftar SPMB 2026 Online' }}</span>
                    </a>
                    <a href="{{ route('kontak') }}" class="inline-flex items-center justify-center gap-2 px-6 py-4 rounded-xl font-bold text-sm text-white bg-white/10 hover:bg-white/20 border border-white/20 transition-all">
                        <span>Konsultasi Panitia Penerimaan</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
