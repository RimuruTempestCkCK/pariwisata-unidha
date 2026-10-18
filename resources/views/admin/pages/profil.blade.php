@extends('admin.layouts.app')

@section('title', 'Kelola Profil & Visi Misi')

@section('admin_content')
<div class="space-y-8 max-w-7xl mx-auto">
    <!-- Header with Action -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Kelola Informasi Profil & Visi Misi</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Daftar data identitas, slogan, visi, dan misi program studi dalam bentuk tabel manajemen konten.
            </p>
        </div>
        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('admin.pimpinan') }}" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-slate-950 text-xs font-bold shadow-xs transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <span>Kelola Foto & Pimpinan</span>
            </a>
            <a href="{{ route('profil') }}" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-50 text-xs font-bold transition-colors">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>Lihat Profil Publik</span>
            </a>
            <button onclick="openModalTambahProfil();" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white font-bold text-xs shadow-md transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>+ Tambah Butir Data</span>
            </button>
        </div>
    </div>

    <!-- Modal Form Edit/Sunting Butir Profil -->
    <div id="modal-edit-profil" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs">
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-2xl space-y-5 w-full max-w-xl max-h-[90vh] overflow-y-auto animate-fade-in">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div>
                    <h3 id="modal-title" class="text-base font-bold text-slate-900">Kelola Data Profil</h3>
                    <p class="text-xs text-slate-500">Perbarui isi konten profil yang akan ditampilkan di halaman /profil.</p>
                </div>
                <button type="button" onclick="closeModalProfil();" class="text-slate-400 hover:text-slate-600 font-bold text-2xl leading-none">&times;</button>
            </div>

            <form id="form-profil" method="POST" action="{{ route('admin.profil.store') }}" class="space-y-4">
                @csrf
                <div id="method-container-profil"></div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Kategori Bagian *</label>
                        <select name="kategori" id="modal-kategori" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            <option value="Identitas & Slogan">Identitas & Slogan</option>
                            <option value="Visi Program Studi">Visi Program Studi</option>
                            <option value="Misi Program Studi">Misi Program Studi</option>
                            <option value="Tata Kelola & Pimpinan">Tata Kelola & Pimpinan</option>
                            <option value="Tujuan & Sasaran">Tujuan & Sasaran</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nama Parameter / Label *</label>
                        <input name="label" id="modal-label" type="text" required placeholder="Contoh: Slogan Resmi / Visi..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Isi Konten / Pernyataan Teks *</label>
                    <textarea name="isi" id="modal-isi" rows="3" required placeholder="Tuliskan teks konten di sini..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Keterangan Tambahan / Jabatan</label>
                    <input name="keterangan" id="modal-keterangan" type="text" placeholder="Opsional: Ketua Program Studi, dll." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModalProfil();" class="px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold text-slate-600 hover:bg-slate-100">Batal</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-blue-900 text-white text-xs font-bold hover:bg-blue-800 shadow-md">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Hidden Form for Delete -->
    <form id="form-delete-profil" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- Tabel Data Profil & Visi Misi -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-base font-bold text-slate-900">Tabel Rincian Konten Halaman Profil</h2>
                <p class="text-xs text-slate-500">Seluruh butir informasi yang terstruktur di halaman profil program studi.</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-xs text-slate-500">Total Butir:</span>
                <span class="px-2.5 py-1 rounded-md text-xs font-bold bg-blue-50 text-blue-900">{{ count($profileItems) }} Komponen</span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 w-12 text-center">No</th>
                        <th class="px-6 py-4 w-44">Kategori Bagian</th>
                        <th class="px-6 py-4 w-48">Parameter</th>
                        <th class="px-6 py-4">Isi Konten / Pernyataan</th>
                        <th class="px-6 py-4 w-28 text-center">Status</th>
                        <th class="px-6 py-4 w-28 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse($profileItems as $item)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4 text-center font-bold text-slate-400">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-blue-50 text-blue-900">
                                    {{ $item->kategori }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-900">
                                {{ $item->label }}
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-700">
                                {{ $item->isi }}
                                @if($item->keterangan)
                                    <span class="block text-[11px] text-slate-400 mt-0.5">Ket: {{ $item->keterangan }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Tayang</span>
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <button onclick="editModal({{ $item->id }}, '{{ addslashes($item->kategori) }}', '{{ addslashes($item->label) }}', '{{ addslashes($item->isi) }}', '{{ addslashes($item->keterangan ?? '') }}');" class="text-blue-900 hover:text-amber-600 font-bold hover:underline mr-3">
                                    Sunting
                                </button>
                                <button onclick="handleDeleteProfil({{ $item->id }}, '{{ addslashes($item->label) }}');" class="text-rose-600 hover:text-rose-700 font-bold hover:underline">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-slate-400">Belum ada data profil.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function openModalTambahProfil() {
        document.getElementById('modal-title').innerText = 'Tambah Butir Data Profil';
        const form = document.getElementById('form-profil');
        form.action = "{{ route('admin.profil.store') }}";
        document.getElementById('method-container-profil').innerHTML = '';

        document.getElementById('modal-kategori').value = 'Identitas & Slogan';
        document.getElementById('modal-label').value = '';
        document.getElementById('modal-isi').value = '';
        document.getElementById('modal-keterangan').value = '';
        document.getElementById('modal-edit-profil').classList.remove('hidden');
    }

    function editModal(id, kategori, label, isi, keterangan) {
        document.getElementById('modal-title').innerText = 'Sunting: ' + label;
        const form = document.getElementById('form-profil');
        form.action = "/admin/profil/" + id;
        document.getElementById('method-container-profil').innerHTML = '@method("PUT")';

        document.getElementById('modal-kategori').value = kategori;
        document.getElementById('modal-label').value = label;
        document.getElementById('modal-isi').value = isi;
        document.getElementById('modal-keterangan').value = keterangan;
        document.getElementById('modal-edit-profil').classList.remove('hidden');
    }

    function closeModalProfil() {
        document.getElementById('modal-edit-profil').classList.add('hidden');
    }

    function handleDeleteProfil(id, label) {
        notifyDelete('butir profil "' + label + '"', function() {
            const form = document.getElementById('form-delete-profil');
            form.action = "/admin/profil/" + id;
            form.submit();
        });
    }
</script>
@endsection
