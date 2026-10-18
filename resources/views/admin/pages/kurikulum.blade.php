@extends('admin.layouts.app')

@section('title', 'Kelola Kurikulum & Akademik')

@section('admin_content')
<div class="space-y-8 max-w-7xl mx-auto">
    <!-- Header with Action -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Kelola Kurikulum & Mata Kuliah</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Manajemen struktur mata kuliah, kelompok keahlian pariwisata, beban SKS, dan silabus perkuliahan.
            </p>
        </div>
        <button onclick="openModalTambahMatkul();" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white font-bold text-xs shadow-md transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>+ Tambah Mata Kuliah</span>
        </button>
    </div>

    <!-- Quick Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs space-y-1">
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Total Beban Studi</span>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-extrabold text-slate-900">{{ $curricula->sum('sks') }} SKS</span>
                <span class="text-xs text-emerald-600 font-semibold">8 Semester</span>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs space-y-1">
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Gelar Lulusan</span>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-extrabold text-blue-900">S.Par.</span>
                <span class="text-xs text-slate-500">Sarjana Pariwisata</span>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs space-y-1">
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Bidang Konsentrasi</span>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-extrabold text-amber-600">3 Bidang</span>
                <span class="text-xs text-slate-500">Hospitality, MICE, Destinasi</span>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs space-y-1">
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Mata Kuliah Aktif</span>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-extrabold text-emerald-600">{{ count($curricula) }} MK</span>
                <span class="text-xs text-slate-500">Teori & Praktik</span>
            </div>
        </div>
    </div>

    <!-- Modal Form (Pop Up Tambah & Edit Mata Kuliah) -->
    <div id="modal-matkul" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs">
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-2xl space-y-5 w-full max-w-2xl max-h-[90vh] overflow-y-auto animate-fade-in">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div>
                    <h3 id="modal-matkul-title" class="text-base font-bold text-slate-900">Formulir Mata Kuliah</h3>
                    <p class="text-xs text-slate-500">Kelola rincian mata kuliah dan kurikulum program studi.</p>
                </div>
                <button type="button" onclick="closeModalMatkul();" class="text-slate-400 hover:text-slate-600 font-bold text-2xl leading-none">&times;</button>
            </div>

            <form id="form-matkul" method="POST" action="{{ route('admin.kurikulum.store') }}" class="space-y-4">
                @csrf
                <div id="method-container-matkul"></div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Kode MK *</label>
                        <input type="text" name="kode" id="input-matkul-kode" required placeholder="PAR-301" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nama Mata Kuliah *</label>
                        <input type="text" name="nama" id="input-matkul-nama" required placeholder="Manajemen Perhotelan..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Bobot SKS *</label>
                        <select name="sks" id="input-matkul-sks" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            <option value="1">1 SKS</option>
                            <option value="2">2 SKS</option>
                            <option value="3" selected>3 SKS</option>
                            <option value="4">4 SKS</option>
                            <option value="6">6 SKS</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Konsentrasi *</label>
                        <select name="konsentrasi" id="input-matkul-konsentrasi" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            <option value="Hospitality">Hospitality</option>
                            <option value="MICE & Event">MICE & Event</option>
                            <option value="Destinasi">Destinasi</option>
                            <option value="Bisnis Digital">Bisnis Digital</option>
                            <option value="Praktik Industri">Praktik Industri</option>
                            <option value="Dasar Keilmuan">Dasar Keilmuan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Semester *</label>
                        <select name="semester" id="input-matkul-semester" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            @for($i=1; $i<=8; $i++)
                                <option value="{{ $i }}">Semester {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Sifat MK *</label>
                        <select name="sifat" id="input-matkul-sifat" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            <option value="Wajib">Wajib</option>
                            <option value="Pilihan">Pilihan</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Deskripsi & Capaian Pembelajaran</label>
                    <textarea name="deskripsi" id="input-matkul-deskripsi" rows="2" placeholder="Uraian kompetensi yang dicapai mahasiswa..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none"></textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModalMatkul();" class="px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold text-slate-600 hover:bg-slate-100">Batal</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-blue-900 text-white text-xs font-bold hover:bg-blue-800 shadow-md">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Hidden Form for Delete -->
    <form id="form-delete-matkul" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- Tabel Kurikulum & Mata Kuliah -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-base font-bold text-slate-900">Daftar Struktur Kurikulum & Mata Kuliah</h2>
                <p class="text-xs text-slate-500">Mata kuliah representatif yang ditampilkan pada halaman akademik publik.</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 w-24">Kode MK</th>
                        <th class="px-6 py-4">Nama Mata Kuliah</th>
                        <th class="px-6 py-4 w-44">Konsentrasi</th>
                        <th class="px-6 py-4 w-28 text-center">Beban SKS</th>
                        <th class="px-6 py-4 w-28 text-center">Semester</th>
                        <th class="px-6 py-4 w-28 text-center">Sifat</th>
                        <th class="px-6 py-4 w-28 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse($curricula as $matkul)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4 font-mono font-bold text-blue-900">{{ $matkul->kode }}</td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-slate-900 text-sm block">{{ $matkul->nama }}</span>
                                <span class="text-[11px] text-slate-400">{{ $matkul->deskripsi }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-amber-50 text-amber-800">
                                    {{ $matkul->konsentrasi }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center font-bold text-slate-900">{{ $matkul->sks }} SKS</td>
                            <td class="px-6 py-4 text-center font-semibold text-slate-600">Semester {{ $matkul->semester }}</td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $matkul->sifat === 'Wajib' ? 'bg-blue-100 text-blue-800' : 'bg-emerald-100 text-emerald-800' }}">
                                    {{ $matkul->sifat }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <button onclick="openModalEditMatkul({{ $matkul->id }}, '{{ addslashes($matkul->kode) }}', '{{ addslashes($matkul->nama) }}', {{ $matkul->sks }}, '{{ addslashes($matkul->konsentrasi) }}', {{ $matkul->semester }}, '{{ addslashes($matkul->sifat) }}', '{{ addslashes($matkul->deskripsi ?? '') }}');" class="text-blue-900 hover:text-amber-600 font-bold hover:underline mr-3">Sunting</button>
                                <button onclick="handleDeleteMatkul({{ $matkul->id }}, '{{ addslashes($matkul->nama) }} ({{ $matkul->kode }})');" class="text-rose-600 hover:text-rose-700 font-bold hover:underline">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-slate-400">Belum ada mata kuliah yang didaftarkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function openModalTambahMatkul() {
        document.getElementById('modal-matkul-title').innerText = 'Tambah Mata Kuliah Baru';
        const form = document.getElementById('form-matkul');
        form.action = "{{ route('admin.kurikulum.store') }}";
        document.getElementById('method-container-matkul').innerHTML = '';

        document.getElementById('input-matkul-kode').value = '';
        document.getElementById('input-matkul-nama').value = '';
        document.getElementById('input-matkul-sks').value = '3';
        document.getElementById('input-matkul-konsentrasi').value = 'Hospitality';
        document.getElementById('input-matkul-semester').value = '1';
        document.getElementById('input-matkul-sifat').value = 'Wajib';
        document.getElementById('input-matkul-deskripsi').value = '';
        document.getElementById('modal-matkul').classList.remove('hidden');
    }

    function openModalEditMatkul(id, kode, nama, sks, konsentrasi, semester, sifat, deskripsi) {
        document.getElementById('modal-matkul-title').innerText = 'Sunting Mata Kuliah: ' + kode;
        const form = document.getElementById('form-matkul');
        form.action = "/admin/kurikulum/" + id;
        document.getElementById('method-container-matkul').innerHTML = '@method("PUT")';

        document.getElementById('input-matkul-kode').value = kode;
        document.getElementById('input-matkul-nama').value = nama;
        document.getElementById('input-matkul-sks').value = sks;
        document.getElementById('input-matkul-konsentrasi').value = konsentrasi;
        document.getElementById('input-matkul-semester').value = semester;
        document.getElementById('input-matkul-sifat').value = sifat;
        document.getElementById('input-matkul-deskripsi').value = deskripsi;
        document.getElementById('modal-matkul').classList.remove('hidden');
    }

    function closeModalMatkul() {
        document.getElementById('modal-matkul').classList.add('hidden');
    }

    function handleDeleteMatkul(id, nama) {
        notifyDelete('mata kuliah "' + nama + '"', function() {
            const form = document.getElementById('form-delete-matkul');
            form.action = "/admin/kurikulum/" + id;
            form.submit();
        });
    }
</script>
@endsection
