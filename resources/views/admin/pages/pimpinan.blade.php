@extends('admin.layouts.app')

@section('title', 'Kelola Tata Kelola & Pimpinan')

@section('admin_content')
<div class="space-y-8 max-w-7xl mx-auto">
    <!-- Header with Action -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Kelola Tata Kelola & Pimpinan</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Atur judul seksi pengantar, data pimpinan (Kaprodi, Dekan, Rektor), gelar, jabatan, foto potret, dan urutan tampilan di halaman /profil.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('profil') }}#tata-kelola" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-50 text-xs font-bold transition-colors">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>Lihat di Halaman Profil</span>
            </a>
            <button onclick="openModalTambahPimpinan();" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white font-bold text-xs shadow-md transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>+ Tambah Pimpinan / Dosen</span>
            </button>
        </div>
    </div>

    <!-- 1. Form Edit Header & Pengantar Seksi -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-5">
        <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold text-amber-600 uppercase tracking-wider block">Pengantar Seksi</span>
                <h2 class="text-base font-bold text-slate-900 mt-0.5">Judul & Deskripsi Tata Kelola & Pimpinan</h2>
            </div>
            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-50 text-amber-800">Heading Halaman</span>
        </div>

        <form method="POST" action="{{ route('admin.pimpinan.header') }}" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Eyebrow / Subjudul Atas *</label>
                    <input type="text" name="pimpinan_eyebrow" value="{{ $settings['pimpinan_eyebrow'] ?? 'Tata Kelola & Pengajar' }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Judul Utama Seksi *</label>
                    <input type="text" name="pimpinan_title" value="{{ $settings['pimpinan_title'] ?? 'Pengelola Program Studi & Pimpinan' }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Deskripsi Pengantar Seksi *</label>
                <textarea name="pimpinan_desc" rows="2" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">{{ $settings['pimpinan_desc'] ?? 'Didukung oleh tenaga pendidik akademisi dan praktisi profesional di bidang manajemen kepariwisataan, perhotelan, dan destinasi.' }}</textarea>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold text-xs shadow-md transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Simpan Pengantar Seksi</span>
                </button>
            </div>
        </form>
    </div>

    <!-- 2. Daftar Pimpinan & Pengajar -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <span class="text-[11px] font-bold text-blue-600 uppercase tracking-wider block">Daftar Pimpinan</span>
                <h2 class="text-base font-bold text-slate-900 mt-0.5">Struktur Pejabat & Pimpinan Akademik</h2>
            </div>
            <span class="text-xs font-bold px-3 py-1 bg-slate-100 text-slate-600 rounded-full">
                Total: {{ $pimpinanItems->count() }} Orang
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase font-bold tracking-wider border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4 w-14 text-center">Urutan</th>
                        <th class="py-3 px-4 w-24 text-center">Foto</th>
                        <th class="py-3 px-4">Jabatan / Peran</th>
                        <th class="py-3 px-4">Nama Lengkap & Gelar</th>
                        <th class="py-3 px-4">Keterangan / Badge</th>
                        <th class="py-3 px-4 w-28 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($pimpinanItems as $p)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-4 px-4 text-center font-bold text-slate-500">{{ $p->order }}</td>
                            <td class="py-4 px-4 text-center">
                                @if($p->foto)
                                    <img src="{{ $p->foto }}" alt="{{ $p->isi }}" class="w-12 h-12 rounded-full object-cover mx-auto border-2 border-amber-400 shadow-xs">
                                @else
                                    <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-400 mx-auto flex items-center justify-center border-2 border-dashed border-slate-300">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                    </div>
                                @endif
                            </td>
                            <td class="py-4 px-4">
                                <span class="inline-block px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-50 text-blue-900 border border-blue-200">
                                    {{ $p->label }}
                                </span>
                            </td>
                            <td class="py-4 px-4 font-bold text-slate-900 text-sm">
                                {{ $p->isi }}
                            </td>
                            <td class="py-4 px-4 text-slate-600">
                                @if($p->keterangan)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md bg-amber-50 text-amber-800 text-[11px] font-medium border border-amber-200">
                                        {{ $p->keterangan }}
                                    </span>
                                @else
                                    <span class="text-slate-400 italic">-</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    <button onclick="openModalEditPimpinan({{ json_encode($p) }});" class="p-1.5 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition-colors" title="Edit Pimpinan">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </button>
                                    <button type="button" onclick="confirmDeletePimpinan('{{ route('admin.pimpinan.destroy', $p->id) }}', '{{ addslashes($p->isi) }}');" class="p-1.5 text-rose-500 hover:text-rose-700 hover:bg-rose-50 rounded-lg transition-colors" title="Hapus Data">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400">
                                Belum ada data pimpinan. Klik tombol "+ Tambah Pimpinan / Dosen" untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Hidden Form for Delete -->
    <form id="delete-form-pimpinan" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    <!-- Modal Form Tambah/Edit Pimpinan -->
    <div id="modal-pimpinan" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs">
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-2xl space-y-5 w-full max-w-lg max-h-[90vh] overflow-y-auto animate-fade-in">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div>
                    <h3 id="modal-pimpinan-title" class="text-base font-bold text-slate-900">Kelola Data Pimpinan</h3>
                    <p class="text-xs text-slate-500">Isi data identitas, jabatan akademik, dan unggah foto profil.</p>
                </div>
                <button type="button" onclick="closeModalPimpinan();" class="text-slate-400 hover:text-slate-600 font-bold text-2xl leading-none">&times;</button>
            </div>

            <form id="form-pimpinan" method="POST" action="{{ route('admin.pimpinan.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div id="method-container-pimpinan"></div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Jabatan / Posisi Akademik *</label>
                    <input name="label" id="modal-p-label" type="text" required placeholder="Contoh: Ketua Program Studi / Dekan..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap & Gelar Akademik *</label>
                    <input name="isi" id="modal-p-isi" type="text" required placeholder="Contoh: Eka Mariyanti, S.E., M.M., M.Par., Ph.D." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none font-semibold">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Keterangan / Badge Prestasi</label>
                    <input name="keterangan" id="modal-p-keterangan" type="text" placeholder="Contoh: Wisudawati Terbaik Magister Pariwisata / Pimpinan Fakultas" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>

                <!-- Foto Upload & Preview -->
                <div class="space-y-2 p-4 rounded-2xl bg-slate-50 border border-slate-200">
                    <label class="block text-xs font-bold text-slate-700">Foto Profil Pimpinan</label>
                    
                    <div id="preview-p-foto-container" class="hidden flex items-center gap-3 pb-2">
                        <img id="preview-p-foto" src="" alt="Preview Foto" class="w-14 h-14 rounded-full object-cover border-2 border-amber-400 shadow-xs">
                        <span class="text-[11px] text-slate-500">Foto profil saat ini</span>
                    </div>

                    <div class="grid grid-cols-1 gap-2">
                        <div>
                            <span class="text-[11px] font-semibold text-slate-600 block mb-1">1. Unggah File Foto Baru (JPG, PNG, WebP maks 2MB):</span>
                            <input type="file" name="foto" id="modal-p-foto" accept="image/jpeg,image/png,image/webp" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs bg-white file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                        <div>
                            <span class="text-[11px] font-semibold text-slate-600 block mb-1">2. Atau Gunakan URL Foto Gambar Eksternal:</span>
                            <input type="url" name="foto_url" id="modal-p-foto-url" placeholder="https://..." class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs bg-white focus:ring-2 focus:ring-blue-600 focus:outline-none">
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nomor Urutan Tampilan</label>
                    <input name="order" id="modal-p-order" type="number" min="1" placeholder="1, 2, 3..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>

                <div class="flex items-center justify-end gap-2 pt-4 border-t border-slate-100">
                    <button type="button" onclick="closeModalPimpinan();" class="px-4 py-2 rounded-xl border border-slate-300 text-slate-600 text-xs font-bold hover:bg-slate-50 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white text-xs font-bold shadow-md transition-all">
                        Simpan Data Pimpinan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openModalTambahPimpinan() {
        document.getElementById('modal-pimpinan-title').innerText = 'Tambah Data Pimpinan / Dosen';
        document.getElementById('form-pimpinan').action = "{{ route('admin.pimpinan.store') }}";
        document.getElementById('method-container-pimpinan').innerHTML = '';
        document.getElementById('modal-p-label').value = '';
        document.getElementById('modal-p-isi').value = '';
        document.getElementById('modal-p-keterangan').value = '';
        document.getElementById('modal-p-foto').value = '';
        document.getElementById('modal-p-foto-url').value = '';
        document.getElementById('modal-p-order').value = '';
        document.getElementById('preview-p-foto-container').classList.add('hidden');
        document.getElementById('modal-pimpinan').classList.remove('hidden');
    }

    function openModalEditPimpinan(data) {
        document.getElementById('modal-pimpinan-title').innerText = 'Sunting Data Pimpinan: ' + data.label;
        document.getElementById('form-pimpinan').action = "/admin/pimpinan/" + data.id;
        document.getElementById('method-container-pimpinan').innerHTML = '@method("PUT")';
        document.getElementById('modal-p-label').value = data.label;
        document.getElementById('modal-p-isi').value = data.isi;
        document.getElementById('modal-p-keterangan').value = data.keterangan || '';
        document.getElementById('modal-p-foto').value = '';
        document.getElementById('modal-p-foto-url').value = '';
        document.getElementById('modal-p-order').value = data.order || '';

        if (data.foto) {
            document.getElementById('preview-p-foto').src = data.foto;
            document.getElementById('preview-p-foto-container').classList.remove('hidden');
            if (data.foto.startsWith('http')) {
                document.getElementById('modal-p-foto-url').value = data.foto;
            }
        } else {
            document.getElementById('preview-p-foto-container').classList.add('hidden');
        }

        document.getElementById('modal-pimpinan').classList.remove('hidden');
    }

    function closeModalPimpinan() {
        document.getElementById('modal-pimpinan').classList.add('hidden');
    }

    function confirmDeletePimpinan(url, nama) {
        confirmDelete(nama, function() {
            var form = document.getElementById('delete-form-pimpinan');
            form.action = url;
            form.submit();
        });
    }
</script>
@endsection
