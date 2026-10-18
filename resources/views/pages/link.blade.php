@extends('layouts.public')

@section('title', 'Tautan & Direktori')
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
    @php
        $linksList = \App\Models\Link::where('is_active', true)->orderBy('order')->orderBy('id')->get();
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($linksList as $item)
            <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer" class="bg-white rounded-2xl p-6 border border-slate-200 hover:border-blue-500 hover:shadow-lg transition-all group flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-900 flex items-center justify-center font-bold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </div>
                    <span class="inline-block px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-slate-100 text-slate-700 uppercase tracking-wider">
                        {{ $item->category }}
                    </span>
                    <h3 class="font-bold text-slate-900 group-hover:text-blue-900 text-lg transition-colors">
                        {{ $item->title }}
                    </h3>
                    @if($item->description)
                        <p class="text-xs text-slate-500 leading-relaxed">
                            {{ $item->description }}
                        </p>
                    @endif
                </div>
                <div class="pt-6 mt-4 border-t border-slate-100 flex items-center justify-between text-xs font-bold text-blue-900">
                    <span class="truncate max-w-[200px]">{{ $item->url }}</span>
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </a>
        @empty
            <div class="col-span-3 text-center py-12 text-slate-400 text-sm">
                Belum ada tautan direktori yang aktif.
            </div>
        @endforelse
    </div>
</div>
@endsection
