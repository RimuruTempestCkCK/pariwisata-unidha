<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    @php
        $siteLogoFavicon = \App\Models\Setting::get('site_logo', null);
        $defaultFaviconSvg = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%230284c7' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253'/%3E%3C/svg%3E";
        $faviconHref = $siteLogoFavicon ? (str_starts_with($siteLogoFavicon, 'http') || str_starts_with($siteLogoFavicon, '/') ? $siteLogoFavicon : '/' . ltrim($siteLogoFavicon, '/')) : $defaultFaviconSvg;
    @endphp
    <title>Login Administrator | S1 Pariwisata UNIDHA</title>

    <!-- Dynamic Favicon linked to Website Logo -->
    <link rel="icon" href="{{ $faviconHref }}">
    <link rel="shortcut icon" href="{{ $faviconHref }}">
    <link rel="apple-touch-icon" href="{{ $faviconHref }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @endif

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="h-full flex items-center justify-center p-4 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-950 text-slate-800">
    <!-- Ambient Blur Glows -->
    <div class="absolute -top-32 -left-32 w-80 h-80 bg-amber-500/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-80 h-80 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md relative z-10">
        <!-- Logo & Brand Header -->
        <div class="text-center mb-8 space-y-2">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3 group">
                <x-app-logo class="w-12 h-12" svg-class="w-7 h-7" />
                <div class="text-left">
                    <span class="block text-xs font-bold tracking-wider uppercase text-amber-400">PORTAL CMS ADMIN</span>
                    <span class="block text-base font-extrabold text-white leading-tight">S1 PARIWISATA UNIDHA</span>
                </div>
            </a>
            <p class="text-xs text-slate-400">Masuk untuk mengelola publikasi warta, agenda, dan informasi prodi.</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white/95 backdrop-blur-xl rounded-3xl p-8 sm:p-10 shadow-2xl border border-white/20 space-y-6">
            <div class="space-y-1">
                <h1 class="text-xl font-extrabold text-slate-900">Selamat Datang Pengelola</h1>
                <p class="text-xs text-slate-500">Masukkan kredensial akun administrator Anda.</p>
            </div>

            @if ($errors->any())
                <div class="p-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('success'))
                <div class="p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Alamat Email / NIDN</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"/></svg>
                        </span>
                        <input type="email" name="email" value="{{ old('email', 'admin@pariwisata.unidha.ac.id') }}" required placeholder="admin@pariwisata.unidha.ac.id" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-slate-50/50">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-xs font-bold text-slate-700">Kata Sandi</label>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </span>
                        <input type="password" name="password" required value="admin123" placeholder="••••••••" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-slate-50/50">
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs text-slate-600 pt-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" checked class="rounded border-slate-300 text-amber-600 focus:ring-amber-500">
                        <span>Ingat sesi masuk</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-blue-900 to-blue-950 hover:from-blue-800 hover:to-blue-900 text-white font-bold text-sm shadow-lg shadow-blue-950/30 transition-all flex items-center justify-center gap-2">
                    <span>Masuk ke Dashboard</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </form>

            <div class="pt-4 border-t border-slate-100 text-center">
                <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-500 hover:text-blue-950 flex items-center justify-center gap-1.5 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <span>Kembali ke Website Publik</span>
                </a>
            </div>
        </div>

        <p class="text-center text-[11px] text-slate-500 mt-6">
            &copy; {{ date('Y') }} S1 Pariwisata - Universitas Dharma Andalas Padang.
        </p>
    </div>
</body>
</html>
