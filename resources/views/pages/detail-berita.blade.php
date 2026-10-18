@extends('layouts.public')

@section('title', $news['title'] . ' - S1 Pariwisata UNIDHA')
@section('meta_description', $news['summary'])

@section('content')
<!-- Page Banner Header -->
<section class="bg-gradient-to-r from-slate-950 via-blue-950 to-slate-900 text-white py-12 sm:py-16 border-b border-slate-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 mb-4">
            <span class="px-3 py-1 rounded-full bg-amber-500/20 text-amber-400 text-xs font-bold uppercase tracking-wider">
                {{ $news['category'] }}
            </span>
            <span class="text-slate-500">&bull;</span>
            <span class="text-xs text-slate-300">{{ $news['date'] }}</span>
        </div>
        <h1 class="text-2xl sm:text-4xl lg:text-4xl font-extrabold tracking-tight text-white leading-tight mb-4">
            {{ $news['title'] }}
        </h1>
        <div class="flex items-center gap-3 text-xs sm:text-sm text-slate-400">
            <span>Ditulis oleh: <strong class="text-slate-200">{{ $news['author'] }}</strong></span>
            <span>&bull;</span>
            <span>Program Studi S1 Pariwisata UNIDHA</span>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
@include('components.breadcrumb', [
    'items' => [
        'Berita' => route('berita.index'),
        $news['title'] => null
    ]
])

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14 space-y-12">
    <!-- Featured Image -->
    <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-100">
        <img src="{{ $news['image'] }}" alt="{{ $news['title'] }}" class="w-full h-[320px] sm:h-[450px] object-cover">
    </div>

    <!-- Article Content -->
    <article class="prose prose-slate max-w-none space-y-5 text-slate-700 leading-relaxed text-base sm:text-lg">
        @foreach($news['content'] as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach
    </article>

    <!-- Tags & Share Action -->
    <div class="pt-6 border-t border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex flex-wrap items-center gap-2">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mr-1">Tag:</span>
            @foreach($news['tags'] as $tag)
                <span class="px-3 py-1 rounded-lg bg-slate-100 text-slate-700 text-xs font-medium">
                    #{{ $tag }}
                </span>
            @endforeach
        </div>

        <div>
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 font-bold text-xs transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Kembali ke Semua Berita</span>
            </a>
        </div>
    </div>

    <!-- Related News Section -->
    @if(count($relatedNews) > 0)
        <section class="pt-10 border-t border-slate-200 space-y-6">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-slate-900">Warta Terkait Lainnya</h3>
                <a href="{{ route('berita.index') }}" class="text-xs font-bold text-blue-900 hover:text-amber-600">Lihat Semua &rarr;</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @foreach($relatedNews as $related)
                    <div class="bg-white rounded-2xl overflow-hidden border border-slate-200 group flex flex-col">
                        <a href="{{ route('berita.show', $related['slug']) }}" class="h-36 overflow-hidden block">
                            <img src="{{ $related['image'] }}" alt="{{ $related['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                        <div class="p-4 flex flex-col flex-grow">
                            <span class="text-[11px] text-amber-600 font-bold block mb-1">{{ $related['category'] }}</span>
                            <h4 class="font-bold text-xs sm:text-sm text-slate-900 group-hover:text-blue-900 line-clamp-2 leading-snug">
                                <a href="{{ route('berita.show', $related['slug']) }}">
                                    {{ $related['title'] }}
                                </a>
                            </h4>
                            <span class="text-[10px] text-slate-400 mt-auto pt-3 block">{{ $related['date'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</div>
@endsection
