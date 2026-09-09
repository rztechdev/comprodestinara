<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SiteSetting;
use App\Models\Destination;
use App\Models\Story;
use App\Models\Program;
use App\Models\Testimonial;
use App\Models\Stat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin Users
        User::updateOrCreate(
            ['email' => 'admin@destinara.id'],
            [
                'name' => 'Administrator Destinara',
                'password' => Hash::make('admin123'),
            ]
        );

        $adminPassword = config('admin.password', 'Destinara2025*');
        User::updateOrCreate(
            ['email' => config('admin.email', 'kemitraan@destinara.id')],
            [
                'name' => config('admin.name', 'Kemitraan Destinara'),
                'password' => Hash::make($adminPassword),
            ]
        );

        // 2. Site Settings
        $settings = [
            'site_name' => 'Destinara',
            'company_legal_name' => 'PT DESTINARA CHAKRAWAL ARTHA',
            'site_tagline' => 'Menghidupkan Ruang Belajar Nyata di Tapak Nusantara',
            'site_description' => 'Inisiatif pendidikan lapangan dan riset berbasis komunitas yang menjembatani kurikulum institusi dengan kearifan tapak dan pengetahuan lokal di seluruh Nusantara.',
            'contact_email' => 'kemitraan@destinara.id',
            'contact_phone' => '+62 812-8890-4411',
            'contact_whatsapp' => '6281288904411',
            'address_sleman' => 'Jl. Kaliurang KM 14, Sinduharjo, Ngaglik, Sleman, D.I. Yogyakarta',
            'address_jakarta' => 'Jl. Teuku Umar No. 12, Menteng, Jakarta Pusat',
            'office_hours' => 'Senin – Sabtu, 08.00–17.00 WIB',
            'instagram' => 'destinara.id',
            'manifesto_quote' => 'Pendidikan sejati tidak memisahkan insan akademis dari tanah tempat ia berpijak, melainkan mempertemukan kecendekiaan akal dengan kerendahhatian laku warga di perbatasan.',
            'manifesto_author' => 'Piagam Pendidikan Tapak Nusantara • Dewan Penasihat Akademik & Pemangku Adat Mitra',
        ];

        foreach ($settings as $key => $val) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $val]);
        }

        // 3. Destinations
        if (Destination::count() === 0) {
            $destinations = [
                [
                    'name' => 'Hutan Adat Wonosadi & Bukit Karst',
                    'slug' => 'hutan-adat-wonosadi',
                    'category' => 'ekologi',
                    'badge' => 'Konservasi Karst',
                    'location' => 'Gunungkidul, D.I. Yogyakarta',
                    'lead' => 'Laboratorium konservasi mata air karst berbasis hukum adat Sadumuk Bathuk Sanyari Bumi yang menjaga ketahanan air lereng perbukitan.',
                    'description' => 'Di tengah gersangnya batuan gamping Gunung Sewu, kanopi pohon asam purba dan beringin setinggi 40 meter dijaga hukum adat Sadranan, memproteksi formasi rekahan tanah yang melahirkan tiga mata air abadi sepanjang kemarau ekstrem.',
                    'research_focus' => 'Hidrologi karst tersembunyi, taksonomi vegetasi endemik Jawa Selatan, dan mekanisme sanksi sosial pemuliaan hutan tanpa aparat kepolisian.',
                    'module_name' => 'Hidrologi Karst & Adat',
                    'capacity' => '30 Peneliti',
                    'image_path' => 'assets/img/hd/dest-wonosadi.jpg',
                    'is_featured' => true,
                    'is_active' => true,
                    'order' => 1,
                ],
                [
                    'name' => 'Desa Sasak Sade & Budaya Tenun',
                    'slug' => 'desa-sasak-sade',
                    'category' => 'budaya',
                    'badge' => 'Etnomatematika Kriya',
                    'location' => 'Lombok Tengah, Nusa Tenggara Barat',
                    'lead' => 'Pusat studi arsitektur vernakular tahan gempa dan tata krama komunal suku Sasak yang lestari selama empat belas generasi.',
                    'description' => 'Eksplorasi mendalam mengenai kearifan konstruksi atap ilalang dan dinding kotoran kerbau yang terbukti fleksibel menahan gempa tektonik lingkar cincin api, serta transmisi lisan pola geometris motif tenun ikat warisan leluhur Sasak.',
                    'research_focus' => 'Geometri fraktal pada ragam hias kain tenun, sifat termal material tanah liat lokal, dan kedaulatan lumbung pangan keluarga Sasak.',
                    'module_name' => 'Etnomatematika Kriya & Tenun',
                    'capacity' => '24 Peneliti',
                    'image_path' => 'assets/img/hd/dest-sasak-sade.jpg',
                    'is_featured' => true,
                    'is_active' => true,
                    'order' => 2,
                ],
                [
                    'name' => 'Kampung Kopi Kintamani & Subak Abian',
                    'slug' => 'kampung-kopi-kintamani',
                    'category' => 'pangan',
                    'badge' => 'Agroekologi & Subak',
                    'location' => 'Bangli, Bali',
                    'lead' => 'Eksplorasi filosofi Tri Hita Karana melalui sistem Subak Abian yang memadukan perkebunan kopi arabika organik dengan spiritualitas tanah vulkanik.',
                    'description' => 'Di lereng kaldera Gunung Batur, kelompok tani adat mempraktikkan pembagian air dan naungan pohon jeruk purba tanpa bahan kimia sintetis. Mahasiswa mengamati bagaimana kesucian pura berpadu dengan ketelitian pascapanen kopi dunia.',
                    'research_focus' => 'Ekologi tanah vulkanik asam, manajemen kanopi peneduh kopi, mikrobiologi fermentasi alami, dan tata kelola musyawarah subak perkebunan kering.',
                    'module_name' => 'Agroekologi & Subak Abian',
                    'capacity' => '20 Peneliti',
                    'image_path' => 'assets/img/hd/dest-kintamani.jpg',
                    'is_featured' => true,
                    'is_active' => true,
                    'order' => 3,
                ],
                [
                    'name' => 'Desa Adat Waerebo & Arsitektur Kerucut',
                    'slug' => 'desa-adat-waerebo',
                    'category' => 'budaya',
                    'badge' => 'Arsitektur Mbaru Niang',
                    'location' => 'Manggarai, Nusa Tenggara Timur',
                    'lead' => 'Lembah pegunungan terisolir dengan tujuh rumah utama Mbaru Niang yang merefleksikan kosmologi perlindungan alam dan keluarga besar.',
                    'description' => 'Mempelajari sambungan rotan, kayu worok, dan atap lontar bertingkat lima yang melambangkan tahapan kehidupan, cadangan benih pangan jagung, serta persemayaman arwah leluhur di puncak kabut Flores.',
                    'research_focus' => 'Rekayasa ketahanan angin struktur kerucut, antropologi kekerabatan klan komunal, dan etno-arkeologi pemukiman dataran tinggi.',
                    'module_name' => 'Struktur Vernakular & Tata Ruang Adat',
                    'capacity' => '18 Peneliti',
                    'image_path' => 'assets/img/hd/dest-waerebo.jpg',
                    'is_featured' => false,
                    'is_active' => true,
                    'order' => 4,
                ],
                [
                    'name' => 'Kampung Nelayan Bahari Wakatobi',
                    'slug' => 'kampung-nelayan-wakatobi',
                    'category' => 'bahari',
                    'badge' => 'Konservasi Terumbu Adat',
                    'location' => 'Wakatobi, Sulawesi Tenggara',
                    'lead' => 'Kearifan sistem zonasi laut tradisional suku Bajo dan masyarakat pulau karang dalam merawat keanekaragaman segitiga terumbu karang dunia.',
                    'description' => 'Siswa meneliti navigasi astronomi tradisional, pemahaman pasang surut tanpa kompas modern, dan implementasi hukum adat tuturan nenek moyang dalam melarang penangkapan ikan di titik pemijahan alami.',
                    'research_focus' => 'Oseanografi dangkal, taksonomi karang lunak, etnozoologi biota laut, dan adaptasi sosial masyarakat permukiman panggung di atas laut.',
                    'module_name' => 'Kearifan Maritim & Ekologi Pesisir',
                    'capacity' => '25 Peneliti',
                    'image_path' => 'assets/img/hd/dest-wakatobi.jpg',
                    'is_featured' => false,
                    'is_active' => true,
                    'order' => 5,
                ],
            ];

            foreach ($destinations as $item) {
                Destination::create($item);
            }
        }

        // 4. Stories
        if (Story::count() === 0) {
            $stories = [
                [
                    'title' => 'Monograf: Zat Pewarna Alami Sikka di Balik Modernisasi Tekstil',
                    'slug' => 'zat-pewarna-alami-sikka',
                    'category' => 'Etnobotani',
                    'archive_no' => 'Arsip Lapangan No. 042',
                    'read_time' => '8 Menit Baca',
                    'author_name' => 'Dewi Anggraini',
                    'author_role' => 'Fasilitator Lapangan Sikka',
                    'excerpt' => 'Di perbukitan Maumere, perempuan penenun merawat akar mengkudu dan daun tarum bukan semata demi estetika kain, melainkan ikatan spiritual penjagaan hutan rempah Flores.',
                    'content' => '<p>Perjalanan menembus rimbun perbukitan Sikka membawa kita pada aroma tanah basah bercampur fermentasi dedaunan alami. Di sini, para mama penenun tidak mengenal pewarna sintetis buatan pabrik. Setiap helai benang kapas dipintal tangan dan direndam dalam ramuan akar Morinda citrifolia (mengkudu hutan) dan daun Indigofera tinctoria (tarum).</p><p>Proses perendaman membutuhkan waktu berbulan-bulan, mengikuti siklus rembulan dan kelembapan udara. Ada rasa hormat mendalam kepada tanah: pohon yang diambil akarnya tidak boleh dicabut seluruhnya, melainkan disisakan agar tetap hidup dan bertunas kembali.</p><blockquote>"Bagi kami, warna merah tua bukan sekadar pigmen. Ia adalah denyut darah leluhur yang mengalir dalam doa-doa benang." — Mama Maria, Penenun Adat Watublapi.</blockquote><p>Melalui keterlibatan langsung peserta didik Destinara, kami mendokumentasikan formula kimia alami yang mampu bertahan ratusan tahun tanpa luntur, sekaligus menumbuhkan apresiasi tulus bagi kedaulatan pengetahuan perempuan adat nusantara.</p>',
                    'image_path' => 'assets/img/hd/story-sikka.jpg',
                    'published_at' => now()->subDays(4),
                    'is_featured' => true,
                    'is_active' => true,
                ],
                [
                    'title' => 'Pelajaran Musim Tanam dari Tetua Adat Sasak: Mengapa Benih Lokal Tetap Bertahan',
                    'slug' => 'musim-tanam-tetua-adat-sasak',
                    'category' => 'Sosio-Ekologi',
                    'archive_no' => 'Arsip Lapangan No. 039',
                    'read_time' => '6 Menit Baca',
                    'author_name' => 'Dr. Hendro Wicaksono',
                    'author_role' => 'Peneliti Agroekologi',
                    'excerpt' => 'Di tengah ancaman perubahan iklim dan kekeringan ekstrem, lumbung beras padi gogo rancah di Lombok Selatan membuktikan keunggulan seleksi genetik ratusan tahun.',
                    'content' => '<p>Ketika gelombang El Niño melanda wilayah Nusa Tenggara, banyak lahan persawahan modern mengalami gagal panen. Namun, di kantung-kantung desa adat Sasak, padi lokal berbatang tinggi justru kokoh tegak menyerap embun malam.</p><p>Tetua adat memandu rombongan mahasiswa untuk mencatat kalender mangsa dan perilaku burung pemangsa hama. Tanpa pestisida kimia, ekosistem pematang sawah memelihara keseimbangannya sendiri.</p>',
                    'image_path' => 'assets/img/hd/story-sasak.jpg',
                    'published_at' => now()->subDays(12),
                    'is_featured' => false,
                    'is_active' => true,
                ],
                [
                    'title' => 'Menguji Struktur Kayu Ulin Tanpa Paku: Kejeniusan Arsitektur Sambungan Pasak',
                    'slug' => 'arsitektur-kayu-tanpa-paku',
                    'category' => 'Kriya & Material',
                    'archive_no' => 'Arsip Lapangan No. 035',
                    'read_time' => '7 Menit Baca',
                    'author_name' => 'Bagus Prasetyo, S.T.',
                    'author_role' => 'Fasilitator Konstruksi Vernakular',
                    'excerpt' => 'Catatan lapangan bersama 16 mahasiswa arsitektur saat merekonstruksi model pasak geser dan peredam gempa alami pada tiang kayu ulin Kalimantan.',
                    'content' => '<p>Sebelum standar gedung tahan gempa modern dirumuskan, nenek moyang kepulauan telah menyelesaikan masalah getaran tanah melalui sambungan pasak elastis. Kayu tidak diikat mati dengan semen kaku, melainkan dibiarkan bergerak harmonis mengikuti gelombang seismik.</p>',
                    'image_path' => 'assets/img/hd/story-ulin.jpg',
                    'published_at' => now()->subDays(20),
                    'is_featured' => false,
                    'is_active' => true,
                ],
            ];

            foreach ($stories as $item) {
                Story::create($item);
            }
        }

        // 5. Programs
        if (Program::count() === 0) {
            $programs = [
                [
                    'target' => 'sekolah',
                    'title' => 'Ekskursi & Live-in Siswa Sekolah Menengah',
                    'subtitle' => 'Pendidikan Karakter & Pembelajaran Kontekstual Berbasis Tapak',
                    'description' => 'Kurikulum kontekstual terakreditasi mulai dari ekologi maritim, mitigasi bencana berbasis lanskap, hingga etnografi kriya. Dilengkapi logistik tersertifikasi dan instrumen asesmen capaian belajar mandiri siswa.',
                    'features' => [
                        'Modul Pembelajaran Lapangan Lintas Disiplin (Sains, Geografi, Sejarah)',
                        'Pendampingan Fasilitator Profesional & Rasio Pembina 1:8',
                        'Protokol Keselamatan & Asuransi Perjalanan Pelajar Penuh',
                        'Buku Kerja Lapangan & Refleksi Etika Komunitas',
                    ],
                    'image_path' => 'assets/img/hd/sekolah-diskusi.jpg',
                    'cta_text' => 'Pelajari Program Sekolah',
                    'cta_url' => '/untuk-sekolah',
                    'order' => 1,
                    'is_active' => true,
                ],
                [
                    'target' => 'peneliti',
                    'title' => 'Kuliah Kerja Lapangan & Kolaborasi Riset Akademik',
                    'subtitle' => 'Laboratorium Hidup Sains Terapan & Antropologi Budaya',
                    'description' => 'Akses terstruktur ke lanskap penelitian primer dengan perlindungan hak kekayaan intelektual komunitas lokal, dukungan basis data tapak, dan jejaring tetua adat sebagai narasumber primer terverifikasi.',
                    'features' => [
                        'Persetujuan Bebas Didahulukan (FPIC) Resmi dari Lembaga Adat',
                        'Akomodasi Riset, Ruang Transit Sampel, & Jejaring Data Primer',
                        'Fasilitasi Dialog Komunal & Penerjemah Bahasa Lokal',
                        'Dukungan Logistik Ekspedisi di Wilayah Terpencil',
                    ],
                    'image_path' => 'assets/img/hd/peneliti-wawancara.jpg',
                    'cta_text' => 'Pelajari Kolaborasi Riset',
                    'cta_url' => '/untuk-peneliti',
                    'order' => 2,
                    'is_active' => true,
                ],
                [
                    'target' => 'mitra_desa',
                    'title' => 'Kemitraan Kedaulatan Desa & Sanggar Adat',
                    'subtitle' => 'Merawat Ruang Adat, Menjaga Regenerasi Pemuda Lokal',
                    'description' => 'Kedaulatan narasi sepenuhnya berada di tangan komunitas lokal. Dana program dialokasikan langsung untuk kas konservasi sanggar, regenerasi keterampilan muda, dan penjagaan wilayah adat secara berkelanjutan.',
                    'features' => [
                        'Bagi Hasil Adil & Transparan Langsung ke Kas Sanggar Desa',
                        'Pelatihan Fasilitator Muda Desa Tanpa Mengubah Adat Istiadat',
                        'Kedaulatan Pembatasan Jumlah Pengunjung Demi Ketenangan Warga',
                        'Dokumentasi Arsip Digital Pengetahuan Warisan Leluhur',
                    ],
                    'image_path' => 'assets/img/hd/desa-serambi.jpg',
                    'cta_text' => 'Pelajari Kemitraan Desa',
                    'cta_url' => '/mitra-desa',
                    'order' => 3,
                    'is_active' => true,
                ],
            ];

            foreach ($programs as $item) {
                Program::create($item);
            }
        }

        // 6. Testimonials
        if (Testimonial::count() === 0) {
            $testimonials = [
                [
                    'name' => 'Ki Joko Sudarmo',
                    'role' => 'Pemangku Hutan Adat Wonosadi',
                    'institution' => 'Gunungkidul, Yogyakarta',
                    'quote' => 'Destinara tidak membawa rombongan turis yang merusak tanaman atau menuntut perlakuan hotel berbintang. Anak-anak yang datang mau mendengarkan batu dan pohon berbicara, dan santun mencium tangan sesepuh desa.',
                    'avatar_path' => null,
                    'order' => 1,
                    'is_active' => true,
                ],
                [
                    'name' => 'Dr. Ratih Kumalasari, M.Hum.',
                    'role' => 'Dosen Antropologi Terapan',
                    'institution' => 'Fakultas Ilmu Budaya Universitas Indonesia',
                    'quote' => 'Protokol etika FPIC Destinara adalah standar emas baru dalam riset lapangan mahasiswa kami. Bukan sekadar observasi dari luar, melainkan peleburan yang menghasilkan empati dan data lapangan orisinal.',
                    'avatar_path' => null,
                    'order' => 2,
                    'is_active' => true,
                ],
                [
                    'name' => 'Drs. Ignatius Suryanto',
                    'role' => 'Wakil Kepala Sekolah Bidang Kurikulum',
                    'institution' => 'SMA Kolese De Britto',
                    'quote' => 'Siswa kami pulang bukan membawa suvenir murah buatan pabrik, tetapi kesadaran mendalam mengenai cara hidup mandiri warga desa, tanggung jawab ekologi, dan rasa hormat pada kearifan lokal.',
                    'avatar_path' => null,
                    'order' => 3,
                    'is_active' => true,
                ],
            ];

            foreach ($testimonials as $item) {
                Testimonial::create($item);
            }
        }

        // 7. Stats
        if (Stat::count() === 0) {
            $stats = [
                ['value' => '14+', 'label' => 'Tapak Riset Terkurasi', 'order' => 1, 'is_active' => true],
                ['value' => '1.200+', 'label' => 'Pelajar & Peneliti Terfasilitasi', 'order' => 2, 'is_active' => true],
                ['value' => '100%', 'label' => 'Kemitraan Berbasis Etika FPIC', 'order' => 3, 'is_active' => true],
                ['value' => '28', 'label' => 'Modul Pembelajaran Lapangan Aktif', 'order' => 4, 'is_active' => true],
            ];

            foreach ($stats as $item) {
                Stat::create($item);
            }
        }

        // 8. Page Sections (Full CMS)
        $this->call(PageSectionSeeder::class);

        // 9. Team Members (Dewan Kurator)
        $this->call(TeamMemberSeeder::class);
    }
}