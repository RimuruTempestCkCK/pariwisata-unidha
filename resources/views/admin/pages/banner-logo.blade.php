@extends('admin.layouts.app')

@section('title', 'Kelola Logo & Banner Website')

@section('admin_content')
<div class="space-y-8 max-w-6xl mx-auto">
    <!-- Header Page -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Kelola Logo & Banner Website</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Atur logo utama website, favicon, banner hero beranda, serta banner halaman informasi publik.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <button onclick="alert('Pengaturan Logo & Banner berhasil disimpan!');" class="px-5 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white text-xs font-bold shadow-md transition-all">
                Simpan Semua Perubahan
            </button>
        </div>
    </div>

    <!-- Live Preview Alert Note -->
    <div class="p-4 rounded-2xl bg-blue-50 border border-blue-200 text-xs text-blue-900 flex items-start gap-3">
        <svg class="w-5 h-5 text-blue-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <div>
            <strong class="block font-bold mb-0.5">Pengaturan Aset Visual Website</strong>
            <span>Pilih berkas baru dari komputer atau masukkan URL gambar. Pratinjau langsung memperlihatkan bagaimana logo & banner tampil di header dan hero section website publik.</span>
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
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-sky-900 via-blue-800 to-amber-600 flex items-center justify-center text-white shadow-md shrink-0">
                            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-[11px] font-bold tracking-wider uppercase text-amber-600">S1 PARIWISATA</span>
                            <span class="block text-xs font-extrabold text-slate-900 leading-tight">UNIVERSITAS DHARMA ANDALAS</span>
                            <span class="block text-[10px] text-slate-400">Padang, Sumatera Barat</span>
                        </div>
                    </div>
                </div>

                <!-- Upload Form Logo -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Unggah Berkas Logo Baru</label>
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-300 border-dashed rounded-2xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition-colors">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-4">
                                    <svg class="w-8 h-8 mb-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                    <p class="text-xs text-slate-600 font-semibold">Pilih file logo atau seret ke sini</p>
                                    <p class="text-[10px] text-slate-400 mt-1">PNG, JPG, SVG atau WebP (Disarankan latar transparan, maks. 2MB)</p>
                                </div>
                                <input type="file" accept="image/*" class="hidden" onchange="alert('Berkas logo dipilih: ' + this.files[0].name + ' (Simulasi Mockup)')">
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Teks Alt / Deskripsi Logo</label>
                        <input type="text" value="Logo Resmi S1 Pariwisata Universitas Dharma Andalas" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>

                    <!-- Favicon -->
                    <div class="pt-4 border-t border-slate-100 space-y-2">
                        <label class="block text-xs font-bold text-slate-700">Favicon Browser (.ico / .png)</label>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-900 text-white flex items-center justify-center text-xs font-bold shadow-xs">
                                U
                            </div>
                            <input type="file" accept="image/x-icon,image/png" class="text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-900 hover:file:bg-blue-100 cursor-pointer">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEKSI 2: KELOLA BANNER WEB -->
        <div class="lg:col-span-7 space-y-6">
            <!-- Banner Hero Beranda -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-6">
                <div class="border-b border-slate-100 pb-3">
                    <span class="text-[11px] font-bold text-blue-900 uppercase tracking-wider block">Visual Hero Section</span>
                    <h2 class="text-lg font-bold text-slate-900 mt-0.5">Banner Utama Beranda (Hero Banner)</h2>
                    <p class="text-xs text-slate-500">Foto kartu visual destinasi & pariwisata yang tampil di sebelah kanan Hero Beranda.</p>
                </div>

                <!-- Preview Banner Aktif -->
                <div class="space-y-2">
                    <div class="flex items-center justify-between text-xs font-bold text-slate-700">
                        <span>Pratinjau Banner Hero Beranda Saat Ini</span>
                        <span class="text-[11px] text-emerald-600 font-semibold">Rasio 16:9 / 4:3</span>
                    </div>
                    <div class="relative rounded-2xl overflow-hidden border border-slate-200 shadow-md h-52 sm:h-64 bg-slate-950">
                        <img id="banner-hero-img" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80" alt="Preview Banner Hero" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 text-white">
                            <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-amber-500 text-slate-950 mb-1">
                                Kampus Unggulan
                            </span>
                            <p class="text-xs sm:text-sm font-bold text-white">Membangun Masa Depan Pariwisata Indonesia</p>
                            <p class="text-[10px] sm:text-xs text-slate-300">Menghubungkan potensi pariwisata Minangkabau dengan standar global.</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-4" x-data="{
                    activeAdminSlide: 0,
                    adminSlides: [
                        { id: 1, title: 'Membangun Masa Depan Pariwisata Indonesia', tag: 'Kampus Unggulan', url: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1000&q=80', desc: 'Menghubungkan potensi pariwisata daerah Minangkabau dengan standar industri global.' },
                        { id: 2, title: 'Manajemen Perhotelan & Event Internasional', tag: 'Hospitality & MICE', url: 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1000&q=80', desc: 'Praktik industri perhotelan bintang lima, MICE, dan perencanaan acara profesional.' },
                        { id: 3, title: 'Eksplorasi Destinasi & Sustainable Tourism', tag: 'Tour & Travel', url: 'https://images.unsplash.com/photo-1533105079780-92b9be482077?auto=format&fit=crop&w=1000&q=80', desc: 'Mengembangkan ekowisata berkelanjutan dan kepemanduan wisata bertaraf dunia.' },
                        { id: 4, title: 'Beasiswa & Jalur Prestasi Pariwisata', tag: 'SPMB 2026', url: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1000&q=80', desc: 'Raih gelar Sarjana Pariwisata (S.Par.) bersama pengajar berkompeten dan jaringan alumni luas.' }
                    ]
                }">
                    <!-- Slider Item Selector Pills -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2">Pilih Slide Banner yang Ingin Diatur:</label>
                        <div class="flex flex-wrap gap-2">
                            <template x-for="(s, idx) in adminSlides" :key="s.id">
                                <button type="button" 
                                        @click="activeAdminSlide = idx" 
                                        class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all border"
                                        :class="activeAdminSlide === idx ? 'bg-blue-900 border-blue-900 text-white shadow-xs' : 'bg-slate-50 border-slate-200 text-slate-700 hover:bg-slate-100'">
                                    <span x-text="'Slide ' + (idx + 1) + ': ' + s.tag"></span>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Selected Slide Form -->
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Unggah Berkas Gambar Baru</label>
                                <input type="file" accept="image/*" onchange="notifySuccess('Berkas gambar banner baru dipilih!')" class="w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-100 file:text-blue-900 hover:file:bg-blue-200 cursor-pointer border border-slate-200 rounded-xl p-1 bg-white">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Atau Gunakan Tautan URL Gambar</label>
                                <input type="url" x-model="adminSlides[activeAdminSlide].url" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Judul Slide Banner</label>
                                <input type="text" x-model="adminSlides[activeAdminSlide].title" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Badge Tag / Kategori</label>
                                <input type="text" x-model="adminSlides[activeAdminSlide].tag" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Deskripsi Singkat Banner</label>
                            <input type="text" x-model="adminSlides[activeAdminSlide].desc" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                        </div>

                        <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-200">
                            <button type="button" @click="notifySuccess('Perubahan Slide ' + (activeAdminSlide + 1) + ' berhasil disimpan!')" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition-all shadow-xs">
                                Perbarui Slide Ini
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banner Halaman Header Halaman Publik (Profil, Akademik, Berita) -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-5">
                <div class="border-b border-slate-100 pb-3">
                    <span class="text-[11px] font-bold text-blue-900 uppercase tracking-wider block">Banner Halaman Dalam</span>
                    <h2 class="text-lg font-bold text-slate-900 mt-0.5">Banner Header Halaman (Profil, Akademik, Kontak)</h2>
                    <p class="text-xs text-slate-500">Gaya tema visual banner header untuk seluruh sub-halaman publik.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <label class="border-2 border-blue-900 rounded-2xl p-4 cursor-pointer bg-blue-50/50 block space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-blue-950">Midnight Blue (Aktif)</span>
                            <input type="radio" name="header_theme" checked class="text-blue-900">
                        </div>
                        <div class="h-10 rounded-lg bg-gradient-to-r from-slate-950 via-blue-950 to-slate-900"></div>
                        <p class="text-[10px] text-slate-500">Gradien elegan gelap dengan kontras teks putih tajam.</p>
                    </label>

                    <label class="border border-slate-200 rounded-2xl p-4 cursor-pointer hover:border-slate-300 block space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-900">Ocean Turquoise</span>
                            <input type="radio" name="header_theme" class="text-blue-900">
                        </div>
                        <div class="h-10 rounded-lg bg-gradient-to-r from-slate-900 via-teal-950 to-slate-900"></div>
                        <p class="text-[10px] text-slate-500">Aksen maritim & wisata bahari modern.</p>
                    </label>

                    <label class="border border-slate-200 rounded-2xl p-4 cursor-pointer hover:border-slate-300 block space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-900">Heritage Warm</span>
                            <input type="radio" name="header_theme" class="text-blue-900">
                        </div>
                        <div class="h-10 rounded-lg bg-gradient-to-r from-slate-950 via-amber-950 to-slate-900"></div>
                        <p class="text-[10px] text-slate-500">Aksen hangat budaya Minangkabau.</p>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
