@extends('layouts.public')

@section('title', 'Berita & Informasi - S1 Pariwisata UNIDHA')
@section('meta_description', 'Kumpulan berita, warta kegiatan akademik, pengumuman, dan artikel kepariwisataan Program Studi S1 Pariwisata Universitas Dharma Andalas.')

@section('content')
<!-- Page Banner -->
<section class="bg-gradient-to-r from-slate-950 via-blue-950 to-slate-900 text-white py-16 sm:py-20 border-b border-slate-800 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <span class="inline-block px-3 py-1 rounded-full bg-amber-500/20 text-amber-400 text-xs font-bold uppercase tracking-wider mb-3">
            Warta & Kabar Terkini
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mb-4">
            Berita & Artikel Program Studi
        </h1>
        <p class="text-slate-300 max-w-2xl text-base sm:text-lg">
            Temukan berita terkini seputar dunia perkuliahan, agenda kemahasiswaan HIMPAR, wawasan industri pariwisata, dan informasi penerimaan mahasiswa baru.
        </p>
    </div>
</section>

<!-- Breadcrumb -->
@include('components.breadcrumb', ['items' => ['Berita' => null]])

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 space-y-12">
    <!-- Filter or Category Header Info -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-slate-200 gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Semua Publikasi</h2>
            <p class="text-xs text-slate-500">Menampilkan {{ $newsList->total() }} warta terbaru dari program studi</p>
        </div>
    </div>

    <!-- News Grid -->
    @if($newsList->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($newsList as $item)
                <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <a href="{{ route('berita.show', $item->slug) }}" class="relative h-52 overflow-hidden bg-slate-100 block">
                        <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-3 left-3 bg-slate-900/85 backdrop-blur-md text-amber-400 text-xs px-2.5 py-1 rounded font-semibold">
                            {{ $item->category }}
                        </div>
                    </a>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-2 text-xs text-slate-400 mb-2">
                            <span>{{ $item->date_text ?? $item->created_at->translatedFormat('d F Y') }}</span>
                            <span>&bull;</span>
                            <span>{{ $item->author }}</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-blue-900 transition-colors line-clamp-2 mb-2 leading-snug">
                            <a href="{{ route('berita.show', $item->slug) }}">
                                {{ $item->title }}
                            </a>
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 line-clamp-3 mb-4 leading-relaxed">
                            {{ $item->summary }}
                        </p>
                        <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                            <a href="{{ route('berita.show', $item->slug) }}" class="text-xs font-bold text-blue-900 group-hover:text-amber-600 flex items-center gap-1 transition-colors">
                                <span>Baca Selengkapnya</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                            <span class="text-[11px] text-slate-400">UNIDHA</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="pt-8">
            {{ $newsList->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-slate-300 p-8">
            <div class="w-16 h-16 rounded-full bg-slate-100 text-slate-400 mx-auto flex items-center justify-center mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            </div>
            <h3 class="text-lg font-bold text-slate-900">Belum Ada Berita</h3>
            <p class="text-xs sm:text-sm text-slate-500 mt-1 max-w-sm mx-auto">
                Berita dan informasi terbaru akan segera diterbitkan. Silakan kembali lagi nanti atau hubungi kami melalui kanal media sosial.
            </p>
        </div>
    @endif
</div>
@endsection
