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

    <!-- Modal Form Edit Butir Landing Page -->
    <div id="modal-edit-landing" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs">
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-2xl space-y-5 w-full max-w-xl max-h-[90vh] overflow-y-auto animate-fade-in">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div>
                    <h3 id="modal-landing-title" class="text-base font-bold text-slate-900">Kelola Elemen Landing Page</h3>
                    <p class="text-xs text-slate-500">Ubah teks headline, deskripsi, tautan CTA, atau gambar elemen beranda.</p>
                </div>
                <button type="button" onclick="closeModalLanding();" class="text-slate-400 hover:text-slate-600 font-bold text-2xl leading-none">&times;</button>
            </div>

            <form id="form-landing" method="POST" action="{{ route('admin.landing.store') }}" class="space-y-4">
                @csrf
                <div id="method-container-landing"></div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Bagian Seksi (Section) *</label>
                        <select name="seksi" id="modal-landing-seksi" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            <option value="Hero Section">Hero Section</option>
                            <option value="Institusi & Yayasan">Institusi & Yayasan</option>
                            <option value="Prospek Karier">Prospek Karier</option>
                            <option value="Promosi SPMB">Promosi SPMB</option>
                            <option value="Footer Bawah">Footer Bawah</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nama Elemen / Parameter *</label>
                        <input name="parameter" id="modal-landing-param" type="text" required class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Teks Utama / Nilai Konten *</label>
                    <textarea name="konten" id="modal-landing-val" rows="3" required class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none"></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Teks Tombol Aksi (CTA Button)</label>
                        <input name="cta_text" id="modal-landing-cta" type="text" placeholder="Contoh: DAFTAR SEKARANG" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Tautan Target Tombol</label>
                        <input name="cta_link" id="modal-landing-link" type="text" value="/spmb-2026" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModalLanding();" class="px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold text-slate-600 hover:bg-slate-100">Batal</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-blue-900 text-white text-xs font-bold hover:bg-blue-800 shadow-md">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Hidden Form for Delete -->
    <form id="form-delete-landing" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- TABEL MANAJEMEN LENGKAP ELEMEN LANDING PAGE -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-base font-bold text-slate-900">Tabel Seluruh Elemen Landing Page Beranda</h2>
                <p class="text-xs text-slate-500">Semua teks, slogan, pilar, dan CTA yang aktif di halaman Beranda publik.</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-xs text-slate-500">Total Komponen:</span>
                <span class="px-2.5 py-1 rounded-md text-xs font-bold bg-blue-50 text-blue-900">{{ count($elements) }} Elemen Konten</span>
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
                    @forelse($elements as $item)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4 text-center font-bold text-slate-400">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-blue-50 text-blue-900">{{ $item->seksi }}</span>
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-900">{{ $item->parameter }}</td>
                            <td class="px-6 py-4 text-slate-700 leading-relaxed">{{ $item->konten }}</td>
                            <td class="px-6 py-4 font-bold text-blue-900">
                                @if($item->cta_text)
                                    {{ $item->cta_text }}
                                @else
                                    <span class="text-slate-400 font-normal">—</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">{{ $item->status ?? 'Aktif' }}</span>
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <button onclick="openLandingModal({{ $item->id }}, '{{ addslashes($item->seksi) }}', '{{ addslashes($item->parameter) }}', '{{ addslashes($item->konten) }}', '{{ addslashes($item->cta_text ?? '') }}', '{{ addslashes($item->cta_link ?? '') }}')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline mr-3">Sunting</button>
                                <button onclick="handleDeleteLanding({{ $item->id }}, '{{ addslashes($item->parameter) }}');" class="text-rose-600 hover:text-rose-700 font-bold hover:underline">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-slate-400">Belum ada elemen landing page.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function openModalTambahLanding() {
        document.getElementById('modal-landing-title').innerText = 'Tambah Elemen Landing Page Baru';
        const form = document.getElementById('form-landing');
        form.action = "{{ route('admin.landing.store') }}";
        document.getElementById('method-container-landing').innerHTML = '';

        document.getElementById('modal-landing-seksi').value = 'Hero Section';
        document.getElementById('modal-landing-param').value = '';
        document.getElementById('modal-landing-val').value = '';
        document.getElementById('modal-landing-cta').value = '';
        document.getElementById('modal-landing-link').value = '';
        document.getElementById('modal-edit-landing').classList.remove('hidden');
    }

    function openLandingModal(id, seksi, param, val, cta, link) {
        document.getElementById('modal-landing-title').innerText = 'Sunting: ' + param;
        const form = document.getElementById('form-landing');
        form.action = "/admin/landing/" + id;
        document.getElementById('method-container-landing').innerHTML = '@method("PUT")';

        document.getElementById('modal-landing-seksi').value = seksi;
        document.getElementById('modal-landing-param').value = param;
        document.getElementById('modal-landing-val').value = val;
        document.getElementById('modal-landing-cta').value = cta;
        document.getElementById('modal-landing-link').value = link || '';
        document.getElementById('modal-edit-landing').classList.remove('hidden');
    }

    function closeModalLanding() {
        document.getElementById('modal-edit-landing').classList.add('hidden');
    }

    function handleDeleteLanding(id, param) {
        notifyDelete('elemen landing "' + param + '"', function() {
            const form = document.getElementById('form-delete-landing');
            form.action = "/admin/landing/" + id;
            form.submit();
        });
    }
</script>
@endsection
