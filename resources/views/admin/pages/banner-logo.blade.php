@extends('admin.layouts.app')

@section('title', 'Kelola Logo & Banner Website')

@section('admin_content')
<div class="space-y-8 max-w-6xl mx-auto">
    <!-- Header Page -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Kelola Logo & Banner Website</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Atur logo utama website, banner hero beranda, serta tema header halaman publik.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('home') }}" target="_blank" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-50 text-xs font-bold transition-all">
                Lihat Beranda Publik
            </a>
        </div>
    </div>

    <!-- Live Preview Alert Note -->
    <div class="p-4 rounded-2xl bg-blue-50 border border-blue-200 text-xs text-blue-900 flex items-start gap-3">
        <svg class="w-5 h-5 text-blue-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <div>
            <strong class="block font-bold mb-0.5">Pengaturan Aset Visual Website</strong>
            <span>Pilih berkas gambar baru dari komputer Anda atau masukkan tautan URL gambar. Gambar yang diunggah akan otomatis tersimpan ke storage dan ditampilkan di website publik.</span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- SEKSI 1: KELOLA LOGO WEBSITE -->
        <div class="lg:col-span-5 space-y-6">
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-6">
                <div class="border-b border-slate-100 pb-3">
                    <span class="text-[11px] font-bold text-amber-600 uppercase tracking-wider block">Identitas Grafis</span>
                    <h2 class="text-lg font-bold text-slate-900 mt-0.5">Logo Utama Website</h2>
                    <p class="text-xs text-slate-500">Logo yang tampil pada Navbar atas dan Footer website.</p>
                </div>

                <!-- Preview Logo Saat Ini -->
                <div class="space-y-3">
                    <label class="block text-xs font-bold text-slate-700">Pratinjau Logo Saat Ini</label>
                    <div id="logo-preview-box" class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-center gap-3">
                        @if($siteLogo)
                            <img src="{{ $siteLogo }}" alt="Logo Website" class="w-12 h-12 object-contain rounded-xl shadow-xs">
                        @else
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-sky-900 via-blue-800 to-amber-600 flex items-center justify-center text-white shadow-md shrink-0">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582" />
                                </svg>
                            </div>
                        @endif
                        <div>
                            <span class="block text-[11px] font-bold tracking-wider uppercase text-amber-600">S1 PARIWISATA</span>
                            <span class="block text-xs font-extrabold text-slate-900 leading-tight">UNIVERSITAS DHARMA ANDALAS</span>
                            <span class="block text-[10px] text-slate-400">Padang, Sumatera Barat</span>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.banner-logo.logo') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Unggah Berkas Logo Baru</label>
                        <input type="file" name="logo_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-900 hover:file:bg-blue-100 cursor-pointer border border-slate-200 rounded-xl p-1 bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Atau Gunakan Tautan URL Logo</label>
                        <input type="url" name="logo_url" value="{{ $siteLogo }}" placeholder="https://..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                    <button type="submit" class="w-full px-4 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white font-bold text-xs shadow-md transition-all">
                        Simpan Logo
                    </button>
                </form>
            </div>
        </div>

        <!-- SEKSI 2: KELOLA BANNER WEB -->
        <div class="lg:col-span-7 space-y-6">
            <!-- Banner Hero Beranda -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-6"
                 x-data="{
                    activeAdminSlide: 0,
                    slides: {{ $slides->toJson() }},
                    selectSlide(idx) {
                        this.activeAdminSlide = idx;
                        const s = this.slides[idx];
                        document.getElementById('slide-form').action = '/admin/banner-logo/slide/' + s.id;
                        document.getElementById('slide-title').value = s.title || '';
                        document.getElementById('slide-eyebrow').value = s.eyebrow || '';
                        document.getElementById('slide-subtitle').value = s.subtitle || '';
                        document.getElementById('slide-image').value = s.image || '';
                    }
                 }">
                <div class="border-b border-slate-100 pb-3">
                    <span class="text-[11px] font-bold text-blue-900 uppercase tracking-wider block">Visual Hero Section</span>
                    <h2 class="text-lg font-bold text-slate-900 mt-0.5">Slide Hero Background Beranda</h2>
                    <p class="text-xs text-slate-500">Foto background slideshow yang tampil di hero section utama Beranda publik.</p>
                </div>

                <!-- Preview Banner Aktif -->
                <div class="space-y-2">
                    <div class="flex items-center justify-between text-xs font-bold text-slate-700">
                        <span>Pratinjau Slide Terpilih</span>
                        <span class="text-[11px] text-emerald-600 font-semibold" x-text="'Slide ' + (activeAdminSlide + 1) + ' dari ' + slides.length"></span>
                    </div>
                    <div class="relative rounded-2xl overflow-hidden border border-slate-200 shadow-md h-52 sm:h-64 bg-slate-950">
                        <img :src="slides[activeAdminSlide]?.image" alt="Preview Banner Hero" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 text-white">
                            <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-amber-500 text-slate-950 mb-1" x-text="slides[activeAdminSlide]?.eyebrow"></span>
                            <p class="text-xs sm:text-sm font-bold text-white" x-text="slides[activeAdminSlide]?.title"></p>
                            <p class="text-[10px] sm:text-xs text-slate-300" x-text="slides[activeAdminSlide]?.subtitle"></p>
                        </div>
                    </div>
                </div>

                <!-- Slider Item Selector Pills -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">Pilih Slide yang Ingin Diatur:</label>
                    <div class="flex flex-wrap gap-2">
                        <template x-for="(s, idx) in slides" :key="s.id">
                            <button type="button" 
                                    @click="selectSlide(idx)" 
                                    class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all border"
                                    :class="activeAdminSlide === idx ? 'bg-blue-900 border-blue-900 text-white shadow-xs' : 'bg-slate-50 border-slate-200 text-slate-700 hover:bg-slate-100'">
                                <span x-text="'Slide ' + (idx + 1) + ': ' + (s.eyebrow || 'Slide')"></span>
                            </button>
                        </template>
                    </div>
                </div>

                <!-- Form Edit Slide Terpilih -->
                <form id="slide-form" method="POST" :action="'/admin/banner-logo/slide/' + (slides[0]?.id || 1)" enctype="multipart/form-data" class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Unggah Berkas Gambar Baru</label>
                            <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-100 file:text-blue-900 hover:file:bg-blue-200 cursor-pointer border border-slate-200 rounded-xl p-1 bg-white">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Atau Gunakan Tautan URL Gambar</label>
                            <input type="url" name="image" id="slide-image" :value="slides[activeAdminSlide]?.image" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Judul Slide Banner *</label>
                            <input type="text" name="title" id="slide-title" required :value="slides[activeAdminSlide]?.title" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Eyebrow / Badge Kategori</label>
                            <input type="text" name="eyebrow" id="slide-eyebrow" :value="slides[activeAdminSlide]?.eyebrow" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Deskripsi Singkat Banner</label>
                        <input type="text" name="subtitle" id="slide-subtitle" :value="slides[activeAdminSlide]?.subtitle" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                    </div>

                    <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-200">
                        <button type="submit" class="px-5 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white text-xs font-bold transition-all shadow-md">
                            Simpan Perubahan Slide Ini
                        </button>
                    </div>
                </form>
            </div>

            <!-- Banner Tema Visual Halaman Dalam -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-5">
                <div class="border-b border-slate-100 pb-3">
                    <span class="text-[11px] font-bold text-blue-900 uppercase tracking-wider block">Banner Halaman Dalam</span>
                    <h2 class="text-lg font-bold text-slate-900 mt-0.5">Tema Header Sub-Halaman</h2>
                    <p class="text-xs text-slate-500">Pilih tema latar gradien untuk halaman profil, akademik, dan kontak.</p>
                </div>

                <form method="POST" action="{{ route('admin.banner-logo.theme') }}">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                        <label class="border-2 {{ $headerTheme === 'Midnight Blue' ? 'border-blue-900 bg-blue-50/50' : 'border-slate-200' }} rounded-2xl p-4 cursor-pointer block space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-900">Midnight Blue</span>
                                <input type="radio" name="header_theme" value="Midnight Blue" {{ $headerTheme === 'Midnight Blue' ? 'checked' : '' }} onchange="this.form.submit()">
                            </div>
                            <div class="h-10 rounded-lg bg-gradient-to-r from-slate-950 via-blue-950 to-slate-900"></div>
                            <p class="text-[10px] text-slate-500">Gradien elegan gelap dengan kontras teks putih tajam.</p>
                        </label>

                        <label class="border-2 {{ $headerTheme === 'Ocean Turquoise' ? 'border-blue-900 bg-blue-50/50' : 'border-slate-200' }} rounded-2xl p-4 cursor-pointer block space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-900">Ocean Turquoise</span>
                                <input type="radio" name="header_theme" value="Ocean Turquoise" {{ $headerTheme === 'Ocean Turquoise' ? 'checked' : '' }} onchange="this.form.submit()">
                            </div>
                            <div class="h-10 rounded-lg bg-gradient-to-r from-slate-900 via-teal-950 to-slate-900"></div>
                            <p class="text-[10px] text-slate-500">Aksen maritim & wisata bahari modern.</p>
                        </label>

                        <label class="border-2 {{ $headerTheme === 'Heritage Warm' ? 'border-blue-900 bg-blue-50/50' : 'border-slate-200' }} rounded-2xl p-4 cursor-pointer block space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-900">Heritage Warm</span>
                                <input type="radio" name="header_theme" value="Heritage Warm" {{ $headerTheme === 'Heritage Warm' ? 'checked' : '' }} onchange="this.form.submit()">
                            </div>
                            <div class="h-10 rounded-lg bg-gradient-to-r from-slate-950 via-amber-950 to-slate-900"></div>
                            <p class="text-[10px] text-slate-500">Aksen hangat budaya Minangkabau.</p>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
