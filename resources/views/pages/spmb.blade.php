@extends('layouts.public')

@section('title', 'Penerimaan Mahasiswa Baru SPMB 2026')
@section('meta_description', 'Informasi resmi Seleksi Penerimaan Mahasiswa Baru (SPMB) Tahun 2026 Program Studi S1 Pariwisata Universitas Dharma Andalas Padang.')

@section('content')
<!-- Page Banner -->
<section class="bg-gradient-to-r from-slate-950 via-blue-950 to-slate-900 text-white py-16 sm:py-20 border-b border-slate-800 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <span class="inline-block px-3 py-1 rounded-full bg-amber-500/20 text-amber-400 text-xs font-bold uppercase tracking-wider mb-3">
            Tahun Akademik 2026/2027
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mb-4">
            Penerimaan Mahasiswa Baru (SPMB 2026)
        </h1>
        <p class="text-slate-300 max-w-2xl text-base sm:text-lg">
            Awali langkah karier profesional Anda di industri perhotelan, MICE, dan destinasi pariwisata bersama Program Studi S1 Pariwisata UNIDHA Padang.
        </p>
    </div>
</section>

<!-- Breadcrumb -->
@include('components.breadcrumb', ['items' => ['SPMB 2026' => null]])

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 space-y-16">
    <!-- Highlight Callout -->
    <div class="bg-gradient-to-r from-amber-50 to-orange-50 border border-amber-200 rounded-3xl p-8 sm:p-10 flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="space-y-2 text-center md:text-left">
            <span class="px-3 py-1 rounded-full bg-amber-200 text-amber-900 font-bold text-xs uppercase tracking-wider">Pendaftaran Terbuka</span>
            <h2 class="text-2xl font-extrabold text-slate-900">Let's Go to Join With Us!</h2>
            <p class="text-slate-600 text-xs sm:text-sm max-w-xl">
                Jadilah bagian dari generasi muda kreatif yang siap menyongsong revolusi kepariwisataan masa depan bersama Universitas Dharma Andalas.
            </p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <a href="mailto:pariwisata@unidha.ac.id?subject=Informasi%20Pendaftaran%20SPMB%202026" class="px-6 py-3.5 rounded-xl font-bold text-sm bg-blue-900 text-white hover:bg-blue-800 text-center transition-colors shadow-md">
                Konsultasi Pendaftaran
            </a>
            <a href="{{ route('kontak') }}" class="px-6 py-3.5 rounded-xl font-bold text-sm bg-white text-slate-800 border border-slate-300 hover:bg-slate-50 text-center transition-colors">
                Kunjungi Kampus
            </a>
        </div>
    </div>

    <!-- Jalur Penerimaan -->
    <section class="space-y-6">
        <div>
            <span class="text-xs font-bold text-blue-900 tracking-wider uppercase block">Pilihan Jalur Masuk</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Jalur Pendaftaran Calon Mahasiswa</h2>
            <p class="text-slate-600 text-xs sm:text-sm mt-1">
                Tersedia berbagai pilihan jalur seleksi yang disesuaikan dengan latar belakang calon pendaftar:
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-900 flex items-center justify-center font-bold">
                    A
                </div>
                <h3 class="font-bold text-slate-900 text-base">Jalur Reguler / Tes</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Terbuka untuk lulusan SMA/SMK/MA seluruh jurusan dengan seleksi potensi akademik dan wawancara minat bakat pariwisata.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-lg bg-amber-100 text-amber-800 flex items-center justify-center font-bold">
                    B
                </div>
                <h3 class="font-bold text-slate-900 text-base">Jalur Prestasi & Nilai Rapor</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Bagi siswa berprestasi di bidang akademik, olahraga, seni budaya, bahasa asing, atau kepemimpinan organisasi selama di sekolah menengah.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold">
                    C
                </div>
                <h3 class="font-bold text-slate-900 text-base">Jalur Pindahan & Alih Jenjang</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Khusus bagi mahasiswa pindahan perguruan tinggi atau lulusan Diploma (D3) Pariwisata / Perhotelan yang ingin melanjutkan ke jenjang S1 Sarjana.
                </p>
            </div>
        </div>
    </section>

    <!-- Persyaratan Umum & Alur Pendaftaran -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        <div class="lg:col-span-6 bg-white rounded-3xl p-8 border border-slate-200 shadow-sm space-y-4">
            <h3 class="text-lg font-bold text-slate-900">Persyaratan Berkas Umum</h3>
            <ul class="text-xs sm:text-sm text-slate-600 space-y-3">
                <li class="flex items-start gap-2.5">
                    <svg class="w-4 h-4 text-emerald-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Salinan Ijazah atau Surat Keterangan Lulus (SKL) SMA/SMK/MA sederajat yang telah dilegalisir.</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <svg class="w-4 h-4 text-emerald-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Salinan Kartu Keluarga (KK) dan Kartu Tanda Penduduk (KTP) pendaftar.</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <svg class="w-4 h-4 text-emerald-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Pasfoto formal berwarna terbaru (ukuran 3x4).</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <svg class="w-4 h-4 text-emerald-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Sertifikat prestasi pendukung (opsional bagi jalur prestasi).</span>
                </li>
            </ul>
        </div>

        <div class="lg:col-span-6 bg-white rounded-3xl p-8 border border-slate-200 shadow-sm space-y-4">
            <h3 class="text-lg font-bold text-slate-900">Alur Pendaftaran Singkat</h3>
            <div class="space-y-4 text-xs sm:text-sm">
                <div class="flex items-start gap-3">
                    <span class="w-6 h-6 rounded-full bg-blue-900 text-white flex items-center justify-center text-xs font-bold shrink-0">1</span>
                    <div>
                        <strong class="text-slate-900 block">Konsultasi / Registrasi Formulir</strong>
                        <span class="text-slate-500">Menghubungi panitia atau mengisi formulir pendaftaran di sekretariat kampus UNIDHA Padang.</span>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <span class="w-6 h-6 rounded-full bg-blue-900 text-white flex items-center justify-center text-xs font-bold shrink-0">2</span>
                    <div>
                        <strong class="text-slate-900 block">Verifikasi Berkas & Wawancara</strong>
                        <span class="text-slate-500">Penyerahan dokumen persyaratan dan sesi wawancara minat kepariwisataan.</span>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <span class="w-6 h-6 rounded-full bg-blue-900 text-white flex items-center justify-center text-xs font-bold shrink-0">3</span>
                    <div>
                        <strong class="text-slate-900 block">Pengumuman & Registrasi Ulang</strong>
                        <span class="text-slate-500">Mendapatkan surat tanda penerimaan dan melakukan registrasi ulang sebagai mahasiswa baru UNIDHA.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Placeholder Transparansi Biaya & Jadwal -->
    <div class="p-6 rounded-2xl bg-slate-100 border border-slate-200 text-xs sm:text-sm text-slate-600 space-y-2">
        <div class="flex items-center gap-2 text-slate-900 font-bold">
            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>Informasi Biaya Kuliah & Gelombang Pendaftaran:</span>
        </div>
        <p>
            Rincian resmi biaya kuliah (SPP/BPP), potongan beasiswa, serta tanggal penutupan per gelombang penerimaan SPMB 2026 mengikuti ketentuan Surat Keputusan Rektor Universitas Dharma Andalas. Silakan hubungi langsung panitia penerimaan melalui email <a href="mailto:pariwisata@unidha.ac.id" class="text-blue-900 font-semibold underline">pariwisata@unidha.ac.id</a> atau datang langsung ke Gedung Rektorat UNIDHA, Jl. Sawahan No. 103 Padang.
        </p>
    </div>
</div>
@endsection
