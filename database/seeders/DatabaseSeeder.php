<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Setting;
use App\Models\HeroSlide;
use App\Models\News;
use App\Models\Curriculum;
use App\Models\ProfileItem;
use App\Models\LandingElement;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@pariwisata.unidha.ac.id'],
            [
                'name' => 'Administrator S1 Pariwisata',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Settings (Identitas, Kontak, Footer, dll)
        $settings = [
            // General
            'site_name' => 'Program Studi S1 Pariwisata',
            'university' => 'Universitas Dharma Andalas',
            'faculty' => 'Fakultas Ekonomi dan Bisnis',
            'slogan' => 'Creating Memories, Inspiring Journey, And Connecting Cultures, Creating Futures',
            'degree' => 'Sarjana Pariwisata (S.Par.)',
            'total_sks' => '144',
            
            // Contact & Location
            'email' => 'pariwisata@unidha.ac.id',
            'address' => 'Jl. Sawahan No.103, Simpang Haru, Kec. Padang Timur, Kota Padang, Sumatera Barat 25000, Indonesia.',
            'phone' => '(0751) 333129',
            'operating_hours' => 'Senin - Jumat, 08.00 - 16.00 WIB',
            
            // Social Media
            'instagram_prodi' => '@s1pariwisata_unidha',
            'instagram_himpar' => '@himpar.unidha',
            'tiktok' => '@unidha_official',
            'youtube' => 'Universitas Dharma Andalas Official',
            
            // SPMB
            'spmb_status' => 'Pendaftaran Dibuka (SPMB 2026)',
            'spmb_url' => 'https://pmb.unidha.ac.id/',
            
            // Footer
            'footer_about' => 'Program Studi S1 Pariwisata Fakultas Ekonomi dan Bisnis Universitas Dharma Andalas berkomitmen menyelenggarakan pendidikan tinggi berkualitas, berkarakter, dan berdaya saing global di bidang industri pariwisata & hospitality.',
            'footer_copyright' => 'Program Studi S1 Pariwisata - Universitas Dharma Andalas. Hak Cipta Dilindungi.',
            'organization_name' => 'Himpunan Mahasiswa Pariwisata Dharma Andalas (HIMPAR)',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }

        // 3. Hero Slides (Official Unidha Tourism Content)
        HeroSlide::truncate();
        $slides = [
            [
                'eyebrow' => 'Program Studi S1 Pariwisata UNIDHA',
                'title' => 'Selamat Datang di S1 Pariwisata UNIDHA',
                'subtitle' => '“Creating Memories, Inspiring Journey, And Connecting Cultures, Creating Futures”',
                'image' => 'https://pariwisata.unidha.ac.id/wp-content/uploads/2026/07/WhatsApp-Image-2026-07-03-at-16.18.04.jpeg',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'eyebrow' => 'Hospitality & MICE Industri',
                'title' => 'Pendidikan Berkualitas & Berwawasan Global',
                'subtitle' => 'Mempersiapkan sarjana pariwisata yang visioner, kompeten, dan siap memimpin industri hospitality modern.',
                'image' => 'https://pariwisata.unidha.ac.id/wp-content/uploads/2026/07/Hotel-MICE-Modern-di-Pusat-Ubud-SenS-Hotel-Spa-Hadirkan-Ballroom-dan-Fasilitas-Konferensi-Lengkap-1-e1747237185343.jpg',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'eyebrow' => 'Tour & Destinasi Berkelanjutan',
                'title' => 'Kembangkan Potensi Wisata Nusantara',
                'subtitle' => 'Praktek lapangan terpadu, kepemanduan profesional, dan kolaborasi destinasi pariwisata Minangkabau.',
                'image' => 'https://pariwisata.unidha.ac.id/wp-content/uploads/2026/07/gambar-tour-guide-10.jpg',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'eyebrow' => 'Penerimaan Mahasiswa Baru 2026',
                'title' => 'Bergabung Bersama S1 Pariwisata UNIDHA',
                'subtitle' => 'Wujudkan masa depan gemilang dengan gelar Sarjana Pariwisata (S.Par.) bersama pengajar terbaik.',
                'image' => 'https://pariwisata.unidha.ac.id/wp-content/uploads/2026/07/QzxyPf2tOCFlYzYknAmqPYhGnx00ti4HEadIQdJa-scaled.jpg',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::create($slide);
        }

        // 4. News (Real content from reference pariwisata.unidha.ac.id)
        News::truncate();
        $newsItems = [
            [
                'title' => 'Civitas Akademika UNIDHA Apresiasi Pencapaian Kaprodi S1 Pariwisata, Ibu Eka Mariyanti, M.Par., PhD Sebagai Wisudawati Terbaik Magister Pariwisata IP Trisakti',
                'slug' => 'civitas-akademika-unidha-apresiasi-pencapaian-kaprodi-s1-pariwisata',
                'category' => 'Prestasi Dosen',
                'author' => 'WebAdminS1Pariwisata',
                'date_text' => '13 Oktober 2026',
                'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80',
                'summary' => 'PADANG — Dekan Fakultas Ekonomi dan Bisnis (FEB) Universitas Dharma Andalas (UNIDHA), Bapak Heru Aulia Azman, S.Sos, MM, PhD, menyampaikan apresiasi atas kelulusan terbaik Kaprodi S1 Pariwisata.',
                'content' => "Padang — Civitas akademika Universitas Dharma Andalas dengan bangga mengapresiasi pencapaian Ketua Program Studi S1 Pariwisata, Ibu Eka Mariyanti, S.E., M.M., M.Par., Ph.D., yang dinobatkan sebagai Wisudawati Terbaik Program Magister Pariwisata di Institut Pariwisata Trisakti Jakarta.\n\nPencapaian ini mencerminkan komitmen tinggi program studi dalam menjaga standar mutu pengajaran dan memperkaya keilmuan akademis kepariwisataan.\n\nDekan FEB UNIDHA menyampaikan bahwa peningkatan kualifikasi dosen secara berkesinambungan menjadi modal utama dalam mendidik lulusan Sarjana Pariwisata yang adaptif dan kompetitif.",
                'tags' => ['Prestasi', 'Dosen', 'UNIDHA', 'Trisakti'],
                'is_published' => true,
            ],
            [
                'title' => 'S1 Pariwisata UNIDHA Ucapkan Selamat HUT Kota Padang ke-357: Dukung Penuh Langkah Menuju Gastronomy City',
                'slug' => 's1-pariwisata-unidha-ucapkan-selamat-hut-kota-padang-ke-357',
                'category' => 'Pariwisata Daerah',
                'author' => 'WebAdminS1Pariwisata',
                'date_text' => '07 Agustus 2026',
                'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80',
                'summary' => 'Program Studi S1 Pariwisata Universitas Dharma Andalas (UNIDHA) menyampaikan ucapan selamat ulang tahun untuk Kota Padang dan mendukung penguatan Kota Gastronomi Dunia.',
                'content' => "Program Studi S1 Pariwisata Universitas Dharma Andalas menyampaikan komitmennya dalam mendukung akselerasi Kota Padang sebagai Gastronomy City berkelas internasional.\n\nKekayaan kuliner Minangkabau yang telah diakui dunia menjadi laboratorium hidup bagi mahasiswa S1 Pariwisata UNIDHA dalam mengembangkan riset pariwisata kuliner dan manajemen event kuliner.\n\nSinergi antara akademisi dan pemerintah daerah terus diperkuat melalui pelatihan kelompok sadar wisata dan tata kelola atraksi wisata kuliner.",
                'tags' => ['HUT Padang', 'Gastronomi', 'Kuliner Minang', 'Pariwisata'],
                'is_published' => true,
            ],
            [
                'title' => 'Kuliah Umum: Mengembangkan Potensi Industri Hospitality & MICE di Era Global',
                'slug' => 'kuliah-umum-prospek-industri-hospitality-dan-mice-2026',
                'category' => 'Akademik',
                'author' => 'Humas S1 Pariwisata',
                'date_text' => '12 Oktober 2026',
                'image' => 'https://pariwisata.unidha.ac.id/wp-content/uploads/2026/07/Hotel-MICE-Modern-di-Pusat-Ubud-SenS-Hotel-Spa-Hadirkan-Ballroom-dan-Fasilitas-Konferensi-Lengkap-1-e1747237185343.jpg',
                'summary' => 'Program Studi S1 Pariwisata UNIDHA menghadirkan praktisi perhotelan bintang lima guna membekali mahasiswa dengan wawasan dinamika pariwisata dan event internasional.',
                'content' => "Padang — Program Studi S1 Pariwisata Universitas Dharma Andalas menggelar kuliah umum bertajuk \"Mengembangkan Potensi Industri Hospitality & MICE di Era Global\" yang dihadiri oleh seluruh mahasiswa pariwisata dan dosen.\n\nNarasumber mengulas pentingnya pemahaman etika perhotelan berstandar global, manajemen convention, serta implementasi pariwisata hijau di destinasi unggulan.",
                'tags' => ['Hospitality', 'MICE', 'Kuliah Umum', 'UNIDHA'],
                'is_published' => true,
            ],
            [
                'title' => 'Praktik Lapangan: Mahasiswa S1 Pariwisata Eksplorasi Destinasi & Warisan Budaya Sumatera Barat',
                'slug' => 'praktik-lapangan-eksplorasi-warisan-budaya-sumatera-barat',
                'category' => 'Kegiatan Mahasiswa',
                'author' => 'HIMPAR UNIDHA',
                'date_text' => '28 September 2026',
                'image' => 'https://pariwisata.unidha.ac.id/wp-content/uploads/2026/07/gambar-tour-guide-10.jpg',
                'summary' => 'Mahasiswa melakukan observasi langsung terhadap tata kelola desa wisata dan pelestarian budaya lokal sebagai bagian integrasi mata kuliah perencanaan destinasi.',
                'content' => "Sebagai wujud pembelajaran berbasis pengalaman nyata (experiential learning), mahasiswa Program Studi S1 Pariwisata UNIDHA melaksanakan studi lapangan ke sejumlah situs budaya dan desa wisata di Sumatera Barat.\n\nMahasiswa mempraktekkan pemanduan wisata (*tour guiding*), penyusunan itinerary, dan analisis potensi pengembangan desa wisata ramah lingkungan.",
                'tags' => ['Field Trip', 'Budaya Minang', 'Desa Wisata', 'Destinasi'],
                'is_published' => true,
            ],
        ];

        foreach ($newsItems as $item) {
            News::create($item);
        }

        // 5. Curricula (Mata Kuliah Lengkap S1 Pariwisata)
        Curriculum::truncate();
        $courses = [
            ['kode' => 'PAR-101', 'nama' => 'Pengantar Ilmu Pariwisata & Hospitaliti', 'sks' => 3, 'semester' => 1, 'konsentrasi' => 'Inti Pariwisata', 'sifat' => 'Wajib'],
            ['kode' => 'PAR-102', 'nama' => 'Geografi Pariwisata Indonesia & Dunia', 'sks' => 3, 'semester' => 1, 'konsentrasi' => 'Destinasi', 'sifat' => 'Wajib'],
            ['kode' => 'PAR-103', 'nama' => 'Komunikasi Bisnis & Bahasa Inggris Pariwisata I', 'sks' => 2, 'semester' => 1, 'konsentrasi' => 'Hospitality', 'sifat' => 'Wajib'],
            ['kode' => 'PAR-201', 'nama' => 'Operasional & Tata Kelola Perhotelan (Hotel Operations)', 'sks' => 3, 'semester' => 2, 'konsentrasi' => 'Hospitality', 'sifat' => 'Wajib'],
            ['kode' => 'PAR-202', 'nama' => 'Manajemen Perjalanan & Biro Wisata (Tour & Travel)', 'sks' => 3, 'semester' => 2, 'konsentrasi' => 'Destinasi', 'sifat' => 'Wajib'],
            ['kode' => 'PAR-203', 'nama' => 'Sosiologi & Antropologi Pariwisata Minangkabau', 'sks' => 2, 'semester' => 2, 'konsentrasi' => 'Inti Pariwisata', 'sifat' => 'Wajib'],
            ['kode' => 'PAR-301', 'nama' => 'Manajemen MICE & Perencanaan Event (Convention)', 'sks' => 3, 'semester' => 3, 'konsentrasi' => 'Hospitality', 'sifat' => 'Wajib'],
            ['kode' => 'PAR-302', 'nama' => 'Pemasaran Pariwisata Digital & E-Tourism', 'sks' => 3, 'semester' => 3, 'konsentrasi' => 'Inti Pariwisata', 'sifat' => 'Wajib'],
            ['kode' => 'PAR-303', 'nama' => 'Perencanaan & Pengembangan Destinasi Wisata', 'sks' => 3, 'semester' => 3, 'konsentrasi' => 'Destinasi', 'sifat' => 'Wajib'],
            ['kode' => 'PAR-401', 'nama' => 'Tata Kelola Makanan & Minuman (F&B Management)', 'sks' => 3, 'semester' => 4, 'konsentrasi' => 'Hospitality', 'sifat' => 'Wajib'],
            ['kode' => 'PAR-402', 'nama' => 'Ekowisata & Pariwisata Berkelanjutan (Sustainable Tourism)', 'sks' => 3, 'semester' => 4, 'konsentrasi' => 'Destinasi', 'sifat' => 'Wajib'],
            ['kode' => 'PAR-403', 'nama' => 'Kewirausahaan Pariwisata & Bisnis Kreatif', 'sks' => 2, 'semester' => 4, 'konsentrasi' => 'Inti Pariwisata', 'sifat' => 'Wajib'],
            ['kode' => 'PAR-501', 'nama' => 'Manajemen Resort & Spa Terpadu', 'sks' => 3, 'semester' => 5, 'konsentrasi' => 'Hospitality', 'sifat' => 'Pilihan'],
            ['kode' => 'PAR-502', 'nama' => 'Pemberdayaan Desa Wisata Berbasis Komunitas (CBT)', 'sks' => 3, 'semester' => 5, 'konsentrasi' => 'Destinasi', 'sifat' => 'Pilihan'],
            ['kode' => 'PAR-601', 'nama' => 'Praktik Kerja Lapangan (Magang Industri Hotel & Tour)', 'sks' => 6, 'semester' => 6, 'konsentrasi' => 'Inti Pariwisata', 'sifat' => 'Wajib'],
            ['kode' => 'PAR-701', 'nama' => 'Metodologi Penelitian Pariwisata & Seminar Proposal', 'sks' => 3, 'semester' => 7, 'konsentrasi' => 'Inti Pariwisata', 'sifat' => 'Wajib'],
            ['kode' => 'PAR-801', 'nama' => 'Skripsi / Tugas Akhir Sarjana Pariwisata', 'sks' => 6, 'semester' => 8, 'konsentrasi' => 'Inti Pariwisata', 'sifat' => 'Wajib'],
        ];

        foreach ($courses as $c) {
            Curriculum::create($c);
        }

        // 6. Profile Items (Tabel Profil & Visi Misi S1 Pariwisata UNIDHA)
        ProfileItem::truncate();
        $profileData = [
            ['kategori' => 'Identitas & Slogan', 'label' => 'Nama Program Studi', 'isi' => 'Program Studi S1 Pariwisata', 'keterangan' => 'Resmi Kemendikbudristek', 'order' => 1],
            ['kategori' => 'Identitas & Slogan', 'label' => 'Fakultas Naungan', 'isi' => 'Fakultas Ekonomi dan Bisnis (FEB) Universitas Dharma Andalas', 'keterangan' => 'Unit Pengelola Program Studi', 'order' => 2],
            ['kategori' => 'Identitas & Slogan', 'label' => 'Slogan Resmi Prodi', 'isi' => '“Creating Memories, Inspiring Journey, And Connecting Cultures, Creating Futures”', 'keterangan' => 'Tagline Utama', 'order' => 3],
            ['kategori' => 'Identitas & Slogan', 'label' => 'Gelar Lulusan & Jenjang', 'isi' => 'Sarjana Pariwisata (S.Par.) - Jenjang Strata 1 (S1)', 'keterangan' => 'Total 144 SKS', 'order' => 4],
            ['kategori' => 'Visi Program Studi', 'label' => 'Visi Keilmuan', 'isi' => 'Menjadi Program Studi S1 Pariwisata yang unggul, berkarakter, dan berdaya saing global dalam pengembangan sustainable tourism dan industri hospitality modern pada tahun 2030.', 'keterangan' => 'Target 2030', 'order' => 5],
            ['kategori' => 'Misi Program Studi', 'label' => 'Misi 1: Pendidikan & Pengajaran', 'isi' => 'Menyelenggarakan pendidikan sarjana pariwisata berbasis kurikulum terapan yang adaptif terhadap industri perhotelan, MICE, dan manajemen destinasi.', 'keterangan' => 'Pilar Tri Dharma', 'order' => 6],
            ['kategori' => 'Misi Program Studi', 'label' => 'Misi 2: Penelitian & Publikasi', 'isi' => 'Mengembangkan penelitian inovatif di bidang ekowisata, kearifan lokal Minangkabau, dan transformasi digital pariwisata yang bereputasi nasional dan internasional.', 'keterangan' => 'Pilar Tri Dharma', 'order' => 7],
            ['kategori' => 'Misi Program Studi', 'label' => 'Misi 3: Pengabdian Masyarakat', 'isi' => 'Melaksanakan pengabdian kepada masyarakat melalui pendampingan kelompok sadar wisata (Pokdarwis) dan pemberdayaan desa wisata berkelanjutan.', 'keterangan' => 'Pilar Tri Dharma', 'order' => 8],
            ['kategori' => 'Misi Program Studi', 'label' => 'Misi 4: Kerjasama Industri', 'isi' => 'Memperluas kemitraan strategis dengan industri perhotelan, biro perjalanan, asosiasi profesi, dan dinas pariwisata di dalam maupun luar negeri.', 'keterangan' => 'Pilar Kerjasama', 'order' => 9],
            ['kategori' => 'Tata Kelola & Pimpinan', 'label' => 'Ketua Program Studi', 'isi' => 'Eka Mariyanti, S.E., M.M., M.Par., Ph.D.', 'keterangan' => 'Wisudawati Terbaik Magister Pariwisata', 'order' => 10],
            ['kategori' => 'Tata Kelola & Pimpinan', 'label' => 'Dekan Fakultas Ekonomi & Bisnis', 'isi' => 'Heru Aulia Azman, S.Sos., M.M., Ph.D.', 'keterangan' => 'Pimpinan Fakultas', 'order' => 11],
            ['kategori' => 'Tata Kelola & Pimpinan', 'label' => 'Rektor Universitas Dharma Andalas', 'isi' => 'Prof. Dr. Novesar Jamarun, MS', 'keterangan' => 'Pimpinan Universitas', 'order' => 12],
        ];

        foreach ($profileData as $item) {
            ProfileItem::create($item);
        }

        // 7. Landing Elements (Seluruh 12 Butir Komponen Beranda)
        LandingElement::truncate();
        $landingItems = [
            ['seksi' => 'Hero Section', 'parameter' => 'Hero Headline Tag', 'konten' => "Let's Go to Join With Us", 'cta_text' => null, 'cta_link' => null, 'status' => 'Aktif'],
            ['seksi' => 'Hero Section', 'parameter' => 'Slogan Utama Hero', 'konten' => "“Creating Memories, Inspiring Journey, And Connecting Cultures, Creating Futures”", 'cta_text' => null, 'cta_link' => null, 'status' => 'Aktif'],
            ['seksi' => 'Hero Section', 'parameter' => 'Deskripsi Pengantar Hero', 'konten' => "Mempersiapkan sarjana pariwisata yang visioner, kompeten, dan siap memimpin industri pariwisata nasional maupun internasional melalui kurikulum terapan, praktik langsung, dan jejaring industri hospitality.", 'cta_text' => 'JOIN US SEKARANG', 'cta_link' => '/spmb-2026', 'status' => 'Aktif'],
            ['seksi' => 'Hero Section', 'parameter' => 'Visual Card Destinasi', 'konten' => "Foto Lanskap Pariwisata & Teks: “Membangun Masa Depan Pariwisata Indonesia - Menghubungkan potensi pariwisata Minangkabau dengan standar global.”", 'cta_text' => 'Badge Industri', 'cta_link' => '/admin/banner-logo', 'status' => 'Aktif'],
            ['seksi' => 'Institusi & Yayasan', 'parameter' => 'Pengenalan UNIDHA', 'konten' => "Yayasan Pendidikan Dharma Andalas didirikan oleh alumni Unand (SK 2011) menaungi Universitas Dharma Andalas (SK Mendikbud 2014) di Jl. Sawahan No.103 Padang berkomitmen mencetak SDM unggul di sektor pariwisata.", 'cta_text' => '3 Poin Unggulan', 'cta_link' => '/profil', 'status' => 'Aktif'],
            ['seksi' => 'Prospek Karier', 'parameter' => 'Pilar 01: Perhotelan & MICE', 'konten' => "Sektor Perhotelan, Akomodasi, & MICE: Karier sebagai Hotel Manager, Food & Beverage Specialist, Event & Convention Organizer, Banquet Planner, hingga pengelola resort mewah berstandar internasional.", 'cta_text' => 'Badge Pilar 01', 'cta_link' => '/akademik', 'status' => 'Aktif'],
            ['seksi' => 'Prospek Karier', 'parameter' => 'Pilar 02: Tour & Destinasi', 'konten' => "Industri Perjalanan, Tour & Destinasi: Profesional perancang tur, konsultan travel & trip planner, pengembang desa wisata, manajer destinasi ekowisata, serta entrepreneur di bidang pariwisata kreatif.", 'cta_text' => 'Badge Pilar 02', 'cta_link' => '/akademik', 'status' => 'Aktif'],
            ['seksi' => 'Prospek Karier', 'parameter' => 'Pilar 03: Pemerintah & Akademisi', 'konten' => "Instansi Pemerintah & Akademisi: Birokrat di Kementerian Pariwisata, Dinas Pariwisata Daerah, analis kebijakan kepariwisataan, peneliti, pengajar, serta konsultan pengembangan aset wilayah.", 'cta_text' => 'Badge Pilar 03', 'cta_link' => '/akademik', 'status' => 'Aktif'],
            ['seksi' => 'Berita Beranda', 'parameter' => 'Section Berita & Artikel', 'konten' => "Menampilkan berita dan agenda akademik terbaru secara otomatis dari basis data program studi.", 'cta_text' => 'Lihat Semua Berita', 'cta_link' => '/berita', 'status' => 'Aktif'],
            ['seksi' => 'Promosi SPMB', 'parameter' => 'Banner Penerimaan SPMB 2026', 'konten' => "“Wujudkan Cita-cita Karier Pariwisata Anda Bersama UNIDHA” — Bergabunglah bersama keluarga besar Program Studi S1 Pariwisata Universitas Dharma Andalas dengan fasilitas lengkap dan magang hotel berbintang.", 'cta_text' => 'Daftar SPMB Online', 'cta_link' => '/spmb-2026', 'status' => 'Aktif'],
            ['seksi' => 'Footer Bawah', 'parameter' => 'Footer Deskripsi & Slogan', 'konten' => "Slogan resmi dan narasi komitmen Program Studi S1 Pariwisata Fakultas Ekonomi dan Bisnis UNIDHA mencetak insan berwawasan global.", 'cta_text' => 'Instagram & Email', 'cta_link' => '/admin/pengaturan', 'status' => 'Aktif'],
            ['seksi' => 'Footer Bawah', 'parameter' => 'Footer Alamat & Hak Cipta', 'konten' => "Jl. Sawahan No.103 Padang, pariwisata@unidha.ac.id, Copyright & Organisasi Mahasiswa HIMPAR.", 'cta_text' => 'Kontak & Medsos', 'cta_link' => '/admin/pengaturan', 'status' => 'Aktif'],
        ];

        foreach ($landingItems as $elem) {
            LandingElement::create($elem);
        }
    }
}
