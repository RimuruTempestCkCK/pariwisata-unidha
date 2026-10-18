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
                <span class="text-2xl font-extrabold text-slate-900">144 SKS</span>
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
                <span class="text-xs text-slate-500">Hospitality, MICE, Ekowisata</span>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs space-y-1">
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Mata Kuliah Aktif</span>
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-extrabold text-emerald-600">48 MK</span>
                <span class="text-xs text-slate-500">Teori & Praktik</span>
            </div>
        </div>
    </div>

    <!-- Modal Form (Pop Up Template untuk Tambah & Edit Mata Kuliah) -->
    <div id="modal-matkul" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs">
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-2xl space-y-5 w-full max-w-2xl max-h-[90vh] overflow-y-auto animate-fade-in">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div>
                    <h3 id="modal-matkul-title" class="text-base font-bold text-slate-900">Formulir Mata Kuliah</h3>
                    <p class="text-xs text-slate-500">Kelola rincian mata kuliah dan kurikulum program studi.</p>
                </div>
                <button type="button" onclick="closeModalMatkul();" class="text-slate-400 hover:text-slate-600 font-bold text-2xl leading-none">&times;</button>
            </div>

            <form id="form-matkul" onsubmit="handleFormMatkul(event);" class="space-y-4">
                <input type="hidden" id="form-matkul-mode" value="tambah">

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Kode MK *</label>
                        <input type="text" id="input-matkul-kode" required placeholder="PAR-301" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nama Mata Kuliah *</label>
                        <input type="text" id="input-matkul-nama" required placeholder="Manajemen Perhotelan..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Bobot SKS *</label>
                        <select id="input-matkul-sks" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            <option value="3 SKS">3 SKS</option>
                            <option value="2 SKS">2 SKS</option>
                            <option value="4 SKS">4 SKS</option>
                            <option value="6 SKS">6 SKS</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Konsentrasi *</label>
                        <select id="input-matkul-konsentrasi" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
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
                        <select id="input-matkul-semester" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            <option value="Semester 1">Semester 1</option>
                            <option value="Semester 2">Semester 2</option>
                            <option value="Semester 3">Semester 3</option>
                            <option value="Semester 4">Semester 4</option>
                            <option value="Semester 5">Semester 5</option>
                            <option value="Semester 6">Semester 6</option>
                            <option value="Semester 7">Semester 7</option>
                            <option value="Semester 8">Semester 8</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Deskripsi & Capaian Pembelajaran</label>
                    <textarea id="input-matkul-deskripsi" rows="2" placeholder="Uraian kompetensi yang dicapai mahasiswa..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none"></textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModalMatkul();" class="px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold text-slate-600 hover:bg-slate-100">Batal</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-blue-900 text-white text-xs font-bold hover:bg-blue-800 shadow-md">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Kurikulum & Mata Kuliah -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-base font-bold text-slate-900">Daftar Struktur Kurikulum & Mata Kuliah</h2>
                <p class="text-xs text-slate-500">Mata kuliah representatif yang ditampilkan pada halaman akademik publik.</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-xs text-slate-500 font-medium">Filter Konsentrasi:</span>
                <select class="px-3 py-1.5 rounded-xl border border-slate-300 text-xs focus:outline-none focus:ring-2 focus:ring-blue-600 bg-white">
                    <option>Semua Konsentrasi</option>
                    <option>Hospitality</option>
                    <option>MICE & Event</option>
                    <option>Destinasi</option>
                    <option>Bisnis Digital</option>
                </select>
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
                    <tr id="row-matkul-1" class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 font-mono font-bold text-blue-900">PAR-101</td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-slate-900 text-sm block">Pengantar Ilmu Pariwisata</span>
                            <span class="text-[11px] text-slate-400">Fondasi teori kepariwisataan, tipologi wisatawan, dan ekosistem industri.</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-slate-100 text-slate-800">
                                Dasar Keilmuan
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center font-bold text-slate-900">3 SKS</td>
                        <td class="px-6 py-4 text-center font-semibold text-slate-600">Semester 1</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-100 text-blue-800">Wajib</span>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <button onclick="openModalEditMatkul('PAR-101', 'Pengantar Ilmu Pariwisata', '3 SKS', 'Dasar Keilmuan', 'Semester 1', 'Fondasi teori kepariwisataan, tipologi wisatawan, dan ekosistem industri.');" class="text-blue-900 hover:text-amber-600 font-bold hover:underline mr-3">Sunting</button>
                            <button onclick="handleDeleteMatkul('Pengantar Ilmu Pariwisata (PAR-101)', 'row-matkul-1');" class="text-rose-600 hover:text-rose-700 font-bold hover:underline">Hapus</button>
                        </td>
                    </tr>

                    <tr id="row-matkul-2" class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 font-mono font-bold text-blue-900">PAR-204</td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-slate-900 text-sm block">Manajemen Operasional Perhotelan</span>
                            <span class="text-[11px] text-slate-400">Front office, housekeeping, revenue management, dan standar service excellence hotel.</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-amber-50 text-amber-800">
                                Hospitality
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center font-bold text-slate-900">3 SKS</td>
                        <td class="px-6 py-4 text-center font-semibold text-slate-600">Semester 3</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-100 text-blue-800">Wajib</span>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <button onclick="openModalEditMatkul('PAR-204', 'Manajemen Operasional Perhotelan', '3 SKS', 'Hospitality', 'Semester 3', 'Front office, housekeeping, revenue management, dan standar service excellence hotel.');" class="text-blue-900 hover:text-amber-600 font-bold hover:underline mr-3">Sunting</button>
                            <button onclick="handleDeleteMatkul('Manajemen Operasional Perhotelan (PAR-204)', 'row-matkul-2');" class="text-rose-600 hover:text-rose-700 font-bold hover:underline">Hapus</button>
                        </td>
                    </tr>

                    <tr id="row-matkul-3" class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 font-mono font-bold text-blue-900">PAR-305</td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-slate-900 text-sm block">Tata Kelola MICE & Event Planning</span>
                            <span class="text-[11px] text-slate-400">Penyelenggaraan convention, expo festival, bidding event, dan manajemen logistik.</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-purple-50 text-purple-800">
                                MICE & Event
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center font-bold text-slate-900">3 SKS</td>
                        <td class="px-6 py-4 text-center font-semibold text-slate-600">Semester 5</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-100 text-blue-800">Wajib</span>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <button onclick="openModalEditMatkul('PAR-305', 'Tata Kelola MICE & Event Planning', '3 SKS', 'MICE & Event', 'Semester 5', 'Penyelenggaraan convention, expo festival, bidding event, dan manajemen logistik.');" class="text-blue-900 hover:text-amber-600 font-bold hover:underline mr-3">Sunting</button>
                            <button onclick="handleDeleteMatkul('Tata Kelola MICE & Event Planning (PAR-305)', 'row-matkul-3');" class="text-rose-600 hover:text-rose-700 font-bold hover:underline">Hapus</button>
                        </td>
                    </tr>

                    <tr id="row-matkul-4" class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 font-mono font-bold text-blue-900">PAR-312</td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-slate-900 text-sm block">Perencanaan & Ekowisata Berkelanjutan</span>
                            <span class="text-[11px] text-slate-400">Pengembangan desa wisata, studi kelayakan atraksi alam & warisan budaya Minangkabau.</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-emerald-50 text-emerald-800">
                                Destinasi
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center font-bold text-slate-900">3 SKS</td>
                        <td class="px-6 py-4 text-center font-semibold text-slate-600">Semester 5</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-100 text-blue-800">Wajib</span>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <button onclick="openModalEditMatkul('PAR-312', 'Perencanaan & Ekowisata Berkelanjutan', '3 SKS', 'Destinasi', 'Semester 5', 'Pengembangan desa wisata, studi kelayakan atraksi alam & warisan budaya Minangkabau.');" class="text-blue-900 hover:text-amber-600 font-bold hover:underline mr-3">Sunting</button>
                            <button onclick="handleDeleteMatkul('Perencanaan & Ekowisata Berkelanjutan (PAR-312)', 'row-matkul-4');" class="text-rose-600 hover:text-rose-700 font-bold hover:underline">Hapus</button>
                        </td>
                    </tr>

                    <tr id="row-matkul-5" class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 font-mono font-bold text-blue-900">PAR-401</td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-slate-900 text-sm block">Pemasaran Digital & E-Tourism</span>
                            <span class="text-[11px] text-slate-400">Strategi branding pariwisata via media sosial, SEO destinasi, dan OTA partnerships.</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-sky-50 text-sky-800">
                                Bisnis Digital
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center font-bold text-slate-900">3 SKS</td>
                        <td class="px-6 py-4 text-center font-semibold text-slate-600">Semester 6</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Pilihan</span>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <button onclick="openModalEditMatkul('PAR-401', 'Pemasaran Digital & E-Tourism', '3 SKS', 'Bisnis Digital', 'Semester 6', 'Strategi branding pariwisata via media sosial, SEO destinasi, dan OTA partnerships.');" class="text-blue-900 hover:text-amber-600 font-bold hover:underline mr-3">Sunting</button>
                            <button onclick="handleDeleteMatkul('Pemasaran Digital & E-Tourism (PAR-401)', 'row-matkul-5');" class="text-rose-600 hover:text-rose-700 font-bold hover:underline">Hapus</button>
                        </td>
                    </tr>

                    <tr id="row-matkul-6" class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 font-mono font-bold text-blue-900">PAR-490</td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-slate-900 text-sm block">Praktik Kerja Lapangan / Magang Industri</span>
                            <span class="text-[11px] text-slate-400">Internship 1 semester di hotel berbintang lima, dinas pariwisata, atau travel operator.</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-amber-50 text-amber-800">
                                Praktik Industri
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center font-bold text-slate-900">4 SKS</td>
                        <td class="px-6 py-4 text-center font-semibold text-slate-600">Semester 7</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-100 text-blue-800">Wajib</span>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <button onclick="openModalEditMatkul('PAR-490', 'Praktik Kerja Lapangan / Magang Industri', '4 SKS', 'Praktik Industri', 'Semester 7', 'Internship 1 semester di hotel berbintang lima, dinas pariwisata, atau travel operator.');" class="text-blue-900 hover:text-amber-600 font-bold hover:underline mr-3">Sunting</button>
                            <button onclick="handleDeleteMatkul('Praktik Kerja Lapangan (PAR-490)', 'row-matkul-6');" class="text-rose-600 hover:text-rose-700 font-bold hover:underline">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function openModalTambahMatkul() {
        document.getElementById('modal-matkul-title').innerText = 'Tambah Mata Kuliah Baru';
        document.getElementById('form-matkul-mode').value = 'tambah';
        document.getElementById('input-matkul-kode').value = '';
        document.getElementById('input-matkul-nama').value = '';
        document.getElementById('input-matkul-sks').value = '3 SKS';
        document.getElementById('input-matkul-konsentrasi').value = 'Hospitality';
        document.getElementById('input-matkul-semester').value = 'Semester 1';
        document.getElementById('input-matkul-deskripsi').value = '';
        document.getElementById('modal-matkul').classList.remove('hidden');
    }

    function openModalEditMatkul(kode, nama, sks, konsentrasi, semester, deskripsi) {
        document.getElementById('modal-matkul-title').innerText = 'Sunting Mata Kuliah: ' + kode;
        document.getElementById('form-matkul-mode').value = 'edit';
        document.getElementById('input-matkul-kode').value = kode;
        document.getElementById('input-matkul-nama').value = nama;
        document.getElementById('input-matkul-sks').value = sks;
        document.getElementById('input-matkul-konsentrasi').value = konsentrasi;
        document.getElementById('input-matkul-semester').value = semester;
        document.getElementById('input-matkul-deskripsi').value = deskripsi;
        document.getElementById('modal-matkul').classList.remove('hidden');
    }

    function closeModalMatkul() {
        document.getElementById('modal-matkul').classList.add('hidden');
    }

    function handleFormMatkul(e) {
        e.preventDefault();
        const mode = document.getElementById('form-matkul-mode').value;
        closeModalMatkul();
        if (mode === 'tambah') {
            notifySuccess('Mata kuliah baru berhasil ditambahkan!');
        } else {
            notifySuccess('Perubahan mata kuliah berhasil disimpan!');
        }
    }

    function handleDeleteMatkul(nama, rowId) {
        notifyDelete('mata kuliah "' + nama + '"', function() {
            const row = document.getElementById(rowId);
            if (row) {
                row.remove();
            }
        });
    }
</script>
@endsection
