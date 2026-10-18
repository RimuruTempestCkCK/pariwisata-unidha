@extends('layouts.public')

@section('title', 'Profil Program Studi S1 Pariwisata')
@section('meta_description', 'Profil lengkap Program Studi S1 Pariwisata Fakultas Ekonomi dan Bisnis Universitas Dharma Andalas Padang.')

@section('content')
<!-- Page Banner -->
<section class="bg-gradient-to-r from-slate-950 via-blue-950 to-slate-900 text-white py-16 sm:py-20 border-b border-slate-800 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <span class="inline-block px-3 py-1 rounded-full bg-amber-500/20 text-amber-400 text-xs font-bold uppercase tracking-wider mb-3">
            Tentang Kami
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mb-4">
            Profil Program Studi S1 Pariwisata
        </h1>
        <p class="text-slate-300 max-w-2xl text-base sm:text-lg">
            Mengenal lebih dekat visi, pilar keilmuan, dan dedikasi Program Studi S1 Pariwisata Universitas Dharma Andalas dalam melahirkan sarjana unggul.
        </p>
    </div>
</section>

<!-- Breadcrumb -->
@include('components.breadcrumb', ['items' => ['Profil' => null]])

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 space-y-16">
    @php
        $sloganItem = $profileItems->firstWhere('kategori', 'Identitas & Slogan');
        $visiItem = $profileItems->firstWhere('kategori', 'Visi Program Studi');
        $misiItems = $profileItems->where('kategori', 'Misi Program Studi');
        $pimpinanItems = $profileItems->where('kategori', 'Tata Kelola & Pimpinan');
    @endphp

    <!-- Pengenalan Program Studi -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-7 space-y-5">
            <span class="text-xs font-bold text-amber-600 tracking-wider uppercase block">Pengantar & Identitas</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight">
                Pendidikan Sarjana Pariwisata Berdaya Saing Global & Berakar Budaya Lokal
            </h2>
            <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                Program Studi S1 Pariwisata Universitas Dharma Andalas (UNIDHA) didirikan untuk menjawab kebutuhan nyata industri pariwisata Sumatera Barat dan Indonesia yang terus bertumbuh pesat.
            </p>
            <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                Melalui semboyan <em>“{{ $sloganItem->isi ?? 'Creating Memories, Inspiring Journey, And Connecting Cultures, Creating Futures' }}”</em>, program studi ini menggabungkan fondasi manajemen bisnis kepariwisataan dengan wawasan kearifan lokal, etika hospitality, pemanfaatan teknologi digital, serta pelestarian lingkungan.
            </p>
            <div class="p-4 rounded-xl bg-slate-100 border-l-4 border-amber-500 text-xs sm:text-sm text-slate-700 italic">
                “Pariwisata bukan sekadar industri hiburan, melainkan jembatan antarbudaya yang menggerakkan ekonomi masyarakat dan membuka masa depan generasi muda.”
            </div>
        </div>

        <div class="lg:col-span-5">
            <div class="relative rounded-2xl overflow-hidden shadow-xl border border-slate-200">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80" alt="Diskusi Tim Pariwisata" class="w-full h-80 object-cover">
                <div class="p-6 bg-white">
                    <h3 class="font-bold text-slate-900 text-sm">Fakultas Ekonomi dan Bisnis UNIDHA</h3>
                    <p class="text-xs text-slate-500 mt-1">Mengintegrasikan kompetensi manajerial, kewirausahaan pariwisata, dan etika profesional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi dan Misi -->
    <section class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm">
        <div class="max-w-3xl mb-8">
            <span class="text-xs font-bold text-blue-900 tracking-wider uppercase block">Arah & Komitmen</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Visi dan Misi Program Studi</h2>
            <p class="text-slate-600 text-xs sm:text-sm mt-1">
                Arah pengembangan strategis Program Studi S1 Pariwisata UNIDHA:
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Visi -->
            <div class="p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-blue-50 to-sky-50 border border-blue-100">
                <div class="w-12 h-12 rounded-xl bg-blue-900 text-white flex items-center justify-center font-bold mb-4 shadow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-blue-950 mb-2">Visi</h3>
                <p class="text-sm text-slate-700 leading-relaxed">
                    {{ $visiItem->isi ?? 'Menjadi program studi sarjana pariwisata yang unggul, berjiwa wirausaha, berbasis kearifan lokal, serta mampu bersaing di tingkat nasional dan internasional dalam pengembangan industri kepariwisataan berkelanjutan.' }}
                </p>
            </div>

            <!-- Misi -->
            <div class="p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 border border-amber-100">
                <div class="w-12 h-12 rounded-xl bg-amber-600 text-white flex items-center justify-center font-bold mb-4 shadow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <h3 class="text-lg font-bold text-amber-950 mb-2">Misi</h3>
                <ul class="text-sm text-slate-700 space-y-2.5">
                    @forelse($misiItems as $misi)
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 font-bold mt-0.5">&bull;</span>
                            <span>{{ $misi->isi }}</span>
                        </li>
                    @empty
                        <li class="flex items-start gap-2">
                            <span class="text-amber-600 font-bold mt-0.5">&bull;</span>
                            <span>Menyelenggarakan pendidikan sarjana pariwisata berkualitas tinggi berbasis kurikulum aplikatif dan kemitraan industri.</span>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </section>

    <!-- Pengelola Program Studi / Pimpinan Akademik -->
    <section class="space-y-6">
        <div class="text-center max-w-2xl mx-auto space-y-2">
            <span class="text-xs font-bold text-blue-900 tracking-wider uppercase block">
                {{ \App\Models\Setting::get('pimpinan_eyebrow', 'Tata Kelola & Pengajar') }}
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">
                {{ \App\Models\Setting::get('pimpinan_title', 'Pengelola Program Studi & Pimpinan') }}
            </h2>
            <p class="text-slate-600 text-xs sm:text-sm">
                {{ \App\Models\Setting::get('pimpinan_desc', 'Didukung oleh tenaga pendidik akademisi dan praktisi profesional di bidang manajemen kepariwisataan, perhotelan, dan destinasi.') }}
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($pimpinanItems as $pimpinan)
                <div class="bg-white rounded-2xl p-6 border border-slate-200 text-center space-y-3 hover:shadow-lg transition-all duration-300">
                    <div class="w-20 h-20 rounded-full bg-slate-100 mx-auto flex items-center justify-center text-slate-500 font-bold text-xl border-2 border-amber-400">
                        <svg class="w-10 h-10 text-slate-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    </div>
                    <div>
                        <span class="inline-block px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-blue-50 text-blue-900 mb-2">
                            {{ $pimpinan->label }}
                        </span>
                        @if($pimpinan->keterangan)
                            <p class="text-xs text-amber-600 font-semibold mb-1">{{ $pimpinan->keterangan }}</p>
                        @endif
                        <h3 class="font-extrabold text-slate-900 text-base leading-snug">{{ $pimpinan->isi }}</h3>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-2xl p-6 border border-slate-200 text-center space-y-3">
                    <div class="w-20 h-20 rounded-full bg-slate-100 mx-auto flex items-center justify-center text-slate-500 font-bold text-xl border-2 border-amber-400">
                        <svg class="w-10 h-10 text-slate-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    </div>
                    <div>
                        <span class="inline-block px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-blue-50 text-blue-900 mb-2">
                            Ketua Program Studi
                        </span>
                        <p class="text-xs text-amber-600 font-semibold mb-1">Wisudawati Terbaik Magister Pariwisata</p>
                        <h3 class="font-extrabold text-slate-900 text-base leading-snug">Eka Mariyanti, S.E., M.M., M.Par., Ph.D.</h3>
                    </div>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Bottom CTA -->
    <div class="bg-gradient-to-r from-blue-900 to-slate-900 rounded-3xl p-8 sm:p-10 text-white flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="space-y-1 text-center md:text-left">
            <h3 class="text-xl font-bold text-white">Ingin Mengetahui Kurikulum & Perkuliahan?</h3>
            <p class="text-xs sm:text-sm text-slate-300">Lihat rancangan mata kuliah dan sistem pembelajaran di S1 Pariwisata UNIDHA.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('akademik') }}" class="px-6 py-3 rounded-xl font-bold text-sm bg-amber-400 text-slate-950 hover:bg-amber-300 transition-colors">
                Buka Halaman Akademik
            </a>
            <a href="{{ route('kontak') }}" class="px-6 py-3 rounded-xl font-semibold text-sm bg-slate-800 hover:bg-slate-700 border border-slate-700 transition-colors">
                Kontak Kami
            </a>
        </div>
    </div>
</div>
@endsection
