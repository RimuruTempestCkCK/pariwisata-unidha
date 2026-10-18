@extends('admin.layouts.app')

@section('title', 'Kelola Profil & Visi Misi')

@section('admin_content')
<div class="space-y-8 max-w-7xl mx-auto">
    <!-- Header with Action -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Kelola Informasi Profil & Kelembagaan</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Daftar data identitas, visi, misi, dan pimpinan program studi dalam bentuk tabel manajemen konten.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('profil') }}" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-50 text-xs font-bold transition-colors">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>Lihat Profil Publik</span>
            </a>
            <button onclick="openModalTambahProfil();" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-900 hover:bg-blue-800 text-white font-bold text-xs shadow-md transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>+ Tambah / Perbarui Butir Data</span>
            </button>
        </div>
    </div>

    <!-- Modal Form Edit/Sunting Butir Profil (Pop Up Template) -->
    <div id="modal-edit-profil" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs">
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-2xl space-y-5 w-full max-w-xl max-h-[90vh] overflow-y-auto animate-fade-in">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div>
                    <h3 id="modal-title" class="text-base font-bold text-slate-900">Sunting Data Profil</h3>
                    <p class="text-xs text-slate-500">Perbarui isi konten profil yang akan ditampilkan di halaman /profil.</p>
                </div>
                <button type="button" onclick="closeModalProfil();" class="text-slate-400 hover:text-slate-600 font-bold text-2xl leading-none">&times;</button>
            </div>

            <form onsubmit="handleFormProfil(event);" class="space-y-4">
                <input type="hidden" id="modal-mode" value="edit">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Kategori Bagian *</label>
                        <select id="modal-kategori" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none bg-white">
                            <option value="Identitas & Slogan">Identitas & Slogan</option>
                            <option value="Visi Program Studi">Visi Program Studi</option>
                            <option value="Misi Program Studi">Misi Program Studi</option>
                            <option value="Tata Kelola & Pimpinan">Tata Kelola & Pimpinan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nama Parameter / Label *</label>
                        <input id="modal-label" type="text" required placeholder="Contoh: Slogan Resmi / Visi..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Isi Konten / Pernyataan Teks *</label>
                    <textarea id="modal-isi" rows="3" required placeholder="Tuliskan teks konten di sini..." class="w-full px-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-blue-600 focus:outline-none"></textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModalProfil();" class="px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold text-slate-600 hover:bg-slate-100">Batal</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl bg-blue-900 text-white text-xs font-bold hover:bg-blue-800 shadow-md">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    <!-- Tabel Data Profil & Visi Misi -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-base font-bold text-slate-900">Tabel Rincian Konten Halaman Profil</h2>
                <p class="text-xs text-slate-500">Seluruh butir informasi yang terstruktur di halaman profil program studi.</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-xs text-slate-500">Total Butir:</span>
                <span class="px-2.5 py-1 rounded-md text-xs font-bold bg-blue-50 text-blue-900">7 Komponen</span>
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
                    <!-- Row 1: Slogan -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">1</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-amber-50 text-amber-800">
                                Identitas & Slogan
                            </span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">
                            Slogan Resmi Prodi
                        </td>
                        <td class="px-6 py-4 font-medium text-slate-700 italic">
                            “Creating Memories, Inspiring Journey, And Connecting Cultures, Creating Futures”
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Tayang</span>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <button onclick="editModal('Identitas & Slogan', 'Slogan Resmi Prodi', 'Creating Memories, Inspiring Journey, And Connecting Cultures, Creating Futures')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">
                                Sunting
                            </button>
                        </td>
                    </tr>

                    <!-- Row 2: Visi -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">2</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-blue-50 text-blue-900">
                                Visi Prodi
                            </span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">
                            Visi Utama Kelembagaan
                        </td>
                        <td class="px-6 py-4 text-slate-700 leading-relaxed">
                            Menjadi program studi sarjana pariwisata yang unggul, berjiwa wirausaha, berbasis kearifan lokal, serta mampu bersaing di tingkat nasional dan internasional dalam pengembangan industri kepariwisataan berkelanjutan.
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Tayang</span>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <button onclick="editModal('Visi Program Studi', 'Visi Utama Kelembagaan', 'Menjadi program studi sarjana pariwisata yang unggul, berjiwa wirausaha, berbasis kearifan lokal, serta mampu bersaing di tingkat nasional dan internasional dalam pengembangan industri kepariwisataan berkelanjutan.')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">
                                Sunting
                            </button>
                        </td>
                    </tr>

                    <!-- Row 3: Misi 1 -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">3</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-emerald-50 text-emerald-800">
                                Misi Prodi
                            </span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">
                            Misi 1: Pendidikan
                        </td>
                        <td class="px-6 py-4 text-slate-700 leading-relaxed">
                            Menyelenggarakan pendidikan sarjana pariwisata berkualitas tinggi berbasis kurikulum aplikatif dan kemitraan industri hospitality.
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Tayang</span>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <button onclick="editModal('Misi Program Studi', 'Misi 1: Pendidikan', 'Menyelenggarakan pendidikan sarjana pariwisata berkualitas tinggi berbasis kurikulum aplikatif dan kemitraan industri hospitality.')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">
                                Sunting
                            </button>
                        </td>
                    </tr>

                    <!-- Row 4: Misi 2 -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">4</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-emerald-50 text-emerald-800">
                                Misi Prodi
                            </span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">
                            Misi 2: Penelitian
                        </td>
                        <td class="px-6 py-4 text-slate-700 leading-relaxed">
                            Melaksanakan penelitian terapan di bidang perhotelan, MICE, dan manajemen destinasi yang bermanfaat bagi masyarakat luas.
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Tayang</span>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <button onclick="editModal('Misi Program Studi', 'Misi 2: Penelitian', 'Melaksanakan penelitian terapan di bidang perhotelan, MICE, dan manajemen destinasi yang bermanfaat bagi masyarakat luas.')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">
                                Sunting
                            </button>
                        </td>
                    </tr>

                    <!-- Row 5: Misi 3 -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">5</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-emerald-50 text-emerald-800">
                                Misi Prodi
                            </span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">
                            Misi 3: Pengabdian
                        </td>
                        <td class="px-6 py-4 text-slate-700 leading-relaxed">
                            Mengabdi kepada masyarakat melalui pendampingan desa wisata dan pemberdayaan pelaku usaha pariwisata lokal Sumatera Barat.
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Tayang</span>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <button onclick="editModal('Misi Program Studi', 'Misi 3: Pengabdian', 'Mengabdi kepada masyarakat melalui pendampingan desa wisata dan pemberdayaan pelaku usaha pariwisata lokal Sumatera Barat.')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">
                                Sunting
                            </button>
                        </td>
                    </tr>

                    <!-- Row 6: Pimpinan Prodi -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">6</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-purple-50 text-purple-800">
                                Tata Kelola
                            </span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">
                            Ketua Program Studi
                        </td>
                        <td class="px-6 py-4 text-slate-700 leading-relaxed">
                            Memimpin tata kelola akademik, kurikulum, serta kerja sama kelembagaan prodi S1 Pariwisata UNIDHA.
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Tayang</span>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <button onclick="editModal('Tata Kelola & Pimpinan', 'Ketua Program Studi', 'Memimpin tata kelola akademik, kurikulum, serta kerja sama kelembagaan prodi S1 Pariwisata UNIDHA.')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">
                                Sunting
                            </button>
                        </td>
                    </tr>

                    <!-- Row 7: Sekretaris Prodi -->
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">7</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-purple-50 text-purple-800">
                                Tata Kelola
                            </span>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-900">
                            Sekretaris Program Studi
                        </td>
                        <td class="px-6 py-4 text-slate-700 leading-relaxed">
                            Mengelola administrasi perkuliahan, kemahasiswaan, dan penjaminan mutu mutu internal prodi.
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Tayang</span>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <button onclick="editModal('Tata Kelola & Pimpinan', 'Sekretaris Program Studi', 'Mengelola administrasi perkuliahan, kemahasiswaan, dan penjaminan mutu mutu internal prodi.')" class="text-blue-900 hover:text-amber-600 font-bold hover:underline">
                                Sunting
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function openModalTambahProfil() {
        document.getElementById('modal-title').innerText = 'Tambah Butir Data Profil';
        document.getElementById('modal-mode').value = 'tambah';
        document.getElementById('modal-kategori').value = 'Identitas & Slogan';
        document.getElementById('modal-label').value = '';
        document.getElementById('modal-isi').value = '';
        document.getElementById('modal-edit-profil').classList.remove('hidden');
    }

    function editModal(kategori, label, isi) {
        document.getElementById('modal-title').innerText = 'Sunting: ' + label;
        document.getElementById('modal-mode').value = 'edit';
        document.getElementById('modal-kategori').value = kategori;
        document.getElementById('modal-label').value = label;
        document.getElementById('modal-isi').value = isi;
        document.getElementById('modal-edit-profil').classList.remove('hidden');
    }

    function closeModalProfil() {
        document.getElementById('modal-edit-profil').classList.add('hidden');
    }

    function handleFormProfil(e) {
        e.preventDefault();
        const mode = document.getElementById('modal-mode').value;
        closeModalProfil();
        if (mode === 'tambah') {
            notifySuccess('Butir data profil berhasil ditambahkan!');
        } else {
            notifySuccess('Perubahan profil berhasil disimpan!');
        }
    }
</script>
@endsection
