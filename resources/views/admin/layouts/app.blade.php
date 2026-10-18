<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-100">
<head>
    <meta charset="utf-8">
    @php
        $siteLogoFavicon = \App\Models\Setting::get('site_logo', null);
        $defaultFaviconSvg = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%230284c7' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253'/%3E%3C/svg%3E";
        $faviconHref = $siteLogoFavicon ? (str_starts_with($siteLogoFavicon, 'http') || str_starts_with($siteLogoFavicon, '/') ? $siteLogoFavicon : '/' . ltrim($siteLogoFavicon, '/')) : $defaultFaviconSvg;
    @endphp
    <title>@yield('title', 'Admin Dashboard') | S1 Pariwisata UNIDHA</title>

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

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    <!-- SweetAlert2 for Toast & Action Notifications -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="h-full flex antialiased bg-slate-100 text-slate-800" x-data="{ mobileMenuOpen: false }">

    <script>
        // Global SweetAlert Notification Helpers
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        function notifySuccess(message) {
            Toast.fire({
                icon: 'success',
                title: message
            });
        }

        @if(session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                notifySuccess(@json(session('success')));
            });
        @endif

        function notifyDelete(title, callback) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data " + title + " yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e11d48',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus Data',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-3xl shadow-2xl border border-slate-200'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    if (typeof callback === 'function') {
                        callback();
                    }
                }
            });
        }
    </script>

    <!-- Mobile Drawer Backdrop Overlay -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="mobileMenuOpen = false" 
         class="fixed inset-0 z-40 bg-slate-950/70 backdrop-blur-xs lg:hidden"
         style="display: none;"></div>

    <!-- Mobile Slide-over Drawer Sidebar -->
    <aside x-show="mobileMenuOpen" 
           x-transition:enter="transition ease-in-out duration-300 transform"
           x-transition:enter-start="-translate-x-full"
           x-transition:enter-end="translate-x-0"
           x-transition:leave="transition ease-in-out duration-300 transform"
           x-transition:leave-start="translate-x-0"
           x-transition:leave-end="-translate-x-full"
           class="fixed inset-y-0 left-0 z-50 w-72 bg-slate-900 border-r border-slate-800 text-slate-300 flex flex-col lg:hidden shadow-2xl"
           style="display: none;">
        
        <!-- Mobile Drawer Header -->
        <div class="h-16 flex items-center justify-between px-6 border-b border-slate-800">
            <div class="flex items-center gap-3">
                <x-app-logo class="w-8 h-8" svg-class="w-5 h-5" />
                <div>
                    <span class="block text-xs font-bold uppercase tracking-wider text-amber-400">CMS PANEL</span>
                    <span class="block text-sm font-extrabold text-white leading-none">S1 Pariwisata</span>
                </div>
            </div>
            <button @click="mobileMenuOpen = false" class="p-2 text-slate-400 hover:text-white rounded-lg hover:bg-slate-800 transition-colors" aria-label="Tutup Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Mobile Drawer Navigation (Complete 9 Menus) -->
        <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Ringkasan Dashboard</span>
            </a>

            <div class="pt-4 pb-1 px-3 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                Konten Beranda
            </div>

            <!-- 1. Edit Banner & Hero -->
            <a href="{{ route('admin.banner-logo') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.banner-logo') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span>Edit Banner & Logo</span>
            </a>

            <!-- 2. Edit Prospek Karier Lulusan & Landing Elements -->
            <a href="{{ route('admin.landing') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.landing') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Edit Prospek Karier</span>
            </a>

            <div class="pt-4 pb-1 px-3 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                Halaman Publik
            </div>

            <!-- 3. Edit Profil (Visi Misi & Identitas) -->
            <a href="{{ route('admin.profil') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.profil') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <span>Edit Profil & Visi Misi</span>
            </a>

            <!-- 4. Edit Tata Kelola & Pimpinan -->
            <a href="{{ route('admin.pimpinan') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.pimpinan*') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <span>Edit Tata Kelola & Pimpinan</span>
            </a>

            <!-- 5. Edit Akademik & Kurikulum -->
            <a href="{{ route('admin.kurikulum') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.kurikulum') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <span>Edit Akademik & MK</span>
            </a>

            <!-- 6. Edit Kemahasiswaan & HIMPAR -->
            <a href="{{ route('admin.kemahasiswaan') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.kemahasiswaan') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <span>Edit Kemahasiswaan</span>
            </a>

            <!-- 7. Edit Berita & Artikel -->
            <a href="{{ route('admin.berita') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.berita*') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                <span>Edit Berita & Warta</span>
            </a>

            <!-- 8. Edit Link Terkait -->
            <a href="{{ route('admin.link') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.link*') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                <span>Edit Link Terkait</span>
            </a>

            <div class="pt-4 pb-1 px-3 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                Kontak & Footer
            </div>

            <!-- 9. Edit Kontak & Footer -->
            <a href="{{ route('admin.pengaturan') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.pengaturan') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                <span>Edit Kontak & Footer</span>
            </a>
        </nav>

        <!-- Mobile Drawer User & Logout -->
        <div class="p-4 border-t border-slate-800">
            <div class="flex items-center gap-3 p-2 rounded-xl bg-slate-800/60 mb-2">
                <div class="w-9 h-9 rounded-full bg-amber-500/20 text-amber-400 font-bold flex items-center justify-center text-xs">
                    {{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 2)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-bold text-white truncate">{{ Auth::user()->name ?? 'Administrator Prodi' }}</p>
                    <p class="text-[11px] text-slate-400 truncate">{{ Auth::user()->email ?? 'admin@pariwisata.unidha.ac.id' }}</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center justify-center gap-2 w-full px-3 py-2 rounded-lg text-xs font-semibold text-rose-400 hover:bg-rose-500/10 hover:text-rose-300 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Keluar (Logout)</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Sidebar Desktop -->
    <aside class="hidden lg:flex lg:flex-col w-64 bg-slate-900 border-r border-slate-800 text-slate-300 shrink-0">
        <!-- Logo Area -->
        <div class="h-16 flex items-center gap-3 px-6 border-b border-slate-800">
            <x-app-logo class="w-8 h-8" svg-class="w-5 h-5" />
            <div>
                <span class="block text-xs font-bold uppercase tracking-wider text-amber-400">CMS PANEL</span>
                <span class="block text-sm font-extrabold text-white leading-none">S1 Pariwisata</span>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Ringkasan Dashboard</span>
            </a>

            <div class="pt-4 pb-1 px-3 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                Konten Beranda
            </div>

            <!-- 1. Edit Banner & Hero -->
            <a href="{{ route('admin.banner-logo') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.banner-logo') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span>Edit Banner & Logo</span>
            </a>

            <!-- 2. Edit Prospek Karier Lulusan & Landing Elements -->
            <a href="{{ route('admin.landing') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.landing') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Edit Prospek Karier</span>
            </a>

            <div class="pt-4 pb-1 px-3 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                Halaman Publik
            </div>

            <!-- 3. Edit Profil (Visi Misi & Identitas) -->
            <a href="{{ route('admin.profil') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.profil') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <span>Edit Profil & Visi Misi</span>
            </a>

            <!-- 4. Edit Tata Kelola & Pimpinan (Dedicated) -->
            <a href="{{ route('admin.pimpinan') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.pimpinan*') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <span>Edit Tata Kelola & Pimpinan</span>
            </a>

            <!-- 4. Edit Akademik & Kurikulum -->
            <a href="{{ route('admin.kurikulum') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.kurikulum') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <span>Edit Akademik & MK</span>
            </a>

            <!-- 5. Edit Kemahasiswaan & HIMPAR -->
            <a href="{{ route('admin.kemahasiswaan') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.kemahasiswaan') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <span>Edit Kemahasiswaan</span>
            </a>

            <!-- 6. Edit Berita & Artikel -->
            <a href="{{ route('admin.berita') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.berita*') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                <span>Edit Berita & Warta</span>
            </a>

            <!-- 7. Edit Link Terkait -->
            <a href="{{ route('admin.link') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.link*') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                <span>Edit Link Terkait</span>
            </a>

            <div class="pt-4 pb-1 px-3 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                Kontak & Footer
            </div>

            <!-- 8. Edit Kontak & Footer -->
            <a href="{{ route('admin.pengaturan') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-colors {{ request()->routeIs('admin.pengaturan') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                <span>Edit Kontak & Footer</span>
            </a>
        </nav>

        <!-- User Info & Logout -->
        <div class="p-4 border-t border-slate-800">
            <div class="flex items-center gap-3 p-2 rounded-xl bg-slate-800/60 mb-2">
                <div class="w-9 h-9 rounded-full bg-amber-500/20 text-amber-400 font-bold flex items-center justify-center text-xs">
                    {{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 2)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-bold text-white truncate">{{ Auth::user()->name ?? 'Administrator Prodi' }}</p>
                    <p class="text-[11px] text-slate-400 truncate">{{ Auth::user()->email ?? 'admin@pariwisata.unidha.ac.id' }}</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center justify-center gap-2 w-full px-3 py-2 rounded-lg text-xs font-semibold text-rose-400 hover:bg-rose-500/10 hover:text-rose-300 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Keluar (Logout)</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <!-- Top Navigation Bar with Hamburger Toggle -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-6 z-10 shrink-0">
            <div class="flex items-center gap-3">
                <!-- Hamburger Menu Button (Mobile Only) -->
                <button @click="mobileMenuOpen = true" 
                        type="button"
                        class="lg:hidden p-2 -ml-1.5 text-slate-600 hover:text-slate-900 hover:bg-slate-100 rounded-xl transition-colors focus:outline-none focus:ring-2 focus:ring-blue-600"
                        aria-label="Buka Menu Navigasi">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <div class="flex items-center gap-2">
                    <span class="text-sm font-extrabold text-slate-800 tracking-tight">S1 Pariwisata UNIDHA</span>
                    <span class="text-xs text-slate-400 hidden sm:inline">|</span>
                    <span class="text-xs text-slate-500 hidden sm:inline">Fakultas Ekonomi dan Bisnis</span>
                </div>
            </div>

            <!-- Top Right Profile & Status -->
            <div class="flex items-center gap-3 sm:gap-4">
                <span class="hidden md:inline-block text-xs text-slate-500">Tahun Akademik: <strong>2026/2027</strong></span>
                <div class="flex items-center gap-2 pl-3 border-l border-slate-200">
                    <div class="w-8 h-8 rounded-full bg-blue-900 text-white flex items-center justify-center font-bold text-xs shadow-xs">
                        {{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 1)) }}
                    </div>
                    <span class="hidden md:inline-block text-xs font-bold text-slate-700 truncate max-w-[120px]">
                        {{ Auth::user()->name ?? 'Administrator' }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 rounded-lg hover:bg-rose-50 transition-colors" title="Keluar">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Page Body Content -->
        <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
            @yield('admin_content')
        </main>
    </div>

</body>
</html>
