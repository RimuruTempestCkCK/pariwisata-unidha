@extends('admin.layouts.app')

@section('title', 'Kelola Konten Beranda (Landing Page)')

@section('admin_content')
<div class="space-y-8 max-w-7xl mx-auto">
    <!-- Header Page -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Kelola Konten Landing Page (Beranda)</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Atur seluruh teks, headline, slogan, pengenalan institusi, 3 pilar prospek karier, dan banner promosi SPMB di Beranda publik.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-50 text-xs font-bold transition-colors">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>Lihat Beranda Publik</span>
            </a>
            <button onclick="openModalTambahLanding();" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white font-bold text-xs shadow-md transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>+ Tambah Elemen Landing</span>
            </button>
        </div>
    </div>

    <!-- Quick Navigation Tabs by Section -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 border-b border-slate-200 text-xs font-bold">
        <button class="px-4 py-2 rounded-xl bg-blue-900 text-white whitespace-nowrap shadow-xs">Semua Bagian Beranda (10 Butir)</button>
        <button onclick="alert('Filter Hero Section');" class="px-4 py-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 whitespace-nowrap">Hero & Slogan</button>
        <button onclick="alert('Filter Institusi UNIDHA');" class="px-4 py-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 whitespace-nowrap">Pengenalan UNIDHA</button>
        <button onclick="alert('Filter Prospek Karier');" class="px-4 py-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 whitespace-nowrap">3 Pilar Prospek Karier</button>
        <button onclick="alert('Filter Banner Promosi SPMB');" class="px-4 py-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 whitespace-nowrap">Promosi SPMB 2026</button>
    </div>

    <!-- Modal Form Edit Butir Landing Page (Pop Up Template) -->
    <div id="modal-edit-landing" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs">
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-2xl space-y-5 w-full max-w-xl max-h-[90vh] overflow-y-auto animate-fade-in">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div>
                    <h3 id="modal-landing-title" class="text-base font-bold text-slate-900">Sunting Bagian Landing Page</h3>
                    <p class="text-xs text-slate-500">Ubah teks headline, deskripsi, tautan CTA, atau gambar elemen beranda.</p>
                </div>
                <button type="button" onclick="closeModalLanding();" class="text-slate-400 hover:text-slate-600 font-bold text-2xl leading-none">&times;</button>
            </div>

            <form onsubmit="handleFormLanding(event);" class="space-y-4">
                <input type="hidden" id="modal-landing-mode" value="edit">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Bagian Seksi (Section) *</label>
                        <select id="modal-landing-seksi" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            <option value="Hero Section">Hero Section</option>
                            <option value="Institusi & Yayasan">Institusi & Yayasan</option>
                            <option value="Prospek Karier">Prospek Karier</option>
                            <option value="Promosi SPMB">Promosi SPMB</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nama Elemen / Parameter *</label>
                        <input id="modal-landing-param" type="text" required class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Teks Utama / Nilai Konten *</label>
                    <textarea id="modal-landing-val" rows="3" required class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none"></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Teks Tombol Aksi (CTA Button)</label>
                        <input id="modal-landing-cta" type="text" placeholder="Contoh: JOIN US SEKARANG" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Tautan Target Tombol</label>
                        <input id="modal-landing-link" type="text" value="/spmb-2026" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModalLanding();" class="px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold text-slate-600 hover:bg-slate-100">Batal</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-blue-900 text-white text-xs font-bold hover:bg-blue-800 shadow-md">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- TABEL MANAJEMEN LENGKAP ELEMEN LANDING PAGE -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-base font-bold text-slate-900">Tabel Seluruh Elemen Landing Page Beranda</h2>
                <p class="text-xs text-slate-500">Semua teks, slogan, pilar, dan CTA yang aktif di halaman Beranda publik.</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-xs text-slate-500">Total Komponen:</span>
                <span class="px-2.5 py-1 rounded-md text-xs font-bold bg-blue-50 text-blue-900">10 Elemen Konten</span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 w-12 text-center">No</th>
                        <th class="px-6 py-4 w-44">Bagian Seksi</th>
                        <th class="px-6 py-4 w-48">Elemen / Parameter</th>
                        <th class="px-6 py-4">Isi Konten di Beranda</th>
                        <th class="px-6 py-4 w-36">Tombol / Link</th>
                        <th class="px-6 py-4 w-28 text-center">Status</th>
                        <th class="px-6 py-4 w-28 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <!-- 1. Hero Headline Badge -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">1</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-amber-50 text-amber-800">Hero Section</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">Hero Headline Tag</td>
                        <td class="px-6 py-4 font-semibold text-amber-600">“Let's Go to Join With Us”</td>
                        <td class="px-6 py-4 text-slate-400">—</td>
                        <td class="px-6 py-4 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Aktif</span></td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="openLandingModal('Hero Section', 'Hero Headline Tag', 'Let\'s Go to Join With Us', '')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">Sunting</button>
                        </td>
                    </tr>

                    <!-- 2. Hero Title & Slogan -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">2</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-amber-50 text-amber-800">Hero Section</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">Slogan Utama Hero</td>
                        <td class="px-6 py-4 font-medium italic text-slate-700">“Creating Memories, Inspiring Journey, And Connecting Cultures, Creating Futures”</td>
                        <td class="px-6 py-4 text-slate-400">—</td>
                        <td class="px-6 py-4 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Aktif</span></td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="openLandingModal('Hero Section', 'Slogan Utama Hero', 'Creating Memories, Inspiring Journey, And Connecting Cultures, Creating Futures', '')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">Sunting</button>
                        </td>
                    </tr>

                    <!-- 3. Hero Subtitle / Deskripsi -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">3</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-amber-50 text-amber-800">Hero Section</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">Deskripsi Pengantar Hero</td>
                        <td class="px-6 py-4 text-slate-600 leading-relaxed">Mempersiapkan sarjana pariwisata yang visioner, kompeten, dan siap memimpin industri pariwisata nasional maupun internasional melalui kurikulum terapan, praktik langsung, dan jejaring industri hospitality.</td>
                        <td class="px-6 py-4 font-bold text-blue-900">JOIN US & Profil</td>
                        <td class="px-6 py-4 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Aktif</span></td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="openLandingModal('Hero Section', 'Deskripsi Pengantar Hero', 'Mempersiapkan sarjana pariwisata yang visioner, kompeten, dan siap memimpin industri pariwisata nasional maupun internasional melalui kurikulum terapan, praktik langsung, dan jejaring industri hospitality.', 'JOIN US SEKARANG')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">Sunting</button>
                        </td>
                    </tr>

                    <!-- 4. Hero Visual Card Destinasi -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">4</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-amber-50 text-amber-800">Hero Section</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">Visual Card Destinasi</td>
                        <td class="px-6 py-4 text-slate-700">Foto Lanskap Pariwisata & Teks: “Membangun Masa Depan Pariwisata Indonesia - Menghubungkan potensi pariwisata Minangkabau dengan standar global.”</td>
                        <td class="px-6 py-4 text-emerald-700 font-semibold">Badge Industri</td>
                        <td class="px-6 py-4 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Aktif</span></td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.banner-logo') }}" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">Ganti di Banner</a>
                        </td>
                    </tr>

                    <!-- 5. Pengenalan UNIDHA & Yayasan -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">5</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-blue-50 text-blue-900">Institusi & Yayasan</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">Pengenalan UNIDHA</td>
                        <td class="px-6 py-4 text-slate-600 leading-relaxed">Universitas Dharma Andalas & Yayasan Pendidikan Dharma Andalas di Jl. Sawahan No.103 Padang berkomitmen mencetak SDM unggul di sektor pariwisata Sumatera Barat.</td>
                        <td class="px-6 py-4 text-slate-500">3 Poin Unggulan</td>
                        <td class="px-6 py-4 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Aktif</span></td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="openLandingModal('Institusi & Yayasan', 'Pengenalan UNIDHA', 'Program Studi S1 Pariwisata diselenggarakan di bawah naungan Universitas Dharma Andalas (UNIDHA) yang berlokasi strategis di Jl. Sawahan No. 103, Simpang Haru, Kota Padang...', '')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">Sunting</button>
                        </td>
                    </tr>

                    <!-- 6. Pilar Karier 1 -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">6</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-purple-50 text-purple-800">Prospek Karier</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">Pilar 01: Perhotelan & MICE</td>
                        <td class="px-6 py-4 text-slate-600 leading-relaxed">Sektor Perhotelan, Akomodasi, & MICE: Karier sebagai Hotel Manager, Food & Beverage Specialist, Event Organizer, Banquet Planner, hingga pengelola resort internasional.</td>
                        <td class="px-6 py-4 text-slate-500">Badge Pilar 01</td>
                        <td class="px-6 py-4 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Aktif</span></td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="openLandingModal('Prospek Karier', 'Pilar 01: Perhotelan & MICE', 'Karier sebagai Hotel Manager, Food & Beverage Specialist, Event & Convention Organizer, Banquet Planner, hingga pengelola resort mewah berstandar internasional.', '')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">Sunting</button>
                        </td>
                    </tr>

                    <!-- 7. Pilar Karier 2 -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">7</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-purple-50 text-purple-800">Prospek Karier</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">Pilar 02: Tour & Destinasi</td>
                        <td class="px-6 py-4 text-slate-600 leading-relaxed">Industri Perjalanan, Tour & Destinasi: Profesional perancang tur, konsultan travel & trip planner, pengembang desa wisata, dan manajer destinasi ekowisata.</td>
                        <td class="px-6 py-4 text-slate-500">Badge Pilar 02</td>
                        <td class="px-6 py-4 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Aktif</span></td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="openLandingModal('Prospek Karier', 'Pilar 02: Tour & Destinasi', 'Profesional perancang tur, konsultan travel & trip planner, pengembang desa wisata, manajer destinasi ekowisata, serta entrepreneur di bidang pariwisata kreatif.', '')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">Sunting</button>
                        </td>
                    </tr>

                    <!-- 8. Pilar Karier 3 -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">8</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-purple-50 text-purple-800">Prospek Karier</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">Pilar 03: Pemerintah & Akademisi</td>
                        <td class="px-6 py-4 text-slate-600 leading-relaxed">Instansi Pemerintah & Akademisi: Birokrat di Kementerian Pariwisata, Dinas Pariwisata Daerah, analis kebijakan kepariwisataan, peneliti, dan pengajar.</td>
                        <td class="px-6 py-4 text-slate-500">Badge Pilar 03</td>
                        <td class="px-6 py-4 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Aktif</span></td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="openLandingModal('Prospek Karier', 'Pilar 03: Pemerintah & Akademisi', 'Birokrat di Kementerian Pariwisata, Dinas Pariwisata Daerah, analis kebijakan kepariwisataan, peneliti, pengajar, serta konsultan pengembangan aset wilayah.', '')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">Sunting</button>
                        </td>
                    </tr>

                    <!-- 9. Warta & Berita Terbaru Feed -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">9</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-sky-50 text-sky-800">Berita Beranda</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">Section Berita & Artikel</td>
                        <td class="px-6 py-4 text-slate-600 leading-relaxed">Menampilkan 3 warta terbaru secara otomatis dari modul berita prodi.</td>
                        <td class="px-6 py-4 font-bold text-blue-900">Lihat Semua Berita</td>
                        <td class="px-6 py-4 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Otomatis</span></td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.berita') }}" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">Kelola Berita</a>
                        </td>
                    </tr>

                    <!-- 10. Promosi SPMB 2026 -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">10</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-amber-50 text-amber-800">Promosi SPMB</span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">Banner Penerimaan SPMB 2026</td>
                        <td class="px-6 py-4 text-slate-600 leading-relaxed">“Wujudkan Cita-cita Karier Pariwisata Anda Bersama UNIDHA” — Dapatkan fasilitas belajar terintegrasi, dosen praktisi, dan kesempatan magang hotel bintang lima.</td>
                        <td class="px-6 py-4 font-bold text-amber-700">Daftar SPMB & Kontak</td>
                        <td class="px-6 py-4 text-center"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Aktif</span></td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="openLandingModal('Promosi SPMB', 'Banner Penerimaan SPMB 2026', 'Wujudkan Cita-cita Karier Pariwisata Anda Bersama UNIDHA. Bergabunglah bersama keluarga besar Program Studi S1 Pariwisata Universitas Dharma Andalas...', 'Informasi Pendaftaran SPMB')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">Sunting</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function openModalTambahLanding() {
        document.getElementById('modal-landing-title').innerText = 'Tambah Elemen Landing Page Baru';
        document.getElementById('modal-landing-mode').value = 'tambah';
        document.getElementById('modal-landing-seksi').value = 'Hero Section';
        document.getElementById('modal-landing-param').value = '';
        document.getElementById('modal-landing-val').value = '';
        document.getElementById('modal-landing-cta').value = '';
        document.getElementById('modal-landing-link').value = '';
        document.getElementById('modal-edit-landing').classList.remove('hidden');
    }

    function openLandingModal(seksi, param, val, cta) {
        document.getElementById('modal-landing-title').innerText = 'Sunting: ' + param;
        document.getElementById('modal-landing-mode').value = 'edit';
        document.getElementById('modal-landing-seksi').value = seksi;
        document.getElementById('modal-landing-param').value = param;
        document.getElementById('modal-landing-val').value = val;
        document.getElementById('modal-landing-cta').value = cta;
        document.getElementById('modal-edit-landing').classList.remove('hidden');
    }

    function closeModalLanding() {
        document.getElementById('modal-edit-landing').classList.add('hidden');
    }

    function handleFormLanding(e) {
        e.preventDefault();
        const mode = document.getElementById('modal-landing-mode').value;
        closeModalLanding();
        if (mode === 'tambah') {
            notifySuccess('Elemen beranda baru berhasil ditambahkan!');
        } else {
            notifySuccess('Perubahan elemen landing page berhasil disimpan!');
        }
    }
</script>
@endsection
