<?php

namespace App\Services;

class NewsDataService
{
    /**
     * Dapatkan daftar berita sementara untuk demonstrasi frontend sebelum database diintegrasikan.
     * Menggunakan konteks kegiatan nyata pariwisata, hospitality, dan akademik UNIDHA.
     */
    public static function getAll(): array
    {
        return [
            [
                'slug' => 'kuliah-umum-prospek-industri-hospitality-dan-mice-2026',
                'title' => 'Kuliah Umum: Mengembangkan Potensi Industri Hospitality & MICE di Era Global',
                'date' => '12 Oktober 2026',
                'category' => 'Akademik',
                'author' => 'Humas S1 Pariwisata',
                'image' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1200&q=80',
                'summary' => 'Program Studi S1 Pariwisata UNIDHA menghadirkan praktisi perhotelan bintang lima dan penggiat MICE guna membekali mahasiswa dengan wawasan dinamika pariwisata terkini.',
                'content' => [
                    'Padang — Program Studi S1 Pariwisata Universitas Dharma Andalas menggelar kuliah umum bertajuk "Mengembangkan Potensi Industri Hospitality & MICE di Era Global" yang dihadiri oleh seluruh mahasiswa pariwisata dan dosen di lingkungan kampus UNIDHA Padang.',
                    'Kegiatan ini bertujuan untuk memperluas pemahaman mahasiswa mengenai kompetensi praktis yang dibutuhkan dunia industri perhotelan, manajemen destinasi, serta pengelolaan Meeting, Incentive, Convention, and Exhibition (MICE). Dalam sesi pemaparan, narasumber membagikan wawasan mengenai transformasi digital dalam layanan perhotelan serta adaptasi budaya lokal pada atraksi wisata modern.',
                    'Ketua Program Studi menekankan pentingnya penguasaan komunikasi multibahasa, etika hospitality, dan pemahaman tata kelola destinasi yang berkelanjutan. Diharapkan mahasiswa dapat mempersiapkan diri secara matang dalam menghadapi kurikulum berbasis praktik dan magang industri di berbagai mitra strategis.',
                    'Melalui kegiatan semacam ini, Program Studi S1 Pariwisata UNIDHA terus berkomitmen menjembatani kurikulum akademis dengan kebutuhan riil industri kepariwisataan nasional maupun internasional.'
                ],
                'tags' => ['Hospitality', 'MICE', 'Kuliah Umum', 'UNIDHA']
            ],
            [
                'slug' => 'praktik-lapangan-eksplorasi-warisan-budaya-sumatera-barat',
                'title' => 'Praktik Lapangan: Mahasiswa S1 Pariwisata Eksplorasi Destinasi & Warisan Budaya Sumatera Barat',
                'date' => '28 September 2026',
                'category' => 'Kegiatan Mahasiswa',
                'author' => 'HIMPAR UNIDHA',
                'image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?auto=format&fit=crop&w=1200&q=80',
                'summary' => 'Mahasiswa melakukan observasi langsung terhadap tata kelola desa wisata dan pelestarian budaya lokal sebagai bagian integrasi mata kuliah perencanaan destinasi.',
                'content' => [
                    'Sebagai wujud pembelajaran berbasis pengalaman nyata (experiential learning), mahasiswa Program Studi S1 Pariwisata UNIDHA melaksanakan studi lapangan ke sejumlah situs budaya dan desa wisata unggulan di Sumatera Barat.',
                    'Dalam kunjungan ini, mahasiswa belajar langsung bagaimana kelompok sadar wisata (Pokdarwis) mengelola potensi kearifan lokal menjadi daya tarik wisata berbasis masyarakat (community-based tourism). Selain mengamati keindahan lanskap alam dan keunikan arsitektur tradisional, mahasiswa juga melakukan wawancara dengan pengelola destinasi.',
                    'Data yang dihimpun selama praktik lapangan akan diolah menjadi laporan analisis kelayakan destinasi dan strategi promosi digital. Melalui kegiatan ini, slogan prodi "Creating Memories, Inspiring Journey, And Connecting Cultures" benar-benar dihayati oleh para mahasiswa.',
                    'Hasil observasi ini rencananya juga akan dipresentasikan dalam forum diskusi akademik bersama dosen pembimbing mata kuliah manajemen kepariwisataan.'
                ],
                'tags' => ['Field Trip', 'Budaya Minang', 'Desa Wisata', 'Destinasi']
            ],
            [
                'slug' => 'pelantikan-dan-serah-terima-jabatan-himpar-unidha',
                'title' => 'Pelantikan Pengurus Himpunan Mahasiswa Pariwisata (HIMPAR) UNIDHA Periode Baru',
                'date' => '15 September 2026',
                'category' => 'Kemahasiswaan',
                'author' => 'Redaksi Kampus',
                'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80',
                'summary' => 'Himpunan Mahasiswa Pariwisata Dharma Andalas (HIMPAR) melantik kepengurusan baru yang siap membawa inovasi kegiatan kepariwisataan kampus.',
                'content' => [
                    'Himpunan Mahasiswa Pariwisata Dharma Andalas (HIMPAR) Universitas Dharma Andalas resmi melantik jajaran kepengurusan baru. Acara pelantikan berlangsung khidmat dan dihadiri pimpinan fakultas, pembina kemahasiswaan, dan perwakilan organisasi kemahasiswaan selingkup UNIDHA.',
                    'Ketua HIMPAR terpilih menyampaikan visi untuk memperkuat jejaring kemahasiswaan pariwisata antar-perguruan tinggi, menyelenggarakan lokakarya keterampilan hospitality, dan mengaktifkan kampanye pariwisata ramah lingkungan melalui kanal digital @himpar.unidha.',
                    'Pihak program studi memberikan apresiasi tinggi kepada jajaran pengurus terdahulu atas dedikasinya dan menyemangati jajaran baru untuk terus berkontribusi positif bagi kemajuan almamater dan masyarakat pariwisata.',
                    'Program kerja awal yang dirancang pengurus baru meliputi pengenalan kehidupan kampus bagi mahasiswa baru dan workshop public speaking untuk insan pariwisata.'
                ],
                'tags' => ['HIMPAR', 'Organisasi', 'Mahasiswa', 'Kepemimpinan']
            ],
            [
                'slug' => 'penerimaan-mahasiswa-baru-spmb-2026-prodi-pariwisata-unidha',
                'title' => 'Informasi Penerimaan Mahasiswa Baru S1 Pariwisata UNIDHA Tahun Akademik 2026/2027',
                'date' => '01 September 2026',
                'category' => 'Informasi SPMB',
                'author' => 'Panitia SPMB UNIDHA',
                'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=1200&q=80',
                'summary' => 'Pendaftaran mahasiswa baru jenjang Sarjana (S1) Pariwisata Universitas Dharma Andalas telah dibuka dengan berbagai jalur penerimaan.',
                'content' => [
                    'Universitas Dharma Andalas (UNIDHA) Padang mengumumkan pembukaan Penerimaan Mahasiswa Baru (SPMB) untuk Program Studi S1 Pariwisata Tahun Akademik 2026/2027.',
                    'Program Studi S1 Pariwisata UNIDHA dirancang guna menjawab tingginya kebutuhan tenaga profesional di sektor kepariwisataan regional, nasional, maupun internasional. Mahasiswa akan dibekali keahlian manajemen perhotelan, perancangan paket wisata, pariwisata berkelanjutan, serta kewirausahaan pariwisata berbasis budaya lokal.',
                    'Calon mahasiswa dapat memilih jalur seleksi reguler maupun jalur prestasi akademik dan non-akademik. Tersedia pula kemudahan informasi pendaftaran melalui kanal daring dan konsultasi langsung di kampus UNIDHA Jl. Sawahan No. 103 Padang.',
                    'Mari bergabung bersama kami: "Let\'s Go to Join With Us" dan wujudkan karier cemerlang di industri masa depan!'
                ],
                'tags' => ['SPMB 2026', 'Pendaftaran', 'Kuliah Padang', 'Pariwisata']
            ]
        ];
    }

    public static function findBySlug(string $slug): ?array
    {
        $all = self::getAll();
        foreach ($all as $item) {
            if ($item['slug'] === $slug) {
                return $item;
            }
        }
        return null;
    }

    public static function getLatest(int $limit = 3): array
    {
        return array_slice(self::getAll(), 0, $limit);
    }
}
