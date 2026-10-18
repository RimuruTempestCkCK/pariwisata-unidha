@extends('layouts.public')

@section('title', 'Kontak & Lokasi Kampus - S1 Pariwisata UNIDHA')
@section('meta_description', 'Kontak resmi, alamat, peta lokasi, media sosial, dan formulir konsultasi Program Studi S1 Pariwisata Universitas Dharma Andalas.')

@section('content')
<!-- Page Banner -->
<section class="bg-gradient-to-r from-slate-950 via-blue-950 to-slate-900 text-white py-16 sm:py-20 border-b border-slate-800 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <span class="inline-block px-3 py-1 rounded-full bg-amber-500/20 text-amber-400 text-xs font-bold uppercase tracking-wider mb-3">
            Layanan Informasi
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mb-4">
            Hubungi Kami
        </h1>
        <p class="text-slate-300 max-w-2xl text-base sm:text-lg">
            Kami siap menyambut dan melayani pertanyaan seputar program akademik, penerimaan mahasiswa baru, serta kerja sama kelembagaan.
        </p>
    </div>
</section>

<!-- Breadcrumb -->
@include('components.breadcrumb', ['items' => ['Kontak' => null]])

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 space-y-16">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        <!-- Informasi Kontak Resmi & Detail -->
        <div class="lg:col-span-5 space-y-8">
            <div>
                <span class="text-xs font-bold text-amber-600 tracking-wider uppercase block">Kontak Resmi</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Sekretariat Program Studi S1 Pariwisata</h2>
                <p class="text-slate-600 text-xs sm:text-sm mt-2">
                    Fakultas Ekonomi dan Bisnis, Universitas Dharma Andalas Padang.
                </p>
            </div>

            <!-- List Kontak -->
            <div class="space-y-5">
                <!-- Alamat -->
                <div class="flex items-start gap-4 p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                    <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Alamat Kampus</h3>
                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                            Jl. Sawahan No.103, Simpang Haru, Kec. Padang Timur, Kota Padang, Sumatera Barat 25000, Indonesia.
                        </p>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-start gap-4 p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-900 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Email Resmi</h3>
                        <p class="text-xs text-slate-600 mt-1">Hubungi surat elektronik kami untuk korespondensi resmi:</p>
                        <a href="mailto:pariwisata@unidha.ac.id" class="inline-block mt-1 text-sm font-bold text-blue-900 hover:text-amber-600 transition-colors">
                            pariwisata@unidha.ac.id
                        </a>
                    </div>
                </div>

                <!-- Instagram Prodi -->
                <div class="flex items-start gap-4 p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                    <div class="w-12 h-12 rounded-xl bg-pink-100 text-pink-700 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Instagram Program Studi</h3>
                        <p class="text-xs text-slate-600 mt-1">Ikuti kegiatan resmi perkuliahan dan prodi:</p>
                        <a href="https://instagram.com/s1pariwisata_unidha" target="_blank" rel="noopener noreferrer" class="inline-block mt-1 text-sm font-bold text-pink-600 hover:text-pink-700 transition-colors">
                            @s1pariwisata_unidha
                        </a>
                    </div>
                </div>

                <!-- Instagram HIMPAR -->
                <div class="flex items-start gap-4 p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                    <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Instagram HIMPAR UNIDHA</h3>
                        <p class="text-xs text-slate-600 mt-1">Aktivitas himpunan & kreasi mahasiswa:</p>
                        <a href="https://instagram.com/himpar.unidha" target="_blank" rel="noopener noreferrer" class="inline-block mt-1 text-sm font-bold text-purple-700 hover:text-purple-800 transition-colors">
                            @himpar.unidha
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulir Kontak (Frontend Only Presentation) -->
        <div class="lg:col-span-7">
            <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-sm space-y-6">
                <div>
                    <h3 class="text-xl font-bold text-slate-900">Kirim Pesan atau Pertanyaan</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">
                        Silakan tinggalkan pesan melalui formulir berikut untuk informasi pendaftaran, perkuliahan, atau kemitraan.
                    </p>
                </div>

                <form onsubmit="event.preventDefault(); alert('Terima kasih atas minat Anda. Fitur integrasi pengiriman pesan langsung sedang dalam tahap pengembangan CMS backend. Silakan gunakan tautan email langsung pariwisata@unidha.ac.id atau hubungi melalui Instagram resmi kami.');" class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap *</label>
                            <input type="text" required placeholder="Masukkan nama Anda" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Alamat Email *</label>
                            <input type="email" required placeholder="nama@email.com" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Nomor Telepon / WhatsApp</label>
                            <input type="tel" placeholder="08xxxxxxxxxx" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Kategori Kepentingan</label>
                            <select class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 bg-white">
                                <option>Informasi Pendaftaran SPMB</option>
                                <option>Informasi Kurikulum & Perkuliahan</option>
                                <option>Kerja Sama Industri / Magang</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Isi Pesan *</label>
                        <textarea rows="4" required placeholder="Tuliskan pesan atau pertanyaan Anda di sini..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500"></textarea>
                    </div>

                    <div class="p-3 rounded-lg bg-amber-50 border border-amber-200 text-xs text-amber-900">
                        <strong>Catatan:</strong> Formulir ini saat ini merupakan antarmuka (frontend). Untuk respons instan, silakan kirim email via <a href="mailto:pariwisata@unidha.ac.id" class="font-bold underline">pariwisata@unidha.ac.id</a>.
                    </div>

                    <button type="submit" class="w-full sm:w-auto px-8 py-3.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white font-bold text-sm shadow-md transition-all">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Peta Lokasi / Map Section -->
    <section class="space-y-4">
        <div>
            <h3 class="text-xl font-bold text-slate-900">Lokasi Kampus UNIDHA Padang</h3>
            <p class="text-xs text-slate-500">Jl. Sawahan No. 103, Simpang Haru, Kota Padang, Sumatera Barat</p>
        </div>

        <div class="w-full h-80 sm:h-96 rounded-3xl overflow-hidden border border-slate-300 shadow-md">
            <iframe 
                title="Peta Lokasi Kampus UNIDHA Padang"
                src="https://maps.google.com/maps?q=Universitas%20Dharma%20Andalas%20Padang&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                class="w-full h-full border-0" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>
</div>
@endsection
