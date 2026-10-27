<?php

namespace Database\Seeders;

use App\Models\CustomPage;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TourPackage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@nirwanatour.com'],
            [
                'name' => 'Admin Nirwana Tour',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Site Settings
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => 'Nirwana Tour Lampung',
                'tagline' => 'Jelajahi Dunia, Ciptakan Cerita Tak Terlupakan',
                'owner_name' => 'Kiki M Alfin',
                'owner_title' => 'Pimpinan & Founder',
                'owner_photo' => null,
                'owner_greeting' => 'Perjalanan bukan sekadar berpindah dari satu titik ke titik lain, melainkan sebuah seni merajut kebersamaan, menyelami keindahan nusantara, dan memetik inspirasi hidup. Bersama Nirwana Tour Lampung, kami berkomitmen menyajikan pengalaman wisata berkelas, aman, dan penuh senyuman bagi setiap insan dan instansi.',
                'whatsapp_number' => '6282177889900',
                'email' => 'halo@nirwanatourlampung.com',
                'address' => 'Jl. ZA. Pagar Alam No. 88, Gedong Meneng, Kec. Rajabasa, Kota Bandar Lampung, Lampung 35145',
                'google_maps_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127117.84462106727!2d105.19566675!3d-5.3971396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40da423a2f7c03%3A0x6b7724a87c1c1f28!2sBandar%20Lampung%2C%20Kota%20Bandar%20Lampung%2C%20Lampung!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'instagram_url' => 'https://instagram.com/nirwanatourlampung',
                'facebook_url' => 'https://facebook.com/nirwanatourlampung',
                'years_experience' => '8+ Tahun',
                'total_trips' => '1.500+ Trip',
                'satisfaction_rate' => '99% Kepuasan',
            ]
        );

        // 3. Partners Marquee (16 Mitra untuk 2 Baris Atas & Bawah)
        $partners = [
            // Baris Atas
            ['name' => 'PT PLN (Persero) UID Lampung', 'category' => 'BUMN', 'sort_order' => 1],
            ['name' => 'Universitas Lampung (UNILA)', 'category' => 'Universitas', 'sort_order' => 2],
            ['name' => 'PT Bukit Asam Tbk', 'category' => 'BUMN', 'sort_order' => 3],
            ['name' => 'SMAN 2 Bandar Lampung', 'category' => 'Sekolah', 'sort_order' => 4],
            ['name' => 'Dinas Pendidikan & Kebudayaan Prov. Lampung', 'category' => 'Instansi', 'sort_order' => 5],
            ['name' => 'Bank Mandiri Taspen Lampung', 'category' => 'BUMN', 'sort_order' => 6],
            ['name' => 'PT ASDP Indonesia Ferry (Persero)', 'category' => 'BUMN', 'sort_order' => 7],
            ['name' => 'Dinas Pariwisata & Ekonomi Kreatif Lampung', 'category' => 'Instansi', 'sort_order' => 8],

            // Baris Bawah
            ['name' => 'PT Semen Baturaja Tbk', 'category' => 'BUMN', 'sort_order' => 9],
            ['name' => 'UIN Raden Intan Lampung', 'category' => 'Universitas', 'sort_order' => 10],
            ['name' => 'SMA Al-Kautsar Bandar Lampung', 'category' => 'Sekolah', 'sort_order' => 11],
            ['name' => 'PT Pupuk Sriwidjaja (Pusri)', 'category' => 'BUMN', 'sort_order' => 12],
            ['name' => 'Institut Teknologi Sumatera (ITERA)', 'category' => 'Universitas', 'sort_order' => 13],
            ['name' => 'PT Pertamina Geothermal Energy', 'category' => 'BUMN', 'sort_order' => 14],
            ['name' => 'Bank Lampung', 'category' => 'BUMD', 'sort_order' => 15],
            ['name' => 'Politeknik Negeri Lampung (POLINELA)', 'category' => 'Universitas', 'sort_order' => 16],
        ];

        foreach ($partners as $partner) {
            Partner::updateOrCreate(['name' => $partner['name']], $partner);
        }

        // 4. Services (4 Layanan Utama)
        $services = [
            [
                'title' => 'Paket Wisata Reguler',
                'slug' => 'paket-wisata-reguler',
                'icon' => 'map-pin',
                'short_description' => 'Paket liburan keluarga, komunitas, dan rombongan ke berbagai destinasi unggulan Lampung dan Nusantara dengan fasilitas all-in terlengkap.',
                'full_description' => 'Kami menyediakan paket perjalanan wisata tematik yang dirancang khusus untuk kenyamanan Anda dan keluarga. Mulai dari keindahan bahari Pulau Pahawang, Teluk Kiluan, hingga destinasi eksotis luar pulau seperti Yogyakarta, Bali, Labuan Bajo, dan Danau Toba. Didampingi Tour Leader berlisensi dan armada pariwisata ber-AC standar eksekutif.',
                'whatsapp_text' => 'Halo Admin Nirwana Tour, saya ingin konsultasi mengenai Paket Wisata Reguler.',
                'sort_order' => 1,
            ],
            [
                'title' => 'Study Tour Edukatif',
                'slug' => 'study-tour-edukatif',
                'icon' => 'academic-cap',
                'short_description' => 'Karya wisata sekolah & kampus yang memadukan rekreasi seru dengan pembelajaran budaya, sejarah, sains, dan konservasi alam.',
                'full_description' => 'Dirancang khusus untuk institusi pendidikan (SD, SMP, SMA/SMK, hingga Perguruan Tinggi). Program study tour kami mengedepankan keamanan siswa, akomodasi hotel terverifikasi, makanan higienis, serta kunjungan ke museum, cagar budaya, dan pusat teknologi terdepan di Indonesia.',
                'whatsapp_text' => 'Halo Admin Nirwana Tour, saya ingin konsultasi mengenai Program Study Tour Sekolah/Kampus.',
                'sort_order' => 2,
            ],
            [
                'title' => 'Kunjungan Industri & Dinas',
                'slug' => 'kunjungan-industri-dinas',
                'icon' => 'briefcase',
                'short_description' => 'Fasilitasi studi banding perusahaan, kunjungan pabrik BUMN, dan perjalanan dinas kedinasan dengan standar corporate protokoler.',
                'full_description' => 'Layanan profesional untuk instansi pemerintah dan perusahaan yang membutuhkan pengaturan perjalanan dinas terorganisir. Kami menangani perizinan kunjungan pabrik/BUMN di Kawasan Industri (Jabodetabek, Cikarang, Karawang, Surabaya), meeting room hotel, banquet, dan transportasi delegasi resmi.',
                'whatsapp_text' => 'Halo Admin Nirwana Tour, kami dari instansi/perusahaan ingin berkonsultasi mengenai Kunjungan Industri / Perjalanan Dinas.',
                'sort_order' => 3,
            ],
            [
                'title' => 'Sewa Transportasi Rombongan',
                'slug' => 'sewa-transportasi-rombongan',
                'icon' => 'truck',
                'short_description' => 'Penyewaan bus pariwisata dan minibus terbaru: HiAce Premio, Medium Bus 31-35 Seat, hingga Big Bus HDD/SHD 50 Seat berfasilitas mewah.',
                'full_description' => 'Armada transportasi pariwisata Nirwana Tour selalu dalam kondisi prima, terawat berkala, dan dikemudikan oleh sopir profesional berlisensi ramah pariwisata. Fasilitas kabin: Full AC, Reclining Seats, Audio Karaoke, Smart TV, USB Charger di setiap bangku, Coolbox, dan bagasi ekstra luas.',
                'whatsapp_text' => 'Halo Admin Nirwana Tour, saya ingin menanyakan ketersediaan dan harga Sewa Bus / Armada Pariwisata.',
                'sort_order' => 4,
            ],
        ];

        foreach ($services as $srv) {
            Service::updateOrCreate(['slug' => $srv['slug']], $srv);
        }

        // 5. Tour Packages (9 paket awal lengkap dengan JSON Itinerary, Include, Exclude)
        $packages = [
            [
                'title' => 'Eksotisme Snorkeling Pulau Pahawang & Kelagian',
                'slug' => 'eksotisme-snorkeling-pulau-pahawang-kelagian',
                'category' => 'lampung',
                'duration' => '3 Hari 2 Malam',
                'price' => 850000,
                'price_unit' => '/ Orang',
                'thumbnail' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80',
                'description' => 'Jelajahi surga bawah laut Lampung dengan terumbu karang warna-warni, penangkaran ikan nemo, pasir timbul yang memesona, serta menginap di cottage terapung eksklusif.',
                'includes' => [
                    'Transportasi AC Pariwisata Antar-Jemput',
                    'Kapal Wisata Eksklusif Snorkeling',
                    'Akomodasi Penginapan Homestay/Cottage 2 Malam',
                    'Makan 6x Sesuai Program + BBQ Ikan Segar',
                    'Set Alat Snorkeling Lengkap + Life Jacket',
                    'Dokumentasi Underwater (GoPro) & Drone',
                    'Tiket Masuk Semua Objek Wisata Bahari',
                    'Tour Guide & Instruktur Snorkeling Berpengalaman',
                    'Asuransi Perjalanan Jasa Raharja',
                ],
                'excludes' => [
                    'Pengeluaran Pribadi (Laundry, Minibar, Belanja Oleh-Oleh)',
                    'Tipping Sukarela untuk Crew Kapal & Driver',
                    'Tiket Pesawat / Kereta Api Menuju Lampung',
                ],
                'itineraries' => [
                    [
                        'day' => 1,
                        'title' => 'Kedatangan di Lampung & Menuju Dermaga Ketapang',
                        'activities' => 'Penjemputan di Bandara Radin Inten II / Stasiun Tanjung Karang. Menikmati kuliner khas Lampung (Pindang Ikan Baung). Perjalanan darat menuju Dermaga Ketapang Pesawaran. Naik kapal kayu menuju Pulau Pahawang Besar, check-in penginapan, sunset chill di tepi pantai, dan makan malam BBQ.',
                    ],
                    [
                        'day' => 2,
                        'title' => 'Full Day Island Hopping & Spot Underwater Nemo',
                        'activities' => 'Sarapan pagi. Snorkeling di Spot Nemo & Candi Bawah Laut Pahawang. Singgah di Pasir Timbul untuk foto estetik. Makan siang kelapa muda di Pulau Pahawang Kecil. Lanjut snorkeling di Pulau Kelagian Kecil dan Kelagian Besar. Sore hari kembali ke homestay dan ramah tamah malam.',
                    ],
                    [
                        'day' => 3,
                        'title' => 'Sunrise Pantai, Belanja Oleh-Oleh & Kepulangan',
                        'activities' => 'Hunting sunrise di dermaga. Check-out dan menyeberang kembali ke Dermaga Ketapang. Berbelanja di Pusat Oleh-Oleh Khas Lampung (Keripik Pisang Yen-Yen, Kopi Robusta Lampung). Pengantaran kembali ke Bandara / Stasiun. Tour selesai penuh kenangan!',
                    ],
                ],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Safari Lumba-Lumba Teluk Kiluan & Laguna Dodo',
                'slug' => 'safari-lumba-lumba-teluk-kiluan-laguna-dodo',
                'category' => 'lampung',
                'duration' => '2 Hari 1 Malam',
                'price' => 750000,
                'price_unit' => '/ Orang',
                'thumbnail' => 'https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff?auto=format&fit=crop&w=800&q=80',
                'description' => 'Sensasi menyaksikan ratusan lumba-lumba hidung botol berenang bebas di habitat aslinya di Samudra Hindia, serta berenang di kolam alami Laguna Gayau.',
                'includes' => [
                    'Armada Bus / HiAce Pariwisata AC',
                    'Perahu Jukung Tradisional Pengamatan Dolphin',
                    'Penginapan Beachfront Cottage 1 Malam',
                    'Makan 4x Tradisional Khas Pesisir',
                    'Life Jacket & Peralatan Keamanan Laut',
                    'Tiket Masuk Laguna Gayau & Pantai Kiluan',
                    'Tour Leader Ramah & Pendamping Lokal',
                ],
                'excludes' => [
                    'Kebutuhan Logistik Pribadi',
                    'Tips Driver & Juru Mudi Jukung',
                ],
                'itineraries' => [
                    [
                        'day' => 1,
                        'title' => 'Menembus Keindahan Pesisir Tanggamus & Laguna',
                        'activities' => 'Berangkat pagi dari Bandar Lampung melintasi perbukitan Tanggamus yang asri. Tiba di Teluk Kiluan, makan siang dan check-in. Sore hari trekking santai menuju Laguna Kolam Alami Gayau untuk berenang di antara karang raksasa. Sunset view dari bukit.',
                    ],
                    [
                        'day' => 2,
                        'title' => 'Atraksi Dolphin Samudra Hindia & Pulau Kelapa',
                        'activities' => 'Pukul 05.30 WIB berlayar dengan perahu katir jukung menuju samudera lepas. Menyaksikan tarian kawanan lumba-lumba di samping perahu. Mampir di Pulau Kelapa (Pulau Kiluan) untuk bersantai. Check-out dan perjalanan kembali ke Bandar Lampung.',
                    ],
                ],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Pesona Pantai Krui & Keindahan Danau Ranau',
                'slug' => 'pesona-pantai-krui-keindahan-danau-ranau',
                'category' => 'lampung',
                'duration' => '3 Hari 2 Malam',
                'price' => 1150000,
                'price_unit' => '/ Orang',
                'thumbnail' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80',
                'description' => 'Eksplorasi ombak kelas dunia Pantai Tanjung Setia Pesisir Barat, dilanjutkan dengan panorama megah Danau Ranau di kaki Gunung Seminung.',
                'includes' => [
                    'Transportasi Wisata AC Standar Pariwisata',
                    'Hotel / Resort Bintang 3 di Krui & Ranau',
                    'Makan Lengkap 7x (Breakfast, Lunch, Dinner)',
                    'Tiket Seluruh Wisata Pantai Labuhan Jukung & Danau',
                    'Tour Guide Lokal & P3K Standar',
                ],
                'excludes' => [
                    'Sewa Papan Surfing / Instruktur Selancar',
                    'Pengeluaran Pribadi',
                ],
                'itineraries' => [
                    [
                        'day' => 1,
                        'title' => 'Perjalanan Jalur Barat & Sunset Labuhan Jukung',
                        'activities' => 'Berangkat melintasi Taman Nasional Bukit Barisan Selatan. Tiba di Krui, check-in hotel tepi pantai, dan menikmati senja menawan di Pantai Labuhan Jukung.',
                    ],
                    [
                        'day' => 2,
                        'title' => 'Surfing Point Tanjung Setia & Danau Ranau',
                        'activities' => 'Mengunjungi spot peselancar mancanegara di Tanjung Setia. Lanjut perjalanan menuju Danau Ranau, naik perahu ke Pulau Marisa dan pemandian air panas alami.',
                    ],
                    [
                        'day' => 3,
                        'title' => 'Pagi Danau Seminung & Belanja Kopi Liwa',
                        'activities' => 'Sarapan dengan pemandangan Danau Ranau. Singgah di Liwa Lampung Barat untuk berbelanja Kopi Robusta petik merah sebelum kembali ke Bandar Lampung.',
                    ],
                ],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Heritage Yogyakarta & Bromo Sunrise Fantastic Trip',
                'slug' => 'heritage-yogyakarta-bromo-sunrise-fantastic-trip',
                'category' => 'nusantara',
                'duration' => '5 Hari 4 Malam',
                'price' => 2450000,
                'price_unit' => '/ Orang',
                'thumbnail' => 'https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?auto=format&fit=crop&w=800&q=80',
                'description' => 'Paket ikonik lintas Jawa: Mengagumi kemegahan Candi Prambanan, Malioboro, dilanjutkan petualangan Jeep 4x4 menyaksikan golden sunrise di Gunung Bromo.',
                'includes' => [
                    'Big Bus Pariwisata Eksekutif 50 Seats (Full AC, TV, Audio)',
                    'Hotel Bintang 3 di Yogyakarta & Homestay Bromo',
                    'Jeep 4x4 Bromo (Penanjakan 1, Kawah Bromo, Pasir Berbisik)',
                    'Makan 12x Prasmanan Higienis',
                    'Tiket Masuk Prambanan, Malioboro, Bromo, Malang',
                    'Tour Leader + Banner Dokumentasi Rombongan',
                ],
                'excludes' => [
                    'Naik Kuda di Kawah Bromo',
                    'Keperluan Pribadi',
                ],
                'itineraries' => [
                    [
                        'day' => 1,
                        'title' => 'Keberangkatan Lampung Menuju Yogyakarta via Tol Trans Jawa',
                        'activities' => 'Penjemputan rombongan, penyeberangan Bakauheni - Merak via Kapal Eksekutif. Melintasi Tol Trans Jawa dengan makan siang dan malam di Rest Area terpilih.',
                    ],
                    [
                        'day' => 2,
                        'title' => 'Keraton Yogyakarta, Malioboro & Candi Prambanan',
                        'activities' => 'Tiba di Jogja, sarapan dan bersih diri. Eksplorasi Keraton Sultan & Taman Sari. Makan siang gudeg legendaris. Sore hari di Candi Prambanan dan malam di Jalan Malioboro.',
                    ],
                    [
                        'day' => 3,
                        'title' => 'Pusat Bakpia Pathok & Perjalanan ke Lereng Bromo',
                        'activities' => 'Belanja bakpia dan batik. Melanjutkan perjalanan menuju kawasan Probolinggo/Tengger Bromo. Check-in homestay dan istirahat awal.',
                    ],
                    [
                        'day' => 4,
                        'title' => 'Safari Jeep 4x4 Golden Sunrise Bromo & Malang',
                        'activities' => 'Dini hari pukul 03.00 naik Jeep menuju View Point Penanjakan. Menikmati sunrise spektakuler. Menuju Lautan Pasir Berbisik, Bukit Teletubbies, dan trekking kawah. Siang hari menuju Kota Batu Malang untuk petik apel.',
                    ],
                    [
                        'day' => 5,
                        'title' => 'Perjalanan Pulang ke Lampung Penuh Kenangan',
                        'activities' => 'Perjalanan kembali menuju pelabuhan Merak dan menyeberang ke Lampung. Tiba dengan selamat di titik kumpul awal.',
                    ],
                ],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Eksotisme Labuan Bajo & Komodo Dragon Sailing Liveaboard',
                'slug' => 'eksotisme-labuan-bajo-komodo-dragon-sailing-liveaboard',
                'category' => 'nusantara',
                'duration' => '4 Hari 3 Malam',
                'price' => 4250000,
                'price_unit' => '/ Orang',
                'thumbnail' => 'https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=800&q=80',
                'description' => 'Sensasi bermalam di atas Kapal Pinisi Mewah (Liveaboard), mendaki Pulau Padar, berenang bersama Manta Ray, dan bertemu satwa purba Komodo.',
                'includes' => [
                    'Kapal Phinisi Cabin AC Standard / Superior (3 Hari 2 Malam Sailing)',
                    '1 Malam Hotel Bintang 4 di Labuan Bajo',
                    'Chef Khusus Kapal (Makan 10x Menu Internasional & Nusantara)',
                    'Set Snorkeling + Life Jacket',
                    'Dokumentasi Drone 4K & Kamera Mirrorless',
                    'Ranger TN Komodo & Tiket Masuk Taman Nasional',
                ],
                'excludes' => [
                    'Tiket Pesawat PP ke Komodo Airport (LBJ)',
                    'Tips Kru Kapal & Ranger',
                ],
                'itineraries' => [
                    [
                        'day' => 1,
                        'title' => 'Tiba di Labuan Bajo & Sunset Bukit Silvia',
                        'activities' => 'Dijemput di Bandara Komodo, check-in hotel resort. Menikmati pemandangan matahari terbenam spektakuler di Bukit Silvia dan makan malam seafood segar Kampung Ujung.',
                    ],
                    [
                        'day' => 2,
                        'title' => 'Boarding Pinisi, Pulau Kelor, Menjerite & Kalong',
                        'activities' => 'Naik ke kapal Phinisi. Berlayar ke Pulau Kelor untuk trekking pemandangan. Snorkeling di terumbu karang Manjarite. Menjelang senja menyaksikan ribuan kelelawar raksasa beterbangan di Pulau Kalong.',
                    ],
                    [
                        'day' => 3,
                        'title' => 'Sunrise Puncak Pulau Padar, Pink Beach & Komodo',
                        'activities' => 'Trekking subuh di Pulau Padar untuk pemandangan tiga teluk ikonik. Santai di Pink Beach yang berpasir merah muda unik. Eksplorasi satwa purba Komodo di Pulau Rinca/Komodo bersama ranger.',
                    ],
                    [
                        'day' => 4,
                        'title' => 'Manta Point, Taka Makassar & Kepulangan',
                        'activities' => 'Berenang bersama Pari Manta raksasa di Manta Point. Mampir di pulau pasir timbul Taka Makassar. Kapal kembali ke pelabuhan Labuan Bajo, diantar ke bandara untuk pulang.',
                    ],
                ],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Study Tour Edukasi Bandung, Sains Puspa Iptek & Bosscha',
                'slug' => 'study-tour-edukasi-bandung-sains-puspa-iptek-bosscha',
                'category' => 'edukasi',
                'duration' => '4 Hari 3 Malam',
                'price' => 1650000,
                'price_unit' => '/ Siswa',
                'thumbnail' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80',
                'description' => 'Program karya wisata edukatif sekolah terfavorit: Mempelajari sains interaktif di Puspa Iptek Sundial, astronomi di Observatorium Bosscha, dan seni angklung di Saung Udjo.',
                'includes' => [
                    'Big Bus Pariwisata Premium (AC, TV Karaoke, USB Charger)',
                    'Hotel Bintang 3 di Bandung (1 Kamar 3-4 Siswa)',
                    'Makan 9x Sesuai Program Berstandar Higienis',
                    'Tiket Terusan Masuk Puspa Iptek, Bosscha, Saung Angklung Udjo',
                    'Workshop & Sertifikat Partisipasi Edukasi',
                    'Dokumentasi Foto & Video untuk Pihak Sekolah',
                    'Spanduk Kegiatan & Name Tag Peserta',
                ],
                'excludes' => [
                    'Uang Saku & Belanja Pribadi Siswa',
                ],
                'itineraries' => [
                    [
                        'day' => 1,
                        'title' => 'Pemberangkatan Rombongan Sekolah dari Lampung',
                        'activities' => 'Kumpul di halaman sekolah, doa bersama dan pelepasan oleh Kepala Sekolah. Melintasi Selat Sunda via Kapal Ferry Eksekutif. Melanjutkan perjalanan menuju Kota Kembang Bandung.',
                    ],
                    [
                        'day' => 2,
                        'title' => 'Eksperimen Fisika Puspa Iptek & Balai Astronomi Bosscha',
                        'activities' => 'Sarapan di hotel. Praktik sains mandiri di Puspa Iptek Sundial Kota Baru Parahyangan. Belajar teleskop astronomi raksasa di Observatorium Bosscha Lembang. Makan siang dan belajar kerajinan lokal.',
                    ],
                    [
                        'day' => 3,
                        'title' => 'Harmoni Musik Angklung Udjo & Gedung Sate',
                        'activities' => 'Menonton dan memainkan angklung interaktif di Saung Angklung Udjo. Wisata sejarah perjuangan kemerdekaan di Museum Gedung Sate dan Museum Geologi Bandung.',
                    ],
                    [
                        'day' => 4,
                        'title' => 'Pusat Oleh-Oleh Kartika Sari & Tiba Kembali di Lampung',
                        'activities' => 'Membeli buah tangan khas Bandung. Perjalanan kembali ke Lampung dan penyerahan siswa kembali kepada orang tua di sekolah.',
                    ],
                ],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Kunjungan Industri Jakarta - Karawang Technopark',
                'slug' => 'kunjungan-industri-jakarta-karawang-technopark',
                'category' => 'edukasi',
                'duration' => '3 Hari 2 Malam',
                'price' => 1350000,
                'price_unit' => '/ Peserta',
                'thumbnail' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=800&q=80',
                'description' => 'Program studi banding profesional bagi mahasiswa dan siswa SMK ke pabrik manufaktur otomotif terkemuka, pusat logistik modern, dan studio teknologi.',
                'includes' => [
                    'Bus Pariwisata Full AC Standar Eksekutif',
                    'Hotel Bisnis Bintang 3 di Kawasan Karawang / Cikarang',
                    'Pengurusan Surat Izin Resmi Kunjungan Pabrik',
                    'Makan 7x Buffet & Box',
                    'Plakat Cinderamata Resmi untuk Perusahaan Tujuan',
                    'Tour Leader Khusus Protokoler Perusahaan',
                ],
                'excludes' => [
                    'Biaya Penginapan Tambahan di Luar Jadwal',
                    'Pengeluaran Pribadi',
                ],
                'itineraries' => [
                    [
                        'day' => 1,
                        'title' => 'Keberangkatan & Briefing Budaya Industri',
                        'activities' => 'Perjalanan dari Bandar Lampung menuju kawasan industri Jawa Barat. Pembekalan Safety First (K3) dan simulasi etika kunjungan industri.',
                    ],
                    [
                        'day' => 2,
                        'title' => 'Kunjungan Pabrik Manufaktur & Sharing Session Manajemen',
                        'activities' => 'Kunjungan pabrik utama sesi 1 (Assembly Line). Diskusi dan tanya jawab bersama engineer senior. Makan siang di kantin industri. Sesi 2 kunjungan gudang logistik pintar berbasis robotik.',
                    ],
                    [
                        'day' => 3,
                        'title' => 'Kunjungan Monas / Museum Nasional & Kembali ke Lampung',
                        'activities' => 'Mampir sejenak di ikon ibukota sebelum perjalanan kembali melintasi Selat Sunda menuju Lampung.',
                    ],
                ],
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'City Tour Bandar Lampung & Konservasi Gajah Way Kambas',
                'slug' => 'city-tour-bandar-lampung-konservasi-gajah-way-kambas',
                'category' => 'lampung',
                'duration' => '1 Hari',
                'price' => 350000,
                'price_unit' => '/ Orang',
                'thumbnail' => 'https://images.unsplash.com/photo-1557050543-4d5f4e07ef46?auto=format&fit=crop&w=800&q=80',
                'description' => 'Paket hemat 1 hari penuh mengunjungi Taman Nasional Way Kambas untuk berinteraksi langsung dengan gajah jinak sumatera, Puncak Mas, dan sentra keripik.',
                'includes' => [
                    'Armada HiAce / Bus Pariwisata AC',
                    'Tiket Masuk TN Way Kambas & Puncak Mas',
                    'Makan Siang Resto Pilihan',
                    'Air Mineral Sepanjang Perjalanan',
                    'Driver Merangkap Pemandu Wisata',
                ],
                'excludes' => [
                    'Biaya Mandikan Gajah / Safari Gajah Berbayar',
                    'Oleh-oleh',
                ],
                'itineraries' => [
                    [
                        'day' => 1,
                        'title' => 'Eksplorasi Way Kambas & Panorama Bukit Puncak Mas',
                        'activities' => 'Pagi hari penjemputan dari hotel di Bandar Lampung. Menuju Pusat Latihan Gajah (PLG) Way Kambas Lampung Timur. Menyaksikan atraksi dan perawatan gajah sumatera. Makan siang, dilanjutkan foto di gardu pandang Puncak Mas Sukadanaham. Singgah di sentra keripik pisang dan kembali ke titik jemput.',
                    ],
                ],
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Sewa Big Bus Pariwisata SHD 50 Seats Luxury',
                'slug' => 'sewa-big-bus-pariwisata-shd-50-seats-luxury',
                'category' => 'armada',
                'duration' => 'Per Hari',
                'price' => 3500000,
                'price_unit' => '/ Hari',
                'thumbnail' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80',
                'description' => 'Sewa armada bus pariwisata bodi Super High Deck (SHD) berkapasitas 50 kursi konfigurasi 2-2. Sangat nyaman untuk perjalanan jauh rombongan keluarga besar, dinas, dan sekolah.',
                'includes' => [
                    'Unit Big Bus SHD 50 Seats AC Dingin',
                    'Jasa Driver Profesional Berpengalaman Pariwisata',
                    'Jasa Co-Driver / Kenek',
                    'Fasilitas Lengkap: Smart TV, Wireless Mic Karaoke, USB Charger Port di Setiap Kursi, Coolbox, Bantal & Selimut (Trip Luar Kota)',
                ],
                'excludes' => [
                    'Bahan Bakar Minyak (BBM)',
                    'Tiket Tol & Retribusi Parkir',
                    'Tiket Penyeberangan Kapal Ferry (Bila Luar Pulau)',
                    'Makan & Akomodasi Driver',
                ],
                'itineraries' => [
                    [
                        'day' => 1,
                        'title' => 'Rute Bebas Sesuai Kebutuhan Penyewa',
                        'activities' => 'Driver siap melayani penjemputan tepat waktu di titik yang disepakati untuk rute dalam kota Lampung maupun perjalanan antar-provinsi di Pulau Sumatera dan Jawa.',
                    ],
                ],
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($packages as $pkg) {
            TourPackage::updateOrCreate(['slug' => $pkg['slug']], $pkg);
        }

        // 6. Galleries (Trip Documentations)
        $galleries = [
            [
                'title' => 'Snorkeling Seru Karyawan PT PLN Persero di Pulau Pahawang',
                'client_name' => 'PT PLN (Persero) UID Lampung',
                'category' => 'Family Gathering',
                'image_path' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80',
                'trip_date' => '2026-03-15',
                'caption' => 'Keceriaan rombongan 120 karyawan PT PLN saat menikmati keindahan terumbu karang dan underwater banner di perairan Pulau Pahawang.',
            ],
            [
                'title' => 'Karya Wisata Budaya SMAN 2 Bandar Lampung ke Yogyakarta',
                'client_name' => 'SMAN 2 Bandar Lampung',
                'category' => 'Study Tour',
                'image_path' => 'https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?auto=format&fit=crop&w=800&q=80',
                'trip_date' => '2026-02-20',
                'caption' => 'Dokumentasi 4 armada bus rombongan siswa kelas XI di pelataran Candi Prambanan Yogyakarta.',
            ],
            [
                'title' => 'Kunjungan Industri Mahasiswa Teknik Elektro UNILA ke Kawasan Cikarang',
                'client_name' => 'Universitas Lampung (UNILA)',
                'category' => 'Kunjungan Industri',
                'image_path' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=800&q=80',
                'trip_date' => '2026-01-18',
                'caption' => 'Foto bersama delegasi mahasiswa dan dosen pendamping di depan plant perakitan otomotif.',
            ],
            [
                'title' => 'Safari Pengamatan Dolphin di Samudra Hindia Teluk Kiluan',
                'client_name' => 'Dinas Pendidikan & Kebudayaan Prov. Lampung',
                'category' => 'Trip Kedinasan',
                'image_path' => 'https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff?auto=format&fit=crop&w=800&q=80',
                'trip_date' => '2025-11-12',
                'caption' => 'Momen magis saat kawanan lumba-lumba melompat mengiringi perahu rombongan di perairan Kiluan Tanggamus.',
            ],
            [
                'title' => 'Armada Big Bus Pariwisata Siap Berangkat dari Bandar Lampung',
                'client_name' => 'PT Bukit Asam Tbk',
                'category' => 'Sewa Bus',
                'image_path' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80',
                'trip_date' => '2025-10-05',
                'caption' => 'Deretan armada bus SHD eksekutif Nirwana Tour bersiap melayani perjalanan gathering dinas ke Bandung.',
            ],
            [
                'title' => 'Sailing Komodo Liveaboard Bersama Rombongan Direksi Bank',
                'client_name' => 'Bank Mandiri Taspen Lampung',
                'category' => 'Executive Tour',
                'image_path' => 'https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?auto=format&fit=crop&w=800&q=80',
                'trip_date' => '2025-09-14',
                'caption' => 'Pemandangan spektakuler senja dari puncak Pulau Padar bersama para peserta executive tour.',
            ],
        ];

        foreach ($galleries as $gal) {
            Gallery::updateOrCreate(['title' => $gal['title']], $gal);
        }

        // 7. Posts (Artikel & Tips Wisata)
        $posts = [
            [
                'title' => 'Panduan Lengkap Snorkeling di Pulau Pahawang: Lokasi Spot Terbaik & Waktu Berkunjung',
                'slug' => 'panduan-lengkap-snorkeling-pulau-pahawang-lampung',
                'thumbnail' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80',
                'excerpt' => 'Ingin liburan ke surga bawah laut Lampung? Simak ulasan lengkap spot nemo, keindahan pasir timbul, serta tips memilih paket tour yang aman.',
                'content' => 'Pulau Pahawang yang terletak di Kabupaten Pesawaran, Lampung, telah menjadi ikon pariwisata bahari nasional. Dengan perairan yang relatif tenang dan terumbu karang yang terjaga, wisatawan dapat menikmati snorkeling bersama ikan badut (nemo) yang ramah.\n\nWaktu terbaik untuk berkunjung adalah antara bulan Maret hingga Oktober saat ombak tenang dan visibilitas bawah laut mencapai kejernihan maksimal. Jangan lupa membawa underwater camera atau pastikan Anda memilih penyedia jasa tour seperti Nirwana Tour Lampung yang sudah menggratiskan fasilitas dokumentasi kamera underwater GoPro.',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Tips Mempersiapkan Study Tour Sekolah yang Aman, Tertib, dan Menyenangkan',
                'slug' => 'tips-mempersiapkan-study-tour-sekolah-aman-tertib',
                'thumbnail' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80',
                'excerpt' => 'Merancang karya wisata bagi ratusan siswa membutuhkan ketelitian tinggi. Berikut 5 langkah krusial memastikan keselamatan dan kenyamanan seluruh rombongan.',
                'content' => 'Study tour adalah momen paling berharga bagi siswa untuk belajar langsung di luar kelas. Namun bagi pihak guru dan panitia, memastikan keselamatan adalah prioritas nomor satu.\n\nLangkah pertama adalah memilih biro perjalanan wisata berizin resmi yang memiliki armada bus dengan sertifikat kelayakan uji KIR aktif dan pengemudi berpengalaman. Kedua, susun rundown yang tidak terlalu padat agar siswa memiliki waktu istirahat yang cukup. Ketiga, selalu sediakan tim medis ringan serta asuransi perjalanan.',
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'Perbedaan Bus Pariwisata HDD, SHD, dan UHD: Mana yang Paling Tepat untuk Rombongan Anda?',
                'slug' => 'perbedaan-bus-pariwisata-hdd-shd-uhd-untuk-rombongan',
                'thumbnail' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80',
                'excerpt' => 'Pahami kelebihan jenis bodi bus pariwisata modern agar Anda tidak salah memilih kapasitas dan kenyamanan saat perjalanan dinas maupun liburan.',
                'content' => 'Dalam dunia transportasi pariwisata modern, istilah seperti HDD (High Deck), SHD (Super High Deck), dan UHD (Ultra High Deck) merujuk pada ketinggian dek lantai penumpang dari permukaan tanah.\n\nBus tipe SHD menawarkan keunggulan berupa kaca ganda (double glass), posisi duduk penumpang yang tinggi sehingga leluasa memandang pemandangan jalan, serta ruang bagasi bawah yang sangat luas bahkan mampu menampung sepeda motor. Di Nirwana Tour Lampung, kami menyediakan pilihan armada terlengkap sesuai anggaran dan tujuan trip Anda.',
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(['slug' => $post['slug']], $post);
        }

        // 8. FAQs (Tanya Jawab Populer)
        $faqs = [
            [
                'question' => 'Bagaimana alur dan cara memesan paket wisata di Nirwana Tour Lampung?',
                'answer' => 'Sangat mudah! Anda cukup memilih paket wisata yang diinginkan di website ini, lalu klik tombol "Konsultasi / Pesan via WhatsApp". Anda akan langsung terhubung dengan Admin Nirwana Tour kami untuk mendiskusikan tanggal trip, jumlah peserta, penyesuaian rute, dan ketersediaan armada.',
                'sort_order' => 1,
            ],
            [
                'question' => 'Berapa minimal peserta untuk paket wisata rombongan atau private trip?',
                'answer' => 'Untuk paket private trip keluarga atau dinas, minimal pemesanan mulai dari 6 orang (menggunakan HiAce/Innova). Sedangkan untuk rombongan besar sekolah, instansi, atau BUMN, kami siap melayani hingga ratusan peserta dengan dukungan multi-bus pariwisata.',
                'sort_order' => 2,
            ],
            [
                'question' => 'Bagaimana sistem pembayaran, besaran uang muka (DP), dan pelunasan?',
                'answer' => 'Pemesanan dinyatakan terkonfirmasi setelah pembayaran DP sebesar 30% - 50% dari total nilai transaksi. Pembayaran sisa pelunasan dapat dilakukan maksimal H-3 sebelum jadwal keberangkatan atau sesuai kesepakatan surat kontrak kerja sama resmi.',
                'sort_order' => 3,
            ],
            [
                'question' => 'Apakah itinerary atau jadwal perjalanan wisata bisa di-custom sesuai permintaan kami?',
                'answer' => 'Tentu saja bisa! Kami sangat fleksibel dalam menyesuaikan jadwal perjalanan, destinasi wisata yang ingin dikunjungi, menu makanan, maupun pilihan kelas hotel bintang sesuai preferensi dan anggaran instansi Anda.',
                'sort_order' => 4,
            ],
            [
                'question' => 'Apa saja standar fasilitas armada bus pariwisata yang disediakan?',
                'answer' => 'Seluruh armada bus Nirwana Tour dilengkapi Full AC dingin, reclining seats nyaman, fasilitas hiburan Smart TV & wireless mic karaoke, port charger USB di setiap bangku, coolbox, bagasi luas, serta dikemudikan oleh kru driver pariwisata bersertifikat.',
                'sort_order' => 5,
            ],
            [
                'question' => 'Apakah biaya paket wisata sudah termasuk perlindungan asuransi perjalanan?',
                'answer' => 'Ya, seluruh paket wisata Nirwana Tour Lampung telah dilengkapi dengan asuransi perjalanan resmi (Jasa Raharja / Asuransi Rekanan Wisata) demi menjamin keamanan dan kenyamanan maksimal setiap peserta selama kegiatan berlangsung.',
                'sort_order' => 6,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], $faq);
        }

        // 9. Custom Dynamic Page (Contoh Halaman Fleksibel)
        CustomPage::updateOrCreate(
            ['slug' => 'syarat-dan-ketentuan'],
            [
                'title' => 'Syarat & Ketentuan Pemesanan',
                'meta_description' => 'Syarat dan ketentuan umum pemesanan paket wisata dan sewa bus di Nirwana Tour Lampung.',
                'content' => '<h2>1. Pemesanan dan Pembayaran</h2><p>Pemesanan paket wisata atau sewa armada dianggap sah apabila telah menyetorkan uang muka (DP) minimal 30% - 50% ke rekening resmi perusahaan. Bukti transfer wajib dikonfirmasikan kepada Admin kami.</p><h2>2. Pembatalan (Cancellation)</h2><p>Pembatalan sepihak oleh klien pada H-7 sebelum keberangkatan dikenakan pemotongan biaya administrasi sesuai ketentuan kontrak.</p><h2>3. Keadaan Kahar (Force Majeure)</h2><p>Apabila terjadi bencana alam, cuaca buruk luar biasa di laut, atau kebijakan darurat pemerintah yang menyebabkan perjalanan tidak memungkinkan, kedua belah pihak akan menjadwalkan ulang (reschedule) waktu perjalanan dengan musyawarah mufakat.</p>',
                'show_in_navbar' => false,
                'is_active' => true,
            ]
        );
    }
}
