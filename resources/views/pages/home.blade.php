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

    <!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-[#0F2C59] via-[#132D5E] to-[#0284C7] text-white overflow-hidden py-20 lg:py-28">
        <!-- Background Decorative Circles & Pattern -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <circle cx="90" cy="10" r="30" fill="currentColor"/>
                <circle cx="10" cy="90" r="40" fill="currentColor"/>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <!-- Badges -->
                    <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs font-semibold text-amber-300">
                        <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span>Biro Wisata & Transportasi Resmi Terpercaya di Lampung</span>
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight">
                        Jelajahi Dunia, <br class="hidden sm:inline">
                        <span class="text-amber-400">Ciptakan Cerita</span> Tak Terlupakan
                    </h1>

                    <p class="text-base sm:text-lg text-slate-200 max-w-2xl leading-relaxed mx-auto lg:mx-0">
                        Mitra perjalanan terpercaya untuk liburan keluarga, karya wisata edukatif sekolah, kunjungan dinas BUMN, serta sewa armada bus pariwisata eksekutif dengan standar keamanan & kenyamanan terbaik.
                    </p>

                    <!-- Trust highlights -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-2 text-xs font-medium text-slate-200">
                        <div class="flex items-center space-x-1.5 justify-center lg:justify-start">
                            <span class="text-amber-400">✓</span>
                            <span>Legalitas Resmi</span>
                        </div>
                        <div class="flex items-center space-x-1.5 justify-center lg:justify-start">
                            <span class="text-amber-400">✓</span>
                            <span>Armada Bus Terawat</span>
                        </div>
                        <div class="flex items-center space-x-1.5 justify-center lg:justify-start">
                            <span class="text-amber-400">✓</span>
                            <span>Tour Leader Berlisensi</span>
                        </div>
                        <div class="flex items-center space-x-1.5 justify-center lg:justify-start">
                            <span class="text-amber-400">✓</span>
                            <span>100% Kepuasan Trip</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-4 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="https://wa.me/{{ $waNumber }}?text=Halo%20Admin%20Nirwana%20Tour,%20saya%20tertarik%20untuk%20konsultasi%20paket%20wisata."
                           target="_blank"
                           class="w-full sm:w-auto px-7 py-3.5 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-base shadow-lg shadow-emerald-500/30 flex items-center justify-center space-x-2.5 transition transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                            <span>Konsultasi via WhatsApp</span>
                        </a>
                        <a href="{{ route('packages.index') }}"
                           class="w-full sm:w-auto px-7 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-semibold text-base backdrop-blur-md flex items-center justify-center space-x-2 transition">
                            <span>Lihat Katalog Paket</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Hero Visual Card Preview -->
                <div class="lg:col-span-5">
                    <div class="relative mx-auto max-w-md lg:max-w-none">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white/20">
                            <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80" 
                                 alt="Pulau Pahawang Lampung" 
                                 class="w-full h-[380px] object-cover hover:scale-105 transition duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            
                            <div class="absolute bottom-5 left-5 right-5 text-white">
                                <span class="px-2.5 py-1 rounded-md bg-amber-500 text-slate-900 font-bold text-xs uppercase">
                                    Destinasi Ikonik
                                </span>
                                <h3 class="text-xl font-bold mt-2">Pulau Pahawang & Kelagian</h3>
                                <p class="text-xs text-slate-300 mt-1 line-clamp-2">
                                    Surga bawah laut terumbu karang warna-warni dan nemo Lampung.
                                </p>
                            </div>
                        </div>

                        <!-- Floating Stat Badge -->
                        <div class="absolute -bottom-6 -left-4 sm:-left-6 bg-white rounded-2xl p-4 shadow-xl border border-slate-100 flex items-center space-x-3 text-slate-800">
                            <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center text-amber-500 font-extrabold text-xl">
                                ★
                            </div>
                            <div>
                                <div class="text-xs text-slate-400 font-medium">Rating Pelanggan</div>
                                <div class="text-sm font-extrabold text-[#0F2C59]">4.9 / 5.0 (1.500+ Trip)</div>
                            </div>
                        </div>
                    </div>
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
