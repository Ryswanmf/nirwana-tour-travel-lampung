@extends('layouts.app')

@section('title', 'Nirwana Tour Lampung — Biro Wisata & Sewa Bus Terpercaya')
@section('meta_description', 'Biro perjalanan wisata resmi di Lampung. Paket liburan bahari Pahawang, study tour sekolah, kunjungan industri, dinas, dan sewa bus pariwisata eksekutif.')

@section('content')

@php
    $waNumber = $siteSetting->whatsapp_number ?? '6282177889900';
    $ownerName = $siteSetting->owner_name ?? 'Kiki M Alfin';
    $ownerTitle = $siteSetting->owner_title ?? 'Pimpinan & Founder';
    $ownerGreeting = $siteSetting->owner_greeting ?? 'Perjalanan bukan sekadar berpindah dari satu titik ke titik lain, melainkan sebuah seni merajut kebersamaan, menyelami keindahan nusantara, dan memetik inspirasi hidup.';
@endphp

<!-- Container with Alpine.js state for Quick Itinerary Modal -->
<div x-data="{ 
    modalOpen: false, 
    modalPackage: null,
    openModal(pkg) {
        this.modalPackage = pkg;
        this.modalOpen = true;
    },
    closeModal() {
        this.modalOpen = false;
        this.modalPackage = null;
    }
}">

    <!-- HERO SECTION: INTERACTIVE FLEET & DESTINATION BOOKING BAR (TRAVELOKA STYLE) -->
    <section class="relative bg-[#061224] text-white overflow-hidden py-14 sm:py-20 lg:py-24 border-b border-white/10">
        <!-- Background Cinematic Photographic Overlay with Ambient Glows -->
        <div class="absolute inset-0 bg-cover bg-center opacity-25 mix-blend-luminosity scale-105 pointer-events-none"
             style="background-image: url('https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=2000&q=80');"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-[#061224]/90 via-[#0A1B36]/85 to-[#061224] pointer-events-none"></div>

        <!-- Ambient Luxury Radial Glows -->
        <div class="absolute -top-32 left-1/4 w-[500px] h-[500px] bg-[#0284C7]/20 rounded-full blur-[140px] pointer-events-none"></div>
        <div class="absolute top-1/2 -right-20 w-[450px] h-[450px] bg-amber-500/15 rounded-full blur-[130px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <!-- Hero Header: Typography & Trust Signals -->
            <div class="max-w-3xl mx-auto text-center space-y-4 mb-8 sm:mb-12">
                <!-- Verified Official Bureau Badge -->
                <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-xs font-semibold text-amber-300 shadow-md">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Biro Perjalanan Wisata Resmi & Penyedia Armada Bus Eksekutif Lampung</span>
                </div>

                <!-- Grand Title -->
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.15]">
                    Jelajahi Dunia,
                    <span class="block font-serif italic text-transparent bg-clip-text bg-gradient-to-r from-amber-200 via-amber-400 to-amber-100 font-normal my-1">
                        Ciptakan Cerita Tak Terlupakan
                    </span>
                    Bersama Nirwana Tour
                </h1>

                <!-- Subtitle -->
                <p class="text-sm sm:text-base lg:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
                    Spesialis sewa armada bus pariwisata (Big Bus SHD 50 Seat, HiAce Premio), paket liburan bahari Pahawang-Kiluan, study tour edukatif, hingga kunjungan kerja dinas dan BUMN.
                </p>
            </div>

            <!-- INTERACTIVE BOOKING BAR COMPONENT (TRAVELOKA / TIKET STYLE) -->
            <div x-data="{
                activeTab: 'bus',
                // Bus form fields
                busType: 'Big Bus SHD (45 - 50 Seats)',
                busPickup: 'Bandar Lampung (Kota / Bandara Radin Inten II)',
                busDestination: 'Rute Wisata Bahari Lampung (Pahawang / Kiluan)',
                busDate: '',
                busDuration: '3 Hari 2 Malam',
                // Tour package form fields
                tourPackage: 'Eksotisme Snorkeling Pulau Pahawang & Kelagian (3H2M)',
                tourType: 'Rombongan Kunjungan Kerja Dinas / BUMN / Kantor',
                tourPax: '35 - 50 Orang (1 Big Bus SHD)',
                tourDate: '',

                submitBus() {
                    const text = encodeURIComponent(
                        'Halo Admin Nirwana Tour Lampung,\n\nSaya ingin menanyakan ketersediaan dan penawaran Sewa Armada Bus Pariwisata dengan rincian berikut:\n' +
                        '• Jenis Armada: ' + this.busType + '\n' +
                        '• Titik Penjemputan: ' + this.busPickup + '\n' +
                        '• Rute / Destinasi Tujuan: ' + this.busDestination + '\n' +
                        '• Tanggal Keberangkatan: ' + (this.busDate || 'Fleksibel / Sesuai Jadwal') + '\n' +
                        '• Durasi Pemakaian: ' + this.busDuration + '\n\n' +
                        'Mohon informasi ketersediaan unit dan estimasi penawaran harga resminya. Terima kasih!'
                    );
                    window.open('https://wa.me/{{ $waNumber }}?text=' + text, '_blank');
                },

                submitTour() {
                    const text = encodeURIComponent(
                        'Halo Admin Nirwana Tour Lampung,\n\nSaya tertarik konsultasi Paket Wisata Rombongan dengan rincian berikut:\n' +
                        '• Pilihan Paket: ' + this.tourPackage + '\n' +
                        '• Kategori Rombongan: ' + this.tourType + '\n' +
                        '• Estimasi Jumlah Peserta: ' + this.tourPax + '\n' +
                        '• Rencana Tanggal / Bulan: ' + (this.tourDate || 'Fleksibel / Sesuai Jadwal') + '\n\n' +
                        'Mohon kirimkan detail susunan acara (rundown itinerary) dan proposal penawaran resminya. Terima kasih!'
                    );
                    window.open('https://wa.me/{{ $waNumber }}?text=' + text, '_blank');
                }
            }" class="max-w-5xl mx-auto">

                <!-- Tab Selector Buttons -->
                <div class="flex items-center space-x-2 p-1.5 bg-black/40 backdrop-blur-xl rounded-2xl w-fit mx-auto mb-4 border border-white/10 shadow-lg">
                    <button @click="activeTab = 'bus'"
                            type="button"
                            :class="activeTab === 'bus' ? 'bg-[#0284C7] text-white shadow-lg shadow-sky-500/30' : 'text-slate-300 hover:text-white hover:bg-white/5'"
                            class="px-5 py-2.5 rounded-xl font-bold text-xs sm:text-sm flex items-center space-x-2 transition">
                        <span class="text-base sm:text-lg">🚌</span>
                        <span>Sewa Bus Pariwisata</span>
                    </button>
                    <button @click="activeTab = 'tour'"
                            type="button"
                            :class="activeTab === 'tour' ? 'bg-[#0284C7] text-white shadow-lg shadow-sky-500/30' : 'text-slate-300 hover:text-white hover:bg-white/5'"
                            class="px-5 py-2.5 rounded-xl font-bold text-xs sm:text-sm flex items-center space-x-2 transition">
                        <span class="text-base sm:text-lg">🏝️</span>
                        <span>Paket Wisata & Study Tour</span>
                    </button>
                </div>

                <!-- Main Glassmorphism Form Card -->
                <div class="bg-white/95 backdrop-blur-2xl rounded-3xl p-5 sm:p-7 shadow-2xl border border-white/40 text-slate-800">

                    <!-- TAB 1: SEWA BUS PARIWISATA -->
                    <div x-show="activeTab === 'bus'" x-cloak class="space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            
                            <!-- Field 1: Jenis Armada -->
                            <div class="space-y-1.5 text-left">
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider flex items-center space-x-1.5">
                                    <span>🚌</span>
                                    <span>Pilihan Armada</span>
                                </label>
                                <div class="relative">
                                    <select x-model="busType" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#0284C7] focus:bg-white transition cursor-pointer">
                                        <option value="Big Bus SHD (45 - 50 Seats)">Big Bus SHD (45 - 50 Seats)</option>
                                        <option value="Medium Bus Pariwisata (31 - 35 Seats)">Medium Bus (31 - 35 Seats)</option>
                                        <option value="Toyota HiAce Premio Luxury (14 Seats)">Toyota HiAce Premio (14 Seats)</option>
                                        <option value="Toyota HiAce Commuter (14 - 15 Seats)">Toyota HiAce Commuter (15 Seats)</option>
                                        <option value="All-New Innova Reborn (7 Seats)">All-New Innova Reborn (7 Seats)</option>
                                    </select>
                                </div>
                                <span class="text-[10px] text-slate-400 block">Unit terbaru, full AC & reclining seats</span>
                            </div>

                            <!-- Field 2: Lokasi Penjemputan -->
                            <div class="space-y-1.5 text-left">
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider flex items-center space-x-1.5">
                                    <span>📍</span>
                                    <span>Titik Penjemputan</span>
                                </label>
                                <div class="relative">
                                    <select x-model="busPickup" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#0284C7] focus:bg-white transition cursor-pointer">
                                        <option value="Bandar Lampung (Kota / Bandara Radin Inten II)">Bandar Lampung (Kota / Bandara)</option>
                                        <option value="Kota Metro & Lampung Tengah">Kota Metro & Lampung Tengah</option>
                                        <option value="Pelabuhan Bakauheni / Lampung Selatan">Pelabuhan Bakauheni / Lamsel</option>
                                        <option value="Kotabumi / Lampung Utara">Kotabumi / Lampung Utara</option>
                                        <option value="DKI Jakarta & Jabodetabek">DKI Jakarta & Jabodetabek</option>
                                        <option value="Palembang / Sumatera Selatan">Palembang / Sumatera Selatan</option>
                                        <option value="Titik Jemput Kustom (Sesuai Permintaan)">Titik Jemput Kustom (Lainnya)</option>
                                    </select>
                                </div>
                                <span class="text-[10px] text-slate-400 block">Bisa dijemput di kantor / sekolah / rumah</span>
                            </div>

                            <!-- Field 3: Rute / Destinasi Tujuan -->
                            <div class="space-y-1.5 text-left">
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider flex items-center space-x-1.5">
                                    <span>🗺️</span>
                                    <span>Destinasi Tujuan</span>
                                </label>
                                <div class="relative">
                                    <select x-model="busDestination" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#0284C7] focus:bg-white transition cursor-pointer">
                                        <option value="Rute Wisata Bahari Lampung (Pahawang / Kiluan)">Wisata Lampung (Pahawang, Kiluan, Krui)</option>
                                        <option value="Rute Trans Jawa (Jakarta, Bandung, Jogja, Bromo, Bali)">Trans Jawa (Jakarta, Bandung, Jogja, Bali)</option>
                                        <option value="Rute Trans Sumatera (Palembang, Jambi, Padang, Medan)">Trans Sumatera (Palembang, Padang, Medan)</option>
                                        <option value="City Tour & Antar-Jemput Dinas Rombongan Lampung">City Tour & Kegiatan Dinas Lampung</option>
                                        <option value="Kunjungan Industri & Study Tour Sekolah">Kunjungan Industri & Study Tour</option>
                                    </select>
                                </div>
                                <span class="text-[10px] text-slate-400 block">Jalur Tol Trans Sumatera & Trans Jawa</span>
                            </div>

                            <!-- Field 4: Tanggal & Durasi -->
                            <div class="space-y-1.5 text-left">
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider flex items-center space-x-1.5">
                                    <span>📅</span>
                                    <span>Tanggal & Durasi</span>
                                </label>
                                <div class="grid grid-cols-2 gap-1.5">
                                    <input type="date" x-model="busDate" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-2.5 py-2 text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#0284C7] focus:bg-white transition">
                                    <select x-model="busDuration" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-2 py-2 text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#0284C7] focus:bg-white transition cursor-pointer">
                                        <option value="1 Hari (PP)">1 Hari (PP)</option>
                                        <option value="2 Hari 1 Malam">2H 1M</option>
                                        <option value="3 Hari 2 Malam">3H 2M</option>
                                        <option value="4 Hari 3 Malam">4H 3M</option>
                                        <option value="5 Hari atau Lebih">5+ Hari</option>
                                    </select>
                                </div>
                                <span class="text-[10px] text-slate-400 block">Pilih tanggal rencana perjalanan</span>
                            </div>

                        </div>

                        <!-- CTA Action Bar for Bus -->
                        <div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-3 border-t border-slate-100">
                            <div class="text-left text-xs text-slate-500 flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>Unit siap beroperasi • Lolos uji KIR & Berizin Kemenhub</span>
                            </div>
                            <button @click="submitBus()"
                                    type="button"
                                    class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white font-bold text-sm shadow-xl shadow-emerald-500/25 flex items-center justify-center space-x-2.5 transition transform hover:-translate-y-0.5 cursor-pointer">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                                <span>Cek Ketersediaan & Estimasi Harga via WhatsApp</span>
                                <span>→</span>
                            </button>
                        </div>
                    </div>

                    <!-- TAB 2: PAKET WISATA & STUDY TOUR -->
                    <div x-show="activeTab === 'tour'" x-cloak class="space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            
                            <!-- Field 1: Pilihan Paket Wisata -->
                            <div class="space-y-1.5 text-left">
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider flex items-center space-x-1.5">
                                    <span>🏝️</span>
                                    <span>Pilihan Paket Wisata</span>
                                </label>
                                <div class="relative">
                                    <select x-model="tourPackage" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#0284C7] focus:bg-white transition cursor-pointer">
                                        <option value="Eksotisme Snorkeling Pulau Pahawang & Kelagian (3H2M)">Pahawang & Kelagian (3H2M)</option>
                                        <option value="Teluk Kiluan Dolphin Tour & Laguna Gayau (2H1M)">Teluk Kiluan Dolphin Tour (2H1M)</option>
                                        <option value="Taman Nasional Way Kambas & Konservasi Gajah (1H)">TN Way Kambas Gajah (1H)</option>
                                        <option value="Study Tour Yogyakarta - Borobudur - Malioboro (4H3M)">Study Tour Jogja & Borobudur (4H3M)</option>
                                        <option value="Kunjungan Industri Bandung - Jakarta (4H3M)">Kunjungan Industri Bandung (4H3M)</option>
                                        <option value="Eksplorasi Bromo Sunrise & Malang Batu (4H3M)">Bromo Sunrise & Malang (4H3M)</option>
                                        <option value="Pesona Pulau Bali & Tanah Lot (5H4M)">Pesona Bali & Nusa Penida (5H4M)</option>
                                        <option value="Paket Kustom Rombongan Khusus (Sesuai Permintaan)">Paket Kustom Khusus Rombongan</option>
                                    </select>
                                </div>
                                <span class="text-[10px] text-slate-400 block">Fasilitas All-In: Bus, Makan, Hotel, Guide</span>
                            </div>

                            <!-- Field 2: Tipe Rombongan -->
                            <div class="space-y-1.5 text-left">
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider flex items-center space-x-1.5">
                                    <span>👥</span>
                                    <span>Kategori Rombongan</span>
                                </label>
                                <div class="relative">
                                    <select x-model="tourType" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#0284C7] focus:bg-white transition cursor-pointer">
                                        <option value="Rombongan Kunjungan Kerja Dinas / BUMN / Kantor">BUMN / Dinas Pemda / Kantor</option>
                                        <option value="Study Tour Sekolah (SD / SMP / SMA)">Study Tour Sekolah (SMP/SMA)</option>
                                        <option value="Rombongan Kampus / Organisasi Mahasiswa">Kampus & Organisasi Mahasiswa</option>
                                        <option value="Wisata Keluarga Besar & Komunitas">Keluarga Besar / Komunitas</option>
                                        <option value="Rombongan Privat Khusus">Rombongan Privat Eksklusif</option>
                                    </select>
                                </div>
                                <span class="text-[10px] text-slate-400 block">Disesuaikan dengan kebutuhan acara</span>
                            </div>

                            <!-- Field 3: Jumlah Peserta -->
                            <div class="space-y-1.5 text-left">
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider flex items-center space-x-1.5">
                                    <span>🎟️</span>
                                    <span>Estimasi Peserta</span>
                                </label>
                                <div class="relative">
                                    <select x-model="tourPax" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#0284C7] focus:bg-white transition cursor-pointer">
                                        <option value="Kurang dari 15 Orang (HiAce Premio)">Kurang dari 15 Orang (HiAce)</option>
                                        <option value="15 - 35 Orang (Medium Bus)">15 - 35 Orang (Medium Bus)</option>
                                        <option value="35 - 50 Orang (1 Big Bus SHD)">35 - 50 Orang (1 Big Bus)</option>
                                        <option value="50 - 100 Orang (2 Big Bus Konvoi)">50 - 100 Orang (2 Big Bus)</option>
                                        <option value="Lebih dari 100 Orang (Multi Bus Instansi)">Lebih dari 100 Orang (Konvoi Instansi)</option>
                                    </select>
                                </div>
                                <span class="text-[10px] text-slate-400 block">Tersedia diskon khusus rombongan</span>
                            </div>

                            <!-- Field 4: Rencana Waktu -->
                            <div class="space-y-1.5 text-left">
                                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider flex items-center space-x-1.5">
                                    <span>📅</span>
                                    <span>Rencana Waktu</span>
                                </label>
                                <div>
                                    <input type="date" x-model="tourDate" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#0284C7] focus:bg-white transition">
                                </div>
                                <span class="text-[10px] text-slate-400 block">Bisa fleksibel / menyesuaikan jadwal dinas</span>
                            </div>

                        </div>

                        <!-- CTA Action Bar for Tour -->
                        <div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-3 border-t border-slate-100">
                            <div class="text-left text-xs text-slate-500 flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>Proposal penawaran resmi & Rundown harian dikirim cepat via WA</span>
                            </div>
                            <button @click="submitTour()"
                                    type="button"
                                    class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white font-bold text-sm shadow-xl shadow-emerald-500/25 flex items-center justify-center space-x-2.5 transition transform hover:-translate-y-0.5 cursor-pointer">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                                <span>Konsultasi Rundown & Proposal Penawaran</span>
                                <span>→</span>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- 4 Pillars Guarantee & Fast Navigation Badges -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 pt-6 text-left">
                    <div class="flex items-center space-x-3 bg-white/[0.07] backdrop-blur-md border border-white/10 p-3 rounded-2xl">
                        <span class="text-xl shrink-0">🛡️</span>
                        <div>
                            <div class="text-xs font-bold text-white">Lolos Uji KIR & Resmi</div>
                            <div class="text-[10px] text-slate-300">Berizin Kemenhub & Terawat</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3 bg-white/[0.07] backdrop-blur-md border border-white/10 p-3 rounded-2xl">
                        <span class="text-xl shrink-0">❄️</span>
                        <div>
                            <div class="text-xs font-bold text-white">Full AC & Reclining</div>
                            <div class="text-[10px] text-slate-300">Smart TV, Karaoke & USB</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3 bg-white/[0.07] backdrop-blur-md border border-white/10 p-3 rounded-2xl">
                        <span class="text-xl shrink-0">👨‍✈️</span>
                        <div>
                            <div class="text-xs font-bold text-white">Kru & Driver Ramah</div>
                            <div class="text-[10px] text-slate-300">Berpengalaman Trans Jawa-Sumatera</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3 bg-white/[0.07] backdrop-blur-md border border-white/10 p-3 rounded-2xl">
                        <span class="text-xl shrink-0">⚡</span>
                        <div>
                            <div class="text-xs font-bold text-white">Respon SPK 24 Jam</div>
                            <div class="text-[10px] text-slate-300">Invoice & Penawaran Resmi Cepat</div>
                        </div>
                    </div>
                </div>

                <!-- Quick Alternative Links -->
                <div class="pt-6 flex flex-wrap items-center justify-center gap-4 text-xs">
                    <a href="{{ route('packages.index') }}" class="text-sky-300 hover:text-white font-semibold flex items-center space-x-1.5 transition underline underline-offset-4">
                        <span>Lihat Seluruh Katalog Paket Wisata</span>
                        <span>→</span>
                    </a>
                    <span class="text-slate-500">•</span>
                    <a href="{{ route('services') }}" class="text-amber-300 hover:text-white font-semibold flex items-center space-x-1.5 transition underline underline-offset-4">
                        <span>Spesifikasi & Foto Lengkap Armada Bus</span>
                        <span>→</span>
                    </a>
                </div>

            </div>

        </div>
    </section>

    <!-- TICKER MARQUEE 2 BARIS (MITRA BUMN, INSTANSI, KAMPUS & SEKOLAH) -->
    <section class="bg-white py-10 border-b border-slate-100 overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-4 mb-6 text-center">
            <span class="inline-flex items-center space-x-2 text-xs font-bold text-[#0284C7] bg-sky-50 px-3.5 py-1.5 rounded-full uppercase tracking-wider">
                <svg class="w-4 h-4 text-[#0284C7]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                <span>Telah Dipercaya Oleh 100+ BUMN, Instansi Pemerintah, Kampus & Sekolah</span>
            </span>
        </div>

        @php
            $halfCount = ceil($partners->count() / 2);
            $row1Partners = $partners->slice(0, $halfCount);
            $row2Partners = $partners->slice($halfCount);
        @endphp

        <!-- Gradient blur overlays on edges for smooth fading -->
        <div class="absolute left-0 top-0 bottom-0 w-16 sm:w-28 bg-gradient-to-r from-white via-white/80 to-transparent z-10 pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-16 sm:w-28 bg-gradient-to-l from-white via-white/80 to-transparent z-10 pointer-events-none"></div>

        <div class="space-y-4">
            <!-- BARIS ATAS: Berjalan ke Kiri -->
            <div class="relative w-full overflow-hidden">
                <div class="animate-marquee flex items-center space-x-5 whitespace-nowrap py-1">
                    @foreach($row1Partners as $partner)
                        <div class="flex items-center space-x-3.5 bg-slate-50/90 hover:bg-white text-slate-700 px-5 py-3 rounded-2xl border border-slate-200/70 shadow-sm hover:shadow-md hover:border-[#0284C7]/50 transition duration-300 shrink-0">
                            <!-- Logo / Emblem Instansi -->
                            @if($partner->logo_path)
                                <img src="{{ $partner->logo_path }}" alt="{{ $partner->name }}" class="h-9 w-auto max-w-[42px] object-contain rounded-lg">
                            @else
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 font-extrabold text-xs shadow-sm
                                    {{ $partner->category === 'BUMN' ? 'bg-sky-600 text-white' : ($partner->category === 'Universitas' ? 'bg-[#0F2C59] text-amber-300' : ($partner->category === 'Sekolah' ? 'bg-emerald-600 text-white' : 'bg-amber-500 text-slate-900')) }}">
                                    @if($partner->category === 'BUMN')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                    @elseif($partner->category === 'Universitas')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/></svg>
                                    @elseif($partner->category === 'Sekolah')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                    @else
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>
                                    @endif
                                </div>
                            @endif

                            <!-- Nama & Kategori -->
                            <div>
                                <div class="font-extrabold text-xs sm:text-sm text-[#0F2C59] tracking-tight">
                                    {{ $partner->name }}
                                </div>
                                <div class="text-[10px] font-semibold text-slate-400">
                                    {{ $partner->category }}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Duplikasi Baris Atas untuk Seamless Loop -->
                    @foreach($row1Partners as $partner)
                        <div class="flex items-center space-x-3.5 bg-slate-50/90 hover:bg-white text-slate-700 px-5 py-3 rounded-2xl border border-slate-200/70 shadow-sm hover:shadow-md hover:border-[#0284C7]/50 transition duration-300 shrink-0">
                            @if($partner->logo_path)
                                <img src="{{ $partner->logo_path }}" alt="{{ $partner->name }}" class="h-9 w-auto max-w-[42px] object-contain rounded-lg">
                            @else
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 font-extrabold text-xs shadow-sm
                                    {{ $partner->category === 'BUMN' ? 'bg-sky-600 text-white' : ($partner->category === 'Universitas' ? 'bg-[#0F2C59] text-amber-300' : ($partner->category === 'Sekolah' ? 'bg-emerald-600 text-white' : 'bg-amber-500 text-slate-900')) }}">
                                    @if($partner->category === 'BUMN')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                    @elseif($partner->category === 'Universitas')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/></svg>
                                    @elseif($partner->category === 'Sekolah')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                    @else
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>
                                    @endif
                                </div>
                            @endif

                            <div>
                                <div class="font-extrabold text-xs sm:text-sm text-[#0F2C59] tracking-tight">
                                    {{ $partner->name }}
                                </div>
                                <div class="text-[10px] font-semibold text-slate-400">
                                    {{ $partner->category }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- BARIS BAWAH: Berjalan ke Kanan (Arah Berlawanan) -->
            <div class="relative w-full overflow-hidden">
                <div class="animate-marquee-reverse flex items-center space-x-5 whitespace-nowrap py-1">
                    @foreach($row2Partners as $partner)
                        <div class="flex items-center space-x-3.5 bg-slate-50/90 hover:bg-white text-slate-700 px-5 py-3 rounded-2xl border border-slate-200/70 shadow-sm hover:shadow-md hover:border-[#0284C7]/50 transition duration-300 shrink-0">
                            <!-- Logo / Emblem Instansi -->
                            @if($partner->logo_path)
                                <img src="{{ $partner->logo_path }}" alt="{{ $partner->name }}" class="h-9 w-auto max-w-[42px] object-contain rounded-lg">
                            @else
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 font-extrabold text-xs shadow-sm
                                    {{ $partner->category === 'BUMN' ? 'bg-sky-600 text-white' : ($partner->category === 'Universitas' ? 'bg-[#0F2C59] text-amber-300' : ($partner->category === 'Sekolah' ? 'bg-emerald-600 text-white' : 'bg-amber-500 text-slate-900')) }}">
                                    @if($partner->category === 'BUMN')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                    @elseif($partner->category === 'Universitas')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/></svg>
                                    @elseif($partner->category === 'Sekolah')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                    @else
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>
                                    @endif
                                </div>
                            @endif

                            <div>
                                <div class="font-extrabold text-xs sm:text-sm text-[#0F2C59] tracking-tight">
                                    {{ $partner->name }}
                                </div>
                                <div class="text-[10px] font-semibold text-slate-400">
                                    {{ $partner->category }}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Duplikasi Baris Bawah untuk Seamless Loop -->
                    @foreach($row2Partners as $partner)
                        <div class="flex items-center space-x-3.5 bg-slate-50/90 hover:bg-white text-slate-700 px-5 py-3 rounded-2xl border border-slate-200/70 shadow-sm hover:shadow-md hover:border-[#0284C7]/50 transition duration-300 shrink-0">
                            @if($partner->logo_path)
                                <img src="{{ $partner->logo_path }}" alt="{{ $partner->name }}" class="h-9 w-auto max-w-[42px] object-contain rounded-lg">
                            @else
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 font-extrabold text-xs shadow-sm
                                    {{ $partner->category === 'BUMN' ? 'bg-sky-600 text-white' : ($partner->category === 'Universitas' ? 'bg-[#0F2C59] text-amber-300' : ($partner->category === 'Sekolah' ? 'bg-emerald-600 text-white' : 'bg-amber-500 text-slate-900')) }}">
                                    @if($partner->category === 'BUMN')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                    @elseif($partner->category === 'Universitas')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/></svg>
                                    @elseif($partner->category === 'Sekolah')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                    @else
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>
                                    @endif
                                </div>
                            @endif

                            <div>
                                <div class="font-extrabold text-xs sm:text-sm text-[#0F2C59] tracking-tight">
                                    {{ $partner->name }}
                                </div>
                                <div class="text-[10px] font-semibold text-slate-400">
                                    {{ $partner->category }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- SAMBUTAN PIMPINAN & STATISTIK PENCAPAIAN -->
    <section class="py-16 bg-[#F8FAFC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-slate-100">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <!-- Photo & Bio -->
                    <div class="lg:col-span-4 text-center lg:text-left">
                        <div class="relative inline-block">
                            <div class="w-32 h-32 sm:w-40 sm:h-40 rounded-2xl bg-gradient-to-tr from-[#0F2C59] to-[#0284C7] p-1 shadow-lg mx-auto">
                                <div class="w-full h-full rounded-2xl bg-slate-100 flex items-center justify-center text-slate-400 overflow-hidden">
                                    <svg class="w-20 h-20 text-slate-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                            </div>
                            <span class="absolute -bottom-2 right-1/2 translate-x-1/2 lg:translate-x-0 lg:-right-2 bg-emerald-500 text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow">
                                Verified
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-[#0F2C59] mt-4">{{ $ownerName }}</h3>
                        <p class="text-xs font-semibold text-[#0284C7] uppercase tracking-wider">{{ $ownerTitle }}</p>
                    </div>

                    <!-- Greeting Quote -->
                    <div class="lg:col-span-8 space-y-4">
                        <div class="text-[#0284C7] text-4xl font-serif">“</div>
                        <p class="text-slate-600 text-base sm:text-lg leading-relaxed italic -mt-6">
                            {{ $ownerGreeting }}
                        </p>
                        <div class="pt-2 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            — Komitmen Pelayanan Terbaik Nirwana Tour Lampung
                        </div>
                    </div>
                </div>

                <!-- 4 Statistics Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-10 mt-10 border-t border-slate-100 text-center">
                    <div class="space-y-1">
                        <div class="text-3xl sm:text-4xl font-extrabold text-[#0284C7]">{{ $siteSetting->years_experience ?? '8+' }}</div>
                        <div class="text-xs font-medium text-slate-500">Tahun Pengalaman</div>
                    </div>
                    <div class="space-y-1">
                        <div class="text-3xl sm:text-4xl font-extrabold text-[#0F2C59]">{{ $siteSetting->total_trips ?? '1.500+' }}</div>
                        <div class="text-xs font-medium text-slate-500">Trip Terlaksana Sukses</div>
                    </div>
                    <div class="space-y-1">
                        <div class="text-3xl sm:text-4xl font-extrabold text-amber-500">{{ $siteSetting->satisfaction_rate ?? '99%' }}</div>
                        <div class="text-xs font-medium text-slate-500">Tingkat Kepuasan Klien</div>
                    </div>
                    <div class="space-y-1">
                        <div class="text-3xl sm:text-4xl font-extrabold text-emerald-500">100%</div>
                        <div class="text-xs font-medium text-slate-500">Legalitas Resmi Terdaftar</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4 LAYANAN UTAMA -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider bg-sky-50 px-3 py-1 rounded-full">
                    Solusi Perjalanan Lengkap
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0F2C59] mt-3">
                    4 Layanan Utama Nirwana Tour
                </h2>
                <p class="text-sm text-slate-500 mt-2">
                    Kami menghadirkan ragam pilihan layanan tour & transportasi berkualitas tinggi untuk kebutuhan instansi maupun pribadi.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($services as $srv)
                    <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-slate-100 hover:border-[#0284C7]/30 hover:shadow-lg hover:-translate-y-1 transition duration-300 flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-[#0284C7]/10 text-[#0284C7] flex items-center justify-center mb-5 font-bold">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <h3 class="text-lg font-bold text-[#0F2C59] mb-2">{{ $srv->title }}</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                {{ $srv->short_description }}
                            </p>
                        </div>
                        <div class="pt-6">
                            <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode($srv->whatsapp_text ?? 'Halo Admin Nirwana Tour, saya ingin konsultasi layanan ' . $srv->title) }}"
                               target="_blank"
                               class="inline-flex items-center text-xs font-bold text-[#0284C7] hover:text-[#0F2C59] transition space-x-1">
                                <span>Konsultasi Layanan Ini</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('services') }}" class="inline-flex items-center space-x-2 text-sm font-bold text-[#0F2C59] hover:text-[#0284C7] transition">
                    <span>Lihat Rincian Fasilitas Seluruh Layanan & Armada</span>
                    <span>→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- PAKET WISATA UNGGULAN DENGAN QUICK ITINERARY MODAL -->
    <section class="py-16 bg-[#F8FAFC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider bg-sky-50 px-3 py-1 rounded-full">
                        Paling Banyak Dipilih
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0F2C59] mt-3">
                        Paket Wisata Unggulan
                    </h2>
                    <p class="text-sm text-slate-500 mt-1">
                        Pilihan paket favorit terlengkap dengan harga transparan dan fasilitas bintang lima.
                    </p>
                </div>
                <div>
                    <a href="{{ route('packages.index') }}" 
                       class="inline-flex items-center space-x-1.5 px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-[#0F2C59] font-bold text-xs hover:bg-[#0F2C59] hover:text-white transition shadow-sm">
                        <span>Lihat Semua Paket ({{ \App\Models\TourPackage::where('is_active', true)->count() }})</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <!-- Packages Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredPackages as $pkg)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                        <!-- Top Image -->
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ $pkg->thumbnail ?? 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80' }}" 
                                 alt="{{ $pkg->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full bg-[#0F2C59]/80 backdrop-blur-md text-white text-[11px] font-bold">
                                    {{ $pkg->category_label }}
                                </span>
                            </div>

                            <div class="absolute bottom-4 right-4">
                                <span class="px-3 py-1 rounded-lg bg-white/90 backdrop-blur-md text-slate-800 text-xs font-bold shadow">
                                    ⏱ {{ $pkg->duration }}
                                </span>
                            </div>
                        </div>

                        <!-- Content Body -->
                        <div class="p-6 flex-grow flex flex-col justify-between space-y-4">
                            <div>
                                <h3 class="text-lg font-bold text-[#0F2C59] group-hover:text-[#0284C7] transition line-clamp-2">
                                    <a href="{{ route('packages.show', $pkg->slug) }}">{{ $pkg->title }}</a>
                                </h3>
                                <p class="text-xs text-slate-500 mt-2 line-clamp-2">
                                    {{ $pkg->description }}
                                </p>

                                <!-- Include Tags Preview -->
                                @if(!empty($pkg->includes) && is_array($pkg->includes))
                                    <div class="mt-4 flex flex-wrap gap-1.5">
                                        @foreach(array_slice($pkg->includes, 0, 3) as $inc)
                                            <span class="inline-flex items-center text-[10px] font-medium bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-md">
                                                ✓ {{ $inc }}
                                            </span>
                                        @endforeach
                                        @if(count($pkg->includes) > 3)
                                            <span class="text-[10px] text-slate-400 font-medium self-center">
                                                +{{ count($pkg->includes) - 3 }} lainnya
                                            </span>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <!-- Price and Actions -->
                            <div class="pt-4 border-t border-slate-100">
                                <div class="flex items-baseline justify-between mb-4">
                                    <div>
                                        <span class="text-[10px] text-slate-400 font-medium block">Mulai dari</span>
                                        <span class="text-xl font-extrabold text-[#0284C7]">{{ $pkg->formatted_price }}</span>
                                        <span class="text-xs text-slate-500 font-normal">{{ $pkg->price_unit }}</span>
                                    </div>
                                    <!-- Quick Rundown Trigger Button -->
                                    <button type="button" 
                                            @click="openModal({{ json_encode($pkg) }})"
                                            class="text-xs font-bold text-[#0284C7] hover:underline flex items-center space-x-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        <span>Rundown</span>
                                    </button>
                                </div>

                                <div class="grid grid-cols-2 gap-2">
                                    <a href="{{ route('packages.show', $pkg->slug) }}" 
                                       class="py-2.5 text-center text-xs font-bold rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 transition">
                                        Detail Paket
                                    </a>
                                    <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode('Halo Admin Nirwana Tour, saya tertarik berkonsultasi mengenai paket: ' . $pkg->title) }}" 
                                       target="_blank"
                                       class="py-2.5 text-center text-xs font-bold rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white shadow-sm shadow-emerald-500/20 transition flex items-center justify-center space-x-1">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                                        <span>Pesan WA</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ALPINE.JS QUICK ITINERARY MODAL -->
    <div x-show="modalOpen" 
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto"
         role="dialog" 
         aria-modal="true">
        <!-- Backdrop -->
        <div x-show="modalOpen" 
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="closeModal()"
             class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>

        <!-- Modal Dialog Box -->
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div x-show="modalOpen" 
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">
                
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-[#0F2C59] to-[#0284C7] p-6 text-white flex justify-between items-start">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-wider bg-amber-400 text-slate-900 px-2 py-0.5 rounded">
                            Rundown Cepat
                        </span>
                        <h3 class="text-xl font-bold mt-2" x-text="modalPackage?.title"></h3>
                        <p class="text-xs text-slate-200 mt-1" x-text="'Durasi: ' + modalPackage?.duration"></p>
                    </div>
                    <button @click="closeModal()" class="text-white/70 hover:text-white p-1 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <!-- Modal Body: Itinerary Timeline -->
                <div class="p-6 max-h-[60vh] overflow-y-auto space-y-4">
                    <template x-if="modalPackage?.itineraries && modalPackage.itineraries.length > 0">
                        <div class="space-y-4">
                            <template x-for="(item, idx) in modalPackage.itineraries" :key="idx">
                                <div class="flex items-start space-x-3.5 pb-3 border-b border-slate-100 last:border-b-0">
                                    <div class="w-8 h-8 rounded-full bg-sky-100 text-[#0284C7] font-bold text-xs flex items-center justify-center shrink-0">
                                        <span x-text="'H' + (item.day || (idx + 1))"></span>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-bold text-[#0F2C59]" x-text="item.title"></h4>
                                        <p class="text-xs text-slate-600 mt-1 leading-relaxed" x-text="item.activities"></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <template x-if="!modalPackage?.itineraries || modalPackage.itineraries.length === 0">
                        <p class="text-xs text-slate-500 py-4 text-center">
                            Rundown detail sedang disiapkan. Silakan klik tombol di bawah untuk konsultasi langsung via WhatsApp.
                        </p>
                    </template>
                </div>

                <!-- Modal Footer -->
                <div class="bg-slate-50 px-6 py-4 flex flex-col sm:flex-row items-center justify-between gap-3 border-t border-slate-100">
                    <div>
                        <span class="text-xs text-slate-500">Harga:</span>
                        <span class="text-base font-extrabold text-[#0284C7]" x-text="'Rp ' + Number(modalPackage?.price || 0).toLocaleString('id-ID')"></span>
                        <span class="text-xs text-slate-400" x-text="modalPackage?.price_unit"></span>
                    </div>
                    <div class="flex items-center space-x-2 w-full sm:w-auto">
                        <button type="button" @click="closeModal()" class="w-1/2 sm:w-auto px-4 py-2 text-xs font-semibold text-slate-600 hover:text-slate-800">
                            Tutup
                        </button>
                        <a :href="'https://wa.me/{{ $waNumber }}?text=' + encodeURIComponent('Halo Admin Nirwana Tour, saya tertarik berkonsultasi mengenai paket: ' + (modalPackage?.title || ''))"
                           target="_blank"
                           class="w-1/2 sm:w-auto px-5 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs shadow flex items-center justify-center space-x-1.5">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                            <span>Pesan via WA</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CUPLIKAN GALERI DOKUMENTASI KEGIATAN -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider bg-sky-50 px-3 py-1 rounded-full">
                        Dokumentasi Nyata
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0F2C59] mt-3">
                        Momen Berkesan Bersama Klien
                    </h2>
                    <p class="text-sm text-slate-500 mt-1">
                        Kumpulan foto asli kebersamaan trip bersama BUMN, instansi, kampus, dan rombongan sekolah.
                    </p>
                </div>
                <div>
                    <a href="{{ route('gallery.index') }}" 
                       class="inline-flex items-center space-x-1.5 px-5 py-2.5 rounded-xl bg-slate-100 text-[#0F2C59] font-bold text-xs hover:bg-[#0284C7] hover:text-white transition">
                        <span>Buka Galeri Penuh (Lightbox)</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($galleries as $gal)
                    <div class="group relative rounded-2xl overflow-hidden shadow-sm aspect-square bg-slate-100">
                        <img src="{{ $gal->image_path }}" 
                             alt="{{ $gal->title }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition p-3 flex flex-col justify-end text-white">
                            <span class="text-[10px] text-amber-300 font-bold">{{ $gal->client_name ?? 'Klien Nirwana Tour' }}</span>
                            <h4 class="text-xs font-bold line-clamp-2">{{ $gal->title }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ ACCORDION -->
    <section class="py-16 bg-[#F8FAFC]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ activeFaq: null }">
            <div class="text-center mb-12">
                <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider bg-sky-50 px-3 py-1 rounded-full">
                    Pertanyaan Umum
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0F2C59] mt-3">
                    Tanya Jawab Seputar Layanan & Pemesanan
                </h2>
                <p class="text-sm text-slate-500 mt-2">
                    Informasi penting yang sering ditanyakan oleh calon peserta trip Nirwana Tour Lampung.
                </p>
            </div>

            <div class="space-y-3">
                @foreach($faqs as $idx => $faq)
                    <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm">
                        <button type="button" 
                                @click="activeFaq = (activeFaq === {{ $idx }} ? null : {{ $idx }})"
                                class="w-full px-6 py-4 text-left flex items-center justify-between font-bold text-sm text-[#0F2C59] hover:text-[#0284C7] transition">
                            <span>{{ $faq->question }}</span>
                            <svg class="w-5 h-5 shrink-0 transition-transform duration-200" 
                                 :class="activeFaq === {{ $idx }} ? 'rotate-180 text-[#0284C7]' : 'text-slate-400'"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="activeFaq === {{ $idx }}" 
                             x-cloak
                             x-collapse
                             class="px-6 pb-5 text-xs text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                            {{ $faq->answer }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-8">
                <a href="{{ route('contact') }}" class="text-xs font-bold text-[#0284C7] hover:underline">
                    Punya pertanyaan lain? Buka Halaman Kontak Lengkap →
                </a>
            </div>
        </div>
    </section>

    <!-- ARTIKEL / BLOG PREVIEW -->
    @if(isset($latestPosts) && $latestPosts->count() > 0)
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider bg-sky-50 px-3 py-1 rounded-full">
                        Tips & Berita Wisata
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0F2C59] mt-3">
                        Inspirasi & Panduan Perjalanan
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($latestPosts as $post)
                        <div class="bg-[#F8FAFC] rounded-2xl overflow-hidden border border-slate-100 hover:shadow-lg transition duration-300 flex flex-col justify-between">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ $post->thumbnail ?? 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80' }}" 
                                     alt="{{ $post->title }}" 
                                     class="w-full h-full object-cover hover:scale-105 transition duration-500">
                            </div>
                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <span class="text-[10px] font-bold text-[#0284C7] uppercase tracking-wider">
                                        {{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }}
                                    </span>
                                    <h3 class="text-base font-bold text-[#0F2C59] mt-1 line-clamp-2 hover:text-[#0284C7]">
                                        <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p class="text-xs text-slate-500 mt-2 line-clamp-3 leading-relaxed">
                                        {{ $post->excerpt }}
                                    </p>
                                </div>
                                <div class="pt-4 border-t border-slate-200/60 mt-4">
                                    <a href="{{ route('posts.show', $post->slug) }}" class="text-xs font-bold text-[#0284C7] hover:underline flex items-center space-x-1">
                                        <span>Baca Selengkapnya</span>
                                        <span>→</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- BANNER CTA KONTAK & KONSULTASI -->
    <section class="py-16 bg-[#0F2C59] text-white relative overflow-hidden">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-6">
            <span class="text-xs font-bold text-amber-400 uppercase tracking-widest bg-white/10 px-3.5 py-1.5 rounded-full">
                Mulai Perjalanan Anda
            </span>
            <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight">
                Siap Merencanakan Wisata & Sewa Bus Terbaik di Lampung?
            </h2>
            <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                Diskusikan rencana liburan keluarga, study tour sekolah, kunjungan industri, atau sewa armada bus Anda bersama tim konsultan ramah Nirwana Tour.
            </p>
            <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="https://wa.me/{{ $waNumber }}?text=Halo%20Admin%20Nirwana%20Tour,%20saya%20ingin%20berkonsultasi%20mengenai%20paket%20wisata."
                   target="_blank"
                   class="w-full sm:w-auto px-8 py-4 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-sm shadow-xl shadow-emerald-500/20 flex items-center justify-center space-x-2 transition transform hover:scale-105">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    <span>Konsultasi Gratis via WhatsApp (+{{ $waNumber }})</span>
                </a>
                <a href="{{ route('contact') }}"
                   class="w-full sm:w-auto px-8 py-4 rounded-xl bg-white/10 hover:bg-white/20 text-white font-semibold text-sm border border-white/20 transition">
                    Lihat Peta & Alamat Kantor
                </a>
            </div>
        </div>
    </section>

</div>

@endsection
