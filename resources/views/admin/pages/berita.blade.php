@extends('admin.layouts.app')

@section('title', 'Kelola Berita & Agenda')

@section('admin_content')
<div class="space-y-8 max-w-7xl mx-auto">
    <!-- Header with Action -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Kelola Berita & Publikasi</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Tambah, sunting, arsipkan, atau hapus warta kepariwisataan dan kegiatan kampus.
            </p>
        </div>
        <button onclick="openModalTambahBerita();" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white font-bold text-xs shadow-md transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>+ Tambah Berita Baru</span>
        </button>
    </div>

    <!-- Modal Form (Pop Up Template untuk Tambah & Edit) -->
    <div id="modal-berita" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs">
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-2xl space-y-5 w-full max-w-2xl max-h-[90vh] overflow-y-auto animate-fade-in">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div>
                    <h3 id="modal-berita-title" class="text-base font-bold text-slate-900">Formulir Berita</h3>
                    <p class="text-xs text-slate-500">Kelola rincian berita publikasi program studi.</p>
                </div>
                <button type="button" onclick="closeModalBerita();" class="text-slate-400 hover:text-slate-600 font-bold text-2xl leading-none">&times;</button>
            </div>

            <form id="form-berita" method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div id="method-container-berita"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Judul Berita *</label>
                        <input type="text" name="title" id="input-berita-title" required placeholder="Contoh: Kunjungan Praktik Mahasiswa..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Kategori *</label>
                        <select name="category" id="input-berita-category" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            <option value="Akademik">Akademik</option>
                            <option value="Kegiatan Mahasiswa">Kegiatan Mahasiswa</option>
                            <option value="Kemahasiswaan">Kemahasiswaan</option>
                            <option value="Informasi SPMB">Informasi SPMB</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Penulis / Sumber *</label>
                        <input type="text" name="author" id="input-berita-author" required value="Humas S1 Pariwisata UNIDHA" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">URL Gambar Utama</label>
                        <input type="url" name="image" id="input-berita-image" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Atau Unggah Berkas Gambar (Opsional)</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-900 hover:file:bg-blue-100 cursor-pointer border border-slate-200 rounded-xl p-1 bg-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Ringkasan Singkat (Excerpt) *</label>
                    <textarea name="summary" id="input-berita-summary" rows="2" required placeholder="Tuliskan 1-2 kalimat ringkasan warta..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Isi Lengkap Artikel *</label>
                    <textarea name="content" id="input-berita-content" rows="4" required placeholder="Tuliskan isi artikel berita..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none"></textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModalBerita();" class="px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold text-slate-600 hover:bg-slate-100">Batal</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-blue-900 text-white text-xs font-bold hover:bg-blue-800 shadow-md">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Hidden Form for Delete -->
    <form id="form-delete-berita" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- Berita Table -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4">Thumbnail</th>
                        <th class="px-6 py-4">Judul & Ringkasan</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Penulis</th>
                        <th class="px-6 py-4">Tanggal Rilis</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse($newsList as $item)
                        <tr id="row-berita-{{ $item->id }}" class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4 w-24">
                                <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-16 h-12 rounded-lg object-cover shadow-xs border border-slate-200">
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('berita.show', $item->slug) }}" target="_blank" class="font-bold text-slate-900 hover:text-blue-900 text-sm line-clamp-1">
                                    {{ $item->title }}
                                </a>
                                <p class="text-[11px] text-slate-500 line-clamp-1 mt-0.5">{{ $item->summary }}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-blue-50 text-blue-900">
                                    {{ $item->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-slate-600">
                                {{ $item->author }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-slate-500">
                                {{ $item->date_text ?? $item->created_at->translatedFormat('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('berita.show', $item->slug) }}" target="_blank" class="p-1.5 rounded-lg text-slate-500 hover:text-blue-900 hover:bg-slate-100" title="Buka di Website Publik">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <button onclick="openModalEditBerita({{ $item->id }}, '{{ addslashes($item->title) }}', '{{ $item->category }}', '{{ addslashes($item->author) }}', '{{ $item->image }}', '{{ addslashes($item->summary) }}', '{{ addslashes($item->content) }}');" class="p-1.5 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-slate-100" title="Sunting">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>
                                    <button onclick="handleDeleteBerita({{ $item->id }}, '{{ addslashes($item->title) }}');" class="p-1.5 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-slate-100" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-slate-400">Belum ada data berita. Silakan tambah berita baru.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function openModalTambahBerita() {
        document.getElementById('modal-berita-title').innerText = 'Tambah Berita Baru';
        const form = document.getElementById('form-berita');
        form.action = "{{ route('admin.berita.store') }}";
        document.getElementById('method-container-berita').innerHTML = '';
        
        document.getElementById('input-berita-title').value = '';
        document.getElementById('input-berita-category').value = 'Akademik';
        document.getElementById('input-berita-author').value = 'Humas S1 Pariwisata UNIDHA';
        document.getElementById('input-berita-image').value = 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1200&q=80';
        document.getElementById('input-berita-summary').value = '';
        document.getElementById('input-berita-content').value = '';
        document.getElementById('modal-berita').classList.remove('hidden');
    }

    function openModalEditBerita(id, title, category, author, image, summary, content) {
        document.getElementById('modal-berita-title').innerText = 'Sunting Berita: ' + title;
        const form = document.getElementById('form-berita');
        form.action = "/admin/berita/" + id;
        document.getElementById('method-container-berita').innerHTML = '@method("PUT")';

        document.getElementById('input-berita-title').value = title;
        document.getElementById('input-berita-category').value = category;
        document.getElementById('input-berita-author').value = author;
        document.getElementById('input-berita-image').value = image;
        document.getElementById('input-berita-summary').value = summary;
        document.getElementById('input-berita-content').value = content;
        document.getElementById('modal-berita').classList.remove('hidden');
    }

    function closeModalBerita() {
        document.getElementById('modal-berita').classList.add('hidden');
    }

    function handleDeleteBerita(id, title) {
        notifyDelete('berita "' + title + '"', function() {
            const form = document.getElementById('form-delete-berita');
            form.action = "/admin/berita/" + id;
            form.submit();
        });
    }
</script>
@endsection
