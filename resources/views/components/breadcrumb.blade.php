@props(['items' => []])

<nav class="py-4 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto" aria-label="Breadcrumb">
    <ol class="flex items-center flex-wrap gap-2 text-xs sm:text-sm text-slate-500">
        <li class="inline-flex items-center">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-slate-600 hover:text-blue-900 transition-colors">
                <svg class="w-4 h-4 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
                <span>Beranda</span>
            </a>
        </li>
        @foreach($items as $label => $url)
            <li class="inline-flex items-center gap-2">
                <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                @if(!$loop->last && $url)
                    <a href="{{ $url }}" class="text-slate-600 hover:text-blue-900 transition-colors line-clamp-1 max-w-[200px] sm:max-w-none">
                        {{ $label }}
                    </a>
                @else
                    <span class="text-blue-950 font-semibold line-clamp-1 max-w-[220px] sm:max-w-none" aria-current="page">
                        {{ $label }}
                    </span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
