@extends('admin.layouts.app')

@section('title', 'Kelola Tautan & Direktori')

@section('admin_content')
<div class="space-y-8 max-w-7xl mx-auto">
    <!-- Header Page -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Kelola Direktori Link Terkait</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Atur tautan portal eksternal, website mitra, organisasi mahasiswa, dan direktori resmi di halaman publik /link.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('link') }}" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-50 text-xs font-bold transition-colors">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>Lihat Halaman Link</span>
            </a>
            <button onclick="openModalTambahLink();" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white font-bold text-xs shadow-md transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>+ Tambah Tautan Baru</span>
            </button>
        </div>
    </div>

    <!-- Modal Form Tambah/Sunting Link -->
    <div id="modal-link" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs">
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-2xl space-y-5 w-full max-w-xl max-h-[90vh] overflow-y-auto animate-fade-in">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div>
                    <h3 id="modal-link-title" class="text-base font-bold text-slate-900">Kelola Data Tautan</h3>
                    <p class="text-xs text-slate-500">Perbarui tautan link, kategori, serta deskripsi singkat.</p>
                </div>
                <button type="button" onclick="closeModalLink();" class="text-slate-400 hover:text-slate-600 font-bold text-2xl leading-none">&times;</button>
            </div>

            <form id="form-link" method="POST" action="{{ route('admin.link.store') }}" class="space-y-4">
                @csrf
                <div id="method-container-link"></div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Judul / Nama Tautan *</label>
                    <input name="title" id="input-link-title" type="text" required placeholder="Contoh: Website Resmi Universitas Dharma Andalas" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Kategori Tautan *</label>
                        <select name="category" id="input-link-category" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            <option value="Portal Resmi">Portal Resmi</option>
                            <option value="Media Sosial">Media Sosial</option>
                            <option value="Organisasi Mahasiswa">Organisasi Mahasiswa</option>
                            <option value="Akademik & SPMB">Akademik & SPMB</option>
                            <option value="Institusi Penyelenggara">Institusi Penyelenggara</option>
                            <option value="Mitra & Pemerintah">Mitra & Pemerintah</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Alamat URL Tautan *</label>
                        <input name="url" id="input-link-url" type="text" required placeholder="https://..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Deskripsi Singkat Tautan</label>
                    <textarea name="description" id="input-link-desc" rows="3" placeholder="Uraian singkat tujuan dan isi direktori tautan..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none"></textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModalLink();" class="px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold text-slate-600 hover:bg-slate-100">Batal</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-blue-900 text-white text-xs font-bold hover:bg-blue-800 shadow-md">Simpan Tautan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Hidden Form for Delete -->
    <form id="form-delete-link" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- Tabel Data Link -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-base font-bold text-slate-900">Daftar Seluruh Direktori Link Terkait</h2>
                <p class="text-xs text-slate-500">Tautan yang aktif akan langsung muncul dalam kartu direktori /link.</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-xs text-slate-500">Total Tautan:</span>
                <span class="px-2.5 py-1 rounded-md text-xs font-bold bg-blue-50 text-blue-900">{{ count($links) }} Tautan</span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 w-12 text-center">No</th>
                        <th class="px-6 py-4 w-44">Kategori</th>
                        <th class="px-6 py-4 w-60">Nama Tautan</th>
                        <th class="px-6 py-4">URL & Deskripsi</th>
                        <th class="px-6 py-4 w-28 text-center">Status</th>
                        <th class="px-6 py-4 w-28 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse($links as $item)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4 text-center font-bold text-slate-400">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-blue-50 text-blue-900">
                                    {{ $item->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-900">
                                {{ $item->title }}
                            </td>
                            <td class="px-6 py-4 text-slate-600">
                                <a href="{{ $item->url }}" target="_blank" class="font-bold text-blue-900 hover:text-amber-600 hover:underline flex items-center gap-1">
                                    <span class="truncate max-w-xs">{{ $item->url }}</span>
                                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                                @if($item->description)
                                    <p class="text-[11px] text-slate-400 mt-1 line-clamp-1">{{ $item->description }}</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Aktif</span>
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <button onclick="openEditLink({{ $item->id }}, '{{ addslashes($item->title) }}', '{{ addslashes($item->url) }}', '{{ addslashes($item->category) }}', '{{ addslashes($item->description ?? '') }}');" class="text-blue-900 hover:text-amber-600 font-bold hover:underline mr-3">
                                    Sunting
                                </button>
                                <button onclick="handleDeleteLink({{ $item->id }}, '{{ addslashes($item->title) }}');" class="text-rose-600 hover:text-rose-700 font-bold hover:underline">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-slate-400">Belum ada tautan direktori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function openModalTambahLink() {
        document.getElementById('modal-link-title').innerText = 'Tambah Tautan Direktori Baru';
        const form = document.getElementById('form-link');
        form.action = "{{ route('admin.link.store') }}";
        document.getElementById('method-container-link').innerHTML = '';

        document.getElementById('input-link-title').value = '';
        document.getElementById('input-link-category').value = 'Portal Resmi';
        document.getElementById('input-link-url').value = '';
        document.getElementById('input-link-desc').value = '';
        document.getElementById('modal-link').classList.remove('hidden');
    }

    function openEditLink(id, title, url, category, desc) {
        document.getElementById('modal-link-title').innerText = 'Sunting Tautan: ' + title;
        const form = document.getElementById('form-link');
        form.action = "/admin/link/" + id;
        document.getElementById('method-container-link').innerHTML = '@method("PUT")';

        document.getElementById('input-link-title').value = title;
        document.getElementById('input-link-category').value = category;
        document.getElementById('input-link-url').value = url;
        document.getElementById('input-link-desc').value = desc;
        document.getElementById('modal-link').classList.remove('hidden');
    }

    function closeModalLink() {
        document.getElementById('modal-link').classList.add('hidden');
    }

    function handleDeleteLink(id, title) {
        notifyDelete(title, function() {
            const form = document.getElementById('form-delete-link');
            form.action = "/admin/link/" + id;
            form.submit();
        });
    }
</script>
@endsection
