@extends('admin.layouts.app')

@section('title', 'Pengaturan Website')

@section('admin_content')
<div class="space-y-8 max-w-5xl mx-auto">
    <div>
        <h1 class="text-2xl font-extrabold text-slate-900">Pengaturan Identitas & Kontak Website</h1>
        <p class="text-xs sm:text-sm text-slate-500 mt-1">
            Konfigurasi informasi kontak resmi, alamat, akun media sosial, dan status SPMB.
        </p>
    </div>

    <form onsubmit="event.preventDefault(); notifySuccess('Pengaturan website berhasil disimpan!');" class="space-y-6">
        <!-- Identitas Utama -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-4">
            <h2 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-3">Identitas Program Studi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nama Program Studi</label>
                    <input type="text" value="Program Studi S1 Pariwisata" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Perguruan Tinggi</label>
                    <input type="text" value="Universitas Dharma Andalas" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Fakultas Naungan</label>
                <input type="text" value="Fakultas Ekonomi dan Bisnis" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
            </div>
        </div>

        <!-- Kontak & Alamat -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-4">
            <h2 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-3">Kontak & Alamat Kampus</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Email Resmi</label>
                    <input type="email" value="pariwisata@unidha.ac.id" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Instagram Prodi</label>
                    <input type="text" value="@s1pariwisata_unidha" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Instagram HIMPAR</label>
                    <input type="text" value="@himpar.unidha" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Status SPMB</label>
                    <select class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                        <option selected>Pendaftaran Dibuka (SPMB 2026)</option>
                        <option>Pendaftaran Ditutup</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Alamat Lengkap</label>
                <textarea rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">Jl. Sawahan No.103, Simpang Haru, Kec. Padang Timur, Kota Padang, Sumatera Barat 25000, Indonesia.</textarea>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3">
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white text-xs font-bold shadow-md">
                Simpan Pengaturan
            </button>
        </div>
    </form>
</div>
@endsection
