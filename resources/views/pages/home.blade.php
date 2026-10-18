@extends('layouts.public')

@section('title', 'Beranda - Let\'s Go to Join With Us')
@section('meta_description', 'Program Studi S1 Pariwisata Universitas Dharma Andalas Padang. Slogan: Creating Memories, Inspiring Journey, And Connecting Cultures, Creating Futures.')

@section('content')
<!-- HERO SECTION -->
<section class="relative bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 text-white overflow-hidden py-20 lg:py-32">
    <!-- Background Texture & Glow -->
    <div class="absolute inset-0 opacity-20 pointer-events-none bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:24px_24px]"></div>
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-amber-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            <!-- Left Headline & Copy -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-500/10 border border-amber-500/30 text-amber-300 text-xs sm:text-sm font-semibold tracking-wide">
                    <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                    <span>Let's Go to Join With Us</span>
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight">
                    Program Studi S1 Pariwisata <br class="hidden sm:inline">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-amber-200 to-sky-300">
                        Universitas Dharma Andalas
                    </span>
                </h1>

                <p class="font-serif-heading text-lg sm:text-xl lg:text-2xl text-amber-200/90 italic font-medium">
                    “Creating Memories, Inspiring Journey, And Connecting Cultures, Creating Futures”
                </p>

                <p class="text-sm sm:text-base text-slate-300 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Mempersiapkan sarjana pariwisata yang visioner, kompeten, dan siap memimpin industri pariwisata nasional maupun internasional melalui kurikulum terapan, praktik langsung, dan jejaring industri hospitality.
                </p>

                <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="{{ route('spmb') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-xl font-extrabold text-base text-slate-950 bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-300 hover:to-amber-400 shadow-lg shadow-amber-500/30 hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                        <span>JOIN US SEKARANG</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="{{ route('profil') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-xl font-bold text-base text-white bg-slate-800/80 hover:bg-slate-700/80 border border-slate-700 transition-all">
                        <span>Kenali Program Studi</span>
                    </a>
                </div>

                <!-- Stats summary / highlight strip -->
                <div class="pt-6 border-t border-slate-800/80 grid grid-cols-3 gap-4 text-center lg:text-left">
                    <div>
                        <div class="text-xl sm:text-2xl font-extrabold text-white">S1 (Sarjana)</div>
                        <div class="text-xs text-slate-400 mt-0.5">Jenjang Pendidikan</div>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-extrabold text-amber-400">Padang</div>
                        <div class="text-xs text-slate-400 mt-0.5">Sumatera Barat</div>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-extrabold text-sky-400">SPMB 2026</div>
                        <div class="text-xs text-slate-400 mt-0.5">Pendaftaran Dibuka</div>
                    </div>
                </div>
            </div>

            <!-- Right Visual Card -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-slate-700/60 bg-slate-800/40">
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80" 
                             alt="Destinasi & Pariwisata Indonesia" 
                             class="w-full h-80 sm:h-96 object-cover transform hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
                        <div class="absolute bottom-0 inset-x-0 p-6 text-white space-y-1.5">
                            <span class="inline-block px-2.5 py-0.5 rounded text-[11px] font-bold uppercase tracking-wider bg-amber-500 text-slate-950">
                                Kampus Unggulan
                            </span>
                            <h3 class="font-bold text-lg text-white">Membangun Masa Depan Pariwisata Indonesia</h3>
                            <p class="text-xs text-slate-300">Menghubungkan potensi pariwisata daerah Minangkabau dengan standar industri global.</p>
                        </div>
                    </div>

                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 -right-4 sm:-right-6 bg-white/95 backdrop-blur-md text-slate-800 p-4 rounded-xl shadow-xl border border-slate-200 hidden sm:flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-900 flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-900">Kurikulum Berbasis Industri</p>
                            <p class="text-[11px] text-slate-500">Hospitality & Manajemen Destinasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: PENGENALAN INSTITUSI (UNIDHA & YAYASAN PENDIDIKAN DHARMA ANDALAS) -->
<section class="py-16 sm:py-24 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 order-2 lg:order-1">
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="rounded-xl overflow-hidden shadow-md">
                            <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=600&q=80" alt="Suasana Perkuliahan" class="w-full h-44 object-cover">
                        </div>
                        <div class="p-4 rounded-xl bg-blue-50 border border-blue-100">
                            <span class="text-xs font-bold text-blue-900 uppercase tracking-wider block">UNIDHA Padang</span>
                            <p class="text-xs text-slate-600 mt-1">Institusi pendidikan tinggi terpercaya di jantung Kota Padang, Sumatera Barat.</p>
                        </div>
                    </div>
                    <div class="space-y-4 pt-6">
                        <div class="p-4 rounded-xl bg-amber-50 border border-amber-100">
                            <span class="text-xs font-bold text-amber-800 uppercase tracking-wider block">Yayasan Dharma Andalas</span>
                            <p class="text-xs text-slate-600 mt-1">Dikelola oleh yayasan yang menaungi pendidikan unggul & berdaya saing.</p>
                        </div>
                        <div class="rounded-xl overflow-hidden shadow-md">
                            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=600&q=80" alt="Diskusi Mahasiswa" class="w-full h-44 object-cover">
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 space-y-5 order-1 lg:order-2">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-blue-100 text-blue-900 text-xs font-bold uppercase tracking-wider">
                    Tentang Institusi
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 leading-tight">
                    Universitas Dharma Andalas & Yayasan Pendidikan Dharma Andalas
                </h2>
                <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                    Program Studi S1 Pariwisata diselenggarakan di bawah naungan <strong>Universitas Dharma Andalas (UNIDHA)</strong> yang berlokasi strategis di Jl. Sawahan No. 103, Simpang Haru, Kota Padang. Didukung oleh <strong>Yayasan Pendidikan Dharma Andalas</strong>, UNIDHA terus bertransformasi menjadi pusat pendidikan tinggi terkemuka di Sumatera Barat.
                </p>
                <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                    Pariwisata di Sumatera Barat memiliki daya tarik luar biasa, mulai dari wisata alam, kekayaan kuliner, hingga warisan budaya Minangkabau. Program Studi S1 Pariwisata UNIDHA hadir untuk mencetak sumber daya manusia yang mampu mengelola dan memaksimalkan potensi tersebut dengan standar profesional internasional.
                </p>

                <div class="pt-2 flex flex-wrap gap-4">
                    <div class="flex items-center gap-2 text-xs font-semibold text-slate-700 bg-slate-100 px-3 py-2 rounded-lg">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Fakultas Ekonomi dan Bisnis</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs font-semibold text-slate-700 bg-slate-100 px-3 py-2 rounded-lg">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Lokasi Strategis Pusat Kota Padang</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs font-semibold text-slate-700 bg-slate-100 px-3 py-2 rounded-lg">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Sinergi Industri & Praktik Nyata</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: PROSPEK KARIER LULUSAN -->
<section class="py-16 sm:py-24 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-16">
            <span class="inline-block px-3 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold uppercase tracking-wider">
                Masa Depan Cerah
            </span>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900">
                Peluang dan Prospek Karier Lulusan
            </h2>
            <p class="text-slate-600 text-sm sm:text-base">
                Lulusan Program Studi S1 Pariwisata Universitas Dharma Andalas disiapkan menempati posisi strategis di tiga pilar utama sektor industri pariwisata:
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Pilar 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-slate-200/80 transition-all group hover:-translate-y-1">
                <div class="w-14 h-14 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center mb-6 group-hover:bg-amber-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <span class="text-xs font-bold text-amber-600 uppercase tracking-wider">Pilar 01</span>
                <h3 class="text-xl font-bold text-slate-900 mt-1 mb-3">
                    Sektor Perhotelan, Akomodasi, & MICE
                </h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Karier sebagai Hotel Manager, Food & Beverage Specialist, Event & Convention Organizer, Banquet Planner, hingga pengelola resort mewah berstandar internasional.
                </p>
                <div class="mt-6 pt-4 border-t border-slate-100 text-xs text-slate-500 flex items-center gap-1.5 font-medium">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Hospitality & Convention Industry</span>
                </div>
            </div>

            <!-- Pilar 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-slate-200/80 transition-all group hover:-translate-y-1">
                <div class="w-14 h-14 rounded-xl bg-blue-500/10 text-blue-600 flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Pilar 02</span>
                <h3 class="text-xl font-bold text-slate-900 mt-1 mb-3">
                    Industri Perjalanan, Tour & Destinasi
                </h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Profesional perancang tur, konsultan travel & trip planner, pengembang desa wisata, manajer destinasi ekowisata, serta entrepreneur di bidang pariwisata kreatif.
                </p>
                <div class="mt-6 pt-4 border-t border-slate-100 text-xs text-slate-500 flex items-center gap-1.5 font-medium">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Tour & Destination Management</span>
                </div>
            </div>

            <!-- Pilar 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-slate-200/80 transition-all group hover:-translate-y-1">
                <div class="w-14 h-14 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-wider">Pilar 03</span>
                <h3 class="text-xl font-bold text-slate-900 mt-1 mb-3">
                    Instansi Pemerintah & Akademisi
                </h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Birokrat di Kementerian Pariwisata, Dinas Pariwisata Daerah, analis kebijakan kepariwisataan, peneliti, pengajar, serta konsultan pengembangan aset wilayah.
                </p>
                <div class="mt-6 pt-4 border-t border-slate-100 text-xs text-slate-500 flex items-center gap-1.5 font-medium">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Government & Academic Research</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: BERITA TERBARU -->
<section class="py-16 sm:py-24 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-900 text-xs font-bold uppercase tracking-wider">
                    Informasi & Warta
                </span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 mt-2">
                    Berita & Kegiatan Terbaru
                </h2>
                <p class="text-slate-600 text-sm mt-1">Ikuti kabar dinamika kegiatan pembelajaran, himpunan, dan pengumuman prodi.</p>
            </div>
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-blue-900 hover:text-amber-600 transition-colors">
                <span>Lihat Semua Berita</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($latestNews as $item)
                <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="relative h-48 overflow-hidden bg-slate-100">
                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-3 left-3 bg-slate-900/80 backdrop-blur-md text-amber-400 text-xs px-2.5 py-1 rounded font-semibold">
                            {{ $item['category'] }}
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-2 text-xs text-slate-400 mb-2">
                            <span>{{ $item['date'] }}</span>
                            <span>&bull;</span>
                            <span>{{ $item['author'] }}</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-blue-900 transition-colors line-clamp-2 mb-2 leading-snug">
                            <a href="{{ route('berita.show', $item['slug']) }}">
                                {{ $item['title'] }}
                            </a>
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 line-clamp-3 mb-4 leading-relaxed">
                            {{ $item['summary'] }}
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                            <a href="{{ route('berita.show', $item['slug']) }}" class="text-xs font-bold text-blue-900 group-hover:text-amber-600 flex items-center gap-1 transition-colors">
                                <span>Baca Selengkapnya</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
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

<!-- SECTION: PROMOSI SPMB 2026 -->
<section class="py-16 sm:py-20 bg-gradient-to-r from-blue-950 via-slate-900 to-blue-900 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:20px_20px]"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-amber-500/10 to-blue-500/10 border border-slate-700 rounded-3xl p-8 sm:p-12 backdrop-blur-sm">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8 space-y-4">
                    <span class="inline-block px-3 py-1 rounded-full bg-amber-400 text-slate-950 text-xs font-bold uppercase tracking-wider">
                        Penerimaan Mahasiswa Baru 2026
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white leading-tight">
                        Wujudkan Cita-cita Karier Pariwisata Anda Bersama UNIDHA
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                        Bergabunglah bersama keluarga besar Program Studi S1 Pariwisata Universitas Dharma Andalas. Dapatkan fasilitas belajar terintegrasi, dosen berpengalaman, serta kesempatan magang di jaringan hotel dan industri perjalanan.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-2">
                        <div class="flex items-center gap-2 text-xs text-amber-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Jalur Reguler & Prestasi</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-amber-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Konsultasi & Layanan Terbuka</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3 justify-center">
                    <a href="{{ route('spmb') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl font-bold text-sm text-slate-950 bg-amber-400 hover:bg-amber-300 transition-colors shadow-lg">
                        <span>Informasi Pendaftaran SPMB</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="{{ route('kontak') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl font-bold text-sm text-white bg-slate-800 hover:bg-slate-700 border border-slate-600 transition-colors">
                        <span>Hubungi Panitia Penerimaan</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
