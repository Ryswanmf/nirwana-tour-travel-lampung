@extends('layouts.app')

@section('title', 'Layanan & Sewa Bus Pariwisata — Nirwana Tour Lampung')
@section('meta_description', 'Layanan paket wisata reguler, karya wisata study tour sekolah, kunjungan industri BUMN, dan sewa bus pariwisata HiAce hingga Big Bus SHD di Lampung.')

@section('content')

@php
    $waNumber = $siteSetting->whatsapp_number ?? '6282177889900';
@endphp

<!-- Page Header -->
<div class="bg-gradient-to-r from-[#0F2C59] to-[#0284C7] text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="text-xs font-bold text-amber-300 uppercase tracking-widest bg-white/10 px-3.5 py-1.5 rounded-full">
            Layanan Unggulan
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Layanan Wisata & Sewa Transportasi</h1>
        <p class="text-slate-200 text-sm max-w-2xl mx-auto">
            Solusi menyeluruh dari perencanaan konsep perjalanan, pendampingan tour guide profesional, hingga penyewaan armada bus pariwisata eksekutif.
        </p>
    </div>
</div>

<!-- 4 Layanan Utama Detail -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        @foreach($services as $index => $srv)
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center {{ $index % 2 === 1 ? 'lg:flex-row-reverse' : '' }}">
                <div class="lg:col-span-7 space-y-4 {{ $index % 2 === 1 ? 'lg:order-2' : '' }}">
                    <div class="inline-flex items-center space-x-2 text-xs font-bold text-[#0284C7] bg-sky-50 px-3 py-1 rounded-full uppercase">
                        <span>Layanan #0{{ $index + 1 }}</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0F2C59]">{{ $srv->title }}</h2>
                    <p class="text-sm sm:text-base font-semibold text-slate-700">
                        {{ $srv->short_description }}
                    </p>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        {{ $srv->full_description }}
                    </p>
                    <div class="pt-2">
                        <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode($srv->whatsapp_text ?? 'Halo Admin Nirwana Tour, saya ingin konsultasi layanan ' . $srv->title) }}"
                           target="_blank"
                           class="inline-flex items-center space-x-2 px-6 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs shadow-md shadow-emerald-500/20 transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                            <span>Konsultasi {{ $srv->title }} via WA</span>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-5 {{ $index % 2 === 1 ? 'lg:order-1' : '' }}">
                    <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100 bg-slate-50 p-2">
                        @php
                            $img = match($srv->slug) {
                                'paket-wisata-reguler' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80',
                                'study-tour-edukatif' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80',
                                'kunjungan-industri-dinas' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=800&q=80',
                                'sewa-transportasi-rombongan' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80',
                                default => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80'
                            };
                        @endphp
                        <img src="{{ $img }}" alt="{{ $srv->title }}" class="w-full h-72 object-cover rounded-2xl">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- SPESIFIKASI ARMADA BUS PARIWISATA -->
<section class="py-16 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider bg-sky-50 px-3 py-1 rounded-full">
                Pilihan Transportasi
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0F2C59] mt-3">
                Katalog Armada Bus & Minibus Pariwisata
            </h2>
            <p class="text-sm text-slate-500 mt-2">
                Seluruh unit armada ber-AC dingin, terawat berkala, dan dilengkapi fasilitas hiburan multimedia lengkap.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- HiAce -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 flex flex-col justify-between">
                <div class="h-48 overflow-hidden bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1559297434-fae8a1916a79?auto=format&fit=crop&w=800&q=80" alt="Toyota HiAce" class="w-full h-full object-cover">
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-bold text-[#0284C7]">Minibus Mewah</span>
                        <span class="text-xs font-extrabold bg-sky-50 text-sky-700 px-2.5 py-1 rounded-lg">14 Seats</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#0F2C59]">Toyota HiAce Commuter / Premio</h3>
                    <ul class="text-xs text-slate-600 space-y-2">
                        <li>✓ Kapasitas 14-15 Penumpang Nyaman</li>
                        <li>✓ Full AC Ducting Sejuk Merata</li>
                        <li>✓ Reclining Seats & Audio Bluetooth</li>
                        <li>✓ Sangat Lincah untuk Rute Dalam & Luar Kota</li>
                    </ul>
                    <div class="pt-4 border-t border-slate-100">
                        <a href="https://wa.me/{{ $waNumber }}?text=Halo%20Admin%20Nirwana%20Tour,%20saya%20ingin%20cek%20ketersediaan%20Toyota%20HiAce."
                           target="_blank"
                           class="block w-full py-2.5 text-center text-xs font-bold rounded-xl bg-slate-100 hover:bg-[#0284C7] hover:text-white text-slate-700 transition">
                            Tanya Tarif Sewa HiAce
                        </a>
                    </div>
                </div>
            </div>

            <!-- Medium Bus -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 flex flex-col justify-between">
                <div class="h-48 overflow-hidden bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1570125909232-eb263c188f7e?auto=format&fit=crop&w=800&q=80" alt="Medium Bus" class="w-full h-full object-cover">
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-bold text-amber-500">Medium Bus Eksekutif</span>
                        <span class="text-xs font-extrabold bg-amber-50 text-amber-700 px-2.5 py-1 rounded-lg">31–35 Seats</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#0F2C59]">Medium Bus Pariwisata</h3>
                    <ul class="text-xs text-slate-600 space-y-2">
                        <li>✓ Kapasitas 31 hingga 35 Kursi (2-2)</li>
                        <li>✓ Full AC, Smart TV LCD & Karaoke Wireless</li>
                        <li>✓ USB Port Charger di Setiap Deret Kursi</li>
                        <li>✓ Bagasi Luas Samping & Belakang</li>
                    </ul>
                    <div class="pt-4 border-t border-slate-100">
                        <a href="https://wa.me/{{ $waNumber }}?text=Halo%20Admin%20Nirwana%20Tour,%20saya%20ingin%20cek%20ketersediaan%20Medium%20Bus%2031-35%20Seat."
                           target="_blank"
                           class="block w-full py-2.5 text-center text-xs font-bold rounded-xl bg-slate-100 hover:bg-[#0284C7] hover:text-white text-slate-700 transition">
                            Tanya Tarif Sewa Medium Bus
                        </a>
                    </div>
                </div>
            </div>

            <!-- Big Bus SHD -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 flex flex-col justify-between">
                <div class="h-48 overflow-hidden bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80" alt="Big Bus SHD" class="w-full h-full object-cover">
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-bold text-emerald-600">Big Bus Luxury SHD</span>
                        <span class="text-xs font-extrabold bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-lg">45–50 Seats</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#0F2C59]">Big Bus Super High Deck</h3>
                    <ul class="text-xs text-slate-600 space-y-2">
                        <li>✓ Kapasitas 45 hingga 50 Kursi Reclining</li>
                        <li>✓ Bodi SHD Tinggi dengan Pandangan Panorama</li>
                        <li>✓ Double TV LED, Sound System Karaoke, Coolbox</li>
                        <li>✓ Bagasi Tembus Raksasa (Muat Banyak Koper & Logistik)</li>
                    </ul>
                    <div class="pt-4 border-t border-slate-100">
                        <a href="https://wa.me/{{ $waNumber }}?text=Halo%20Admin%20Nirwana%20Tour,%20saya%20ingin%20cek%20ketersediaan%20Big%20Bus%20SHD%2050%20Seat."
                           target="_blank"
                           class="block w-full py-2.5 text-center text-xs font-bold rounded-xl bg-slate-100 hover:bg-[#0284C7] hover:text-white text-slate-700 transition">
                            Tanya Tarif Sewa Big Bus SHD
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
