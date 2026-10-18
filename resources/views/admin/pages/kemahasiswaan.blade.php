@extends('admin.layouts.app')

@section('title', 'Kelola Kemahasiswaan & HIMPAR')

@section('admin_content')
<div class="space-y-8 max-w-5xl mx-auto">
    <!-- Header Page -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Kelola Konten Kemahasiswaan & HIMPAR</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Atur informasi organisasi kemahasiswaan HIMPAR, motto, profil kegiatan mahasiswa, dan tautan media sosial di halaman publik /kemahasiswaan.
            </p>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.kemahasiswaan.update') }}" class="space-y-6">
        @csrf

        <!-- Profil Himpunan Mahasiswa (HIMPAR) -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-4">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <span class="text-[11px] font-bold text-amber-600 uppercase tracking-wider block">Organisasi Kemahasiswaan</span>
                    <h2 class="text-base font-bold text-slate-900 mt-0.5">Identitas & Pengenalan HIMPAR UNIDHA</h2>
                </div>
                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-50 text-amber-800">HIMPAR</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nama Organisasi Mahasiswa</label>
                    <input type="text" name="himpar_name" value="{{ $settings['himpar_name'] ?? 'Himpunan Mahasiswa Pariwisata Dharma Andalas (HIMPAR)' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Akun Instagram HIMPAR</label>
                    <input type="text" name="social_himpar" value="{{ $settings['social_himpar'] ?? '@himpar.unidha' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Deskripsi Singkat / Profil HIMPAR</label>
                <textarea name="himpar_desc" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">{{ $settings['himpar_desc'] ?? 'HIMPAR UNIDHA merupakan wadah resmi pengembangan potensi, kreativitas, kepemimpinan, dan solidaritas mahasiswa Program Studi S1 Pariwisata Universitas Dharma Andalas. Aktif merancang agenda studi destinasi, pengabdian masyarakat, workshop hospitality, dan perayaan World Tourism Day.' }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Motto & Nilai Kemahasiswaan</label>
                <input type="text" name="himpar_motto" value="{{ $settings['himpar_motto'] ?? 'Solidaritas, Kreativitas, Integritas, dan Dedikasi untuk Kemajuan Kepariwisataan Ranah Minang.' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
            </div>
        </div>

        <!-- 3 Pilar Aktivitas Kemahasiswaan -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-4">
            <h2 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-3">3 Pilar Kegiatan & Eksplorasi Mahasiswa</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <span class="text-[10px] font-bold text-amber-600 uppercase">Pilar 1</span>
                    <label class="block text-xs font-bold text-slate-700">Judul Kegiatan 1</label>
                    <input type="text" name="kemahasiswaan_pilar1_title" value="{{ $settings['kemahasiswaan_pilar1_title'] ?? 'Studi Lapangan & Destinasi' }}" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">
                    <label class="block text-xs font-bold text-slate-700">Uraian Ringkas</label>
                    <textarea name="kemahasiswaan_pilar1_desc" rows="3" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">{{ $settings['kemahasiswaan_pilar1_desc'] ?? 'Eksplorasi destinasi unggulan di Sumatera Barat, observasi kelompok sadar wisata (pokdarwis), dan analisis potensi amenitas pariwisata lokal.' }}</textarea>
                </div>

                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <span class="text-[10px] font-bold text-blue-900 uppercase">Pilar 2</span>
                    <label class="block text-xs font-bold text-slate-700">Judul Kegiatan 2</label>
                    <input type="text" name="kemahasiswaan_pilar2_title" value="{{ $settings['kemahasiswaan_pilar2_title'] ?? 'Simulasi MICE & Event Kampus' }}" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">
                    <label class="block text-xs font-bold text-slate-700">Uraian Ringkas</label>
                    <textarea name="kemahasiswaan_pilar2_desc" rows="3" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">{{ $settings['kemahasiswaan_pilar2_desc'] ?? 'Praktik langsung bertindak sebagai organizing committee pada acara seminar, expo kampus, festival budaya Minangkabau, dan pertemuan ilmiah.' }}</textarea>
                </div>

                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <span class="text-[10px] font-bold text-emerald-800 uppercase">Pilar 3</span>
                    <label class="block text-xs font-bold text-slate-700">Judul Kegiatan 3</label>
                    <input type="text" name="kemahasiswaan_pilar3_title" value="{{ $settings['kemahasiswaan_pilar3_title'] ?? 'Pengabdian Masyarakat Wisata' }}" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">
                    <label class="block text-xs font-bold text-slate-700">Uraian Ringkas</label>
                    <textarea name="kemahasiswaan_pilar3_desc" rows="3" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">{{ $settings['kemahasiswaan_pilar3_desc'] ?? 'Pendampingan masyarakat desa wisata dalam hospitality dasar, kebersihan destinasi (Sapta Pesona), dan promosi digital melalui media sosial.' }}</textarea>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3">
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white text-xs font-bold shadow-md">
                Simpan Perubahan Kemahasiswaan
            </button>
        </div>
    </form>
</div>
@endsection
