<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard') - S1 Pariwisata UNIDHA</title>

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
<body class="h-full flex antialiased bg-slate-100 text-slate-800">

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
                Manajemen Konten
            </div>

            <a href="{{ route('admin.landing') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-colors {{ request()->routeIs('admin.landing') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Kelola Landing Page</span>
            </a>

            <a href="{{ route('admin.berita') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-colors {{ request()->routeIs('admin.berita*') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                <span>Kelola Berita & Agenda</span>
            </a>

            <a href="{{ route('admin.banner-logo') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-colors {{ request()->routeIs('admin.banner-logo') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span>Kelola Logo & Banner</span>
            </a>

            <a href="{{ route('admin.profil') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-colors {{ request()->routeIs('admin.profil') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <span>Kelola Profil & Visi Misi</span>
            </a>

            <a href="{{ route('admin.kurikulum') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-colors {{ request()->routeIs('admin.kurikulum') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <span>Kelola Kurikulum & MK</span>
            </a>

            <div class="pt-4 pb-1 px-3 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                Sistem & Pengaturan
            </div>

            <a href="{{ route('admin.pengaturan') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-colors {{ request()->routeIs('admin.pengaturan') ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span>Pengaturan Website</span>
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
        <!-- Top Navigation Bar -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-6 z-10 shrink-0">
            <div class="flex items-center gap-2">
                <span class="text-sm font-extrabold text-slate-800 tracking-tight">S1 Pariwisata UNIDHA</span>
                <span class="text-xs text-slate-400 hidden md:inline">|</span>
                <span class="text-xs text-slate-500 hidden md:inline">Fakultas Ekonomi dan Bisnis</span>
            </div>

            <!-- Mobile Quick Links -->
            <div class="flex lg:hidden items-center gap-1 sm:gap-2 text-[11px] sm:text-xs font-semibold text-slate-600 overflow-x-auto">
                <a href="{{ route('admin.dashboard') }}" class="p-1.5 sm:p-2 rounded-lg hover:bg-slate-100 whitespace-nowrap">Dashboard</a>
                <a href="{{ route('admin.berita') }}" class="p-1.5 sm:p-2 rounded-lg hover:bg-slate-100 whitespace-nowrap">Berita</a>
                <a href="{{ route('admin.banner-logo') }}" class="p-1.5 sm:p-2 rounded-lg hover:bg-slate-100 whitespace-nowrap text-blue-900 font-bold">Logo & Banner</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="p-1.5 sm:p-2 text-rose-600 whitespace-nowrap font-semibold">Keluar</button>
                </form>
            </div>

            <div class="hidden sm:flex items-center gap-4">
                <span class="text-xs text-slate-500">Tahun Akademik: <strong>2026/2027</strong></span>
                <div class="w-8 h-8 rounded-full bg-blue-900 text-white flex items-center justify-center font-bold text-xs">
                    U
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
