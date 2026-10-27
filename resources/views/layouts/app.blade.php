<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nirwana Tour Lampung — Biro Perjalanan Wisata & Sewa Bus Terpercaya')</title>
    <meta name="description" content="@yield('meta_description', 'Biro perjalanan wisata resmi di Lampung melayani paket wisata bahari Pahawang, study tour sekolah, kunjungan industri, dinas, dan sewa bus pariwisata.')">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: 200%;
            animation: marquee 25s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-[#F8FAFC] text-slate-800 antialiased flex flex-col min-h-screen" x-data="{ mobileMenu: false }">

    @php
        $waNumber = $siteSetting->whatsapp_number ?? '6282177889900';
        $companyName = $siteSetting->company_name ?? 'Nirwana Tour Lampung';
        $tagline = $siteSetting->tagline ?? 'Jelajahi Dunia, Ciptakan Cerita Tak Terlupakan';
    @endphp

    <!-- Top Info Bar -->
    <div class="bg-[#0F2C59] text-white text-xs py-2 px-4 border-b border-white/10 hidden sm:block">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <span class="flex items-center space-x-1.5">
                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span>Biro Wisata & Transportasi Resmi Berizin Lampung</span>
                </span>
                <span class="flex items-center space-x-1.5">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Jam Layanan: 24/7 Siap Konsultasi</span>
                </span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="hover:text-amber-400 transition flex items-center space-x-1">
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    <span>+{{ $waNumber }}</span>
                </a>
                <span class="text-white/40">|</span>
                <a href="/admin/login" class="hover:text-amber-400 transition flex items-center space-x-1 text-slate-300">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <span>Login CMS Admin</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Sticky Main Navbar -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md shadow-sm border-b border-slate-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('images/logo-nirwana.png') }}" 
                         alt="Nirwana Tour Lampung Logo" 
                         class="h-12 w-auto object-contain group-hover:scale-105 transition duration-200">
                    <div class="hidden sm:block">
                        <div class="text-xl font-extrabold tracking-tight text-[#0F2C59] group-hover:text-[#0284C7] transition leading-tight">
                            NIRWANA <span class="text-[#0284C7]">TOUR</span>
                        </div>
                        <div class="text-[10px] font-semibold tracking-wider text-slate-500 uppercase">
                            Lampung Tour & Travel
                        </div>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" 
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('home') ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:text-[#0284C7] hover:bg-slate-50' }}">
                        Beranda
                    </a>
                    <a href="{{ route('about') }}" 
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('about') ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:text-[#0284C7] hover:bg-slate-50' }}">
                        Tentang Kami
                    </a>
                    <a href="{{ route('services') }}" 
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('services') ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:text-[#0284C7] hover:bg-slate-50' }}">
                        Layanan
                    </a>
                    <a href="{{ route('packages.index') }}" 
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('packages.*') ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:text-[#0284C7] hover:bg-slate-50' }}">
                        Paket Wisata
                    </a>
                    <a href="{{ route('gallery.index') }}" 
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('gallery.*') ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:text-[#0284C7] hover:bg-slate-50' }}">
                        Galeri
                    </a>
                    <a href="{{ route('posts.index') }}" 
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('posts.*') ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:text-[#0284C7] hover:bg-slate-50' }}">
                        Artikel
                    </a>
                    <a href="{{ route('contact') }}" 
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('contact') ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:text-[#0284C7] hover:bg-slate-50' }}">
                        Kontak & FAQ
                    </a>

                    @if(isset($customNavPages) && $customNavPages->count() > 0)
                        @foreach($customNavPages as $navPage)
                            <a href="{{ route('custom-page.show', $navPage->slug) }}" 
                               class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->is('halaman/' . $navPage->slug) ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:text-[#0284C7] hover:bg-slate-50' }}">
                                {{ $navPage->title }}
                            </a>
                        @endforeach
                    @endif
                </nav>

                <!-- Action CTA Button -->
                <div class="hidden lg:flex items-center space-x-3">
                    <a href="https://wa.me/{{ $waNumber }}?text=Halo%20Admin%20Nirwana%20Tour,%20saya%20ingin%20berkonsultasi%20mengenai%20paket%20wisata." 
                       target="_blank"
                       class="inline-flex items-center space-x-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold text-sm shadow-md shadow-emerald-500/20 hover:from-emerald-600 hover:to-emerald-700 hover:shadow-lg transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        <span>Konsultasi WA</span>
                    </a>
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex items-center lg:hidden">
                    <button @click="mobileMenu = !mobileMenu" type="button" class="p-2.5 rounded-xl text-slate-700 hover:bg-slate-100 transition focus:outline-none">
                        <svg x-show="!mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg x-show="mobileMenu" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div x-show="mobileMenu" 
             x-cloak 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="lg:hidden border-b border-slate-200 bg-white px-4 pt-3 pb-6 space-y-1 shadow-lg">
            <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold {{ request()->routeIs('home') ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:bg-slate-50' }}">Beranda</a>
            <a href="{{ route('about') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold {{ request()->routeIs('about') ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:bg-slate-50' }}">Tentang Kami</a>
            <a href="{{ route('services') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold {{ request()->routeIs('services') ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:bg-slate-50' }}">Layanan</a>
            <a href="{{ route('packages.index') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold {{ request()->routeIs('packages.*') ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:bg-slate-50' }}">Paket Wisata</a>
            <a href="{{ route('gallery.index') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold {{ request()->routeIs('gallery.*') ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:bg-slate-50' }}">Galeri Dokumentasi</a>
            <a href="{{ route('posts.index') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold {{ request()->routeIs('posts.*') ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:bg-slate-50' }}">Artikel Wisata</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold {{ request()->routeIs('contact') ? 'text-[#0284C7] bg-sky-50' : 'text-slate-700 hover:bg-slate-50' }}">Kontak & FAQ</a>
            
            @if(isset($customNavPages) && $customNavPages->count() > 0)
                @foreach($customNavPages as $navPage)
                    <a href="{{ route('custom-page.show', $navPage->slug) }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-700 hover:bg-slate-50">{{ $navPage->title }}</a>
                @endforeach
            @endif

            <div class="pt-3 border-t border-slate-100 flex flex-col space-y-2">
                <a href="https://wa.me/{{ $waNumber }}?text=Halo%20Admin%20Nirwana%20Tour,%20saya%20ingin%20berkonsultasi%20mengenai%20paket%20wisata." 
                   target="_blank"
                   class="w-full py-3 text-center rounded-xl bg-emerald-500 text-white font-semibold text-sm flex items-center justify-center space-x-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    <span>Konsultasi Cepat via WhatsApp</span>
                </a>
                <a href="/admin/login" class="w-full py-2.5 text-center rounded-xl bg-slate-100 text-slate-700 font-medium text-xs">
                    Login Admin CMS (/admin)
                </a>
            </div>
        </div>
    </header>

    <!-- Main Dynamic Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Floating WhatsApp Action Button -->
    <aside aria-label="Konsultasi WhatsApp Langsung" class="fixed bottom-6 right-6 z-40">
        <a href="https://wa.me/{{ $waNumber }}?text=Halo%20Admin%20Nirwana%20Tour,%20saya%20ingin%20berkonsultasi%20mengenai%20paket%20wisata."
           target="_blank"
           class="group relative flex items-center justify-center w-14 h-14 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white shadow-xl shadow-emerald-500/30 transition transform hover:scale-110 active:scale-95 focus:outline-none">
            <!-- Pulsing Radar Animation -->
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-60"></span>
            <svg class="relative w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
            <!-- Tooltip text on hover -->
            <span class="absolute right-16 top-1/2 -translate-y-1/2 bg-[#0F2C59] text-white text-xs font-semibold px-3 py-1.5 rounded-lg whitespace-nowrap opacity-0 pointer-events-none group-hover:opacity-100 transition shadow-lg">
                Chat Admin Nirwana Tour
            </span>
        </a>
    </aside>

    <!-- Footer -->
    <footer class="bg-[#0F2C59] text-slate-300 pt-16 pb-8 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-white/10">
                <!-- Col 1: Brand Info -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo-nirwana.png') }}" 
                             alt="Nirwana Tour Lampung Logo" 
                             class="h-11 w-auto object-contain bg-white/10 p-1 rounded-xl">
                        <span class="text-xl font-extrabold text-white tracking-tight">NIRWANA TOUR</span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        {{ $tagline }}. Biro perjalanan wisata resmi dan penyedia sewa armada bus pariwisata berkelas di Provinsi Lampung.
                    </p>
                    <div class="pt-2 text-xs text-amber-400 font-medium flex items-center space-x-1.5">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span>Legalitas Berizin Resmi & Terpercaya</span>
                    </div>
                </div>

                <!-- Col 2: Navigasi Cepat -->
                <div>
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4">Navigasi Halaman</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-amber-400 transition">Beranda Utama</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-amber-400 transition">Tentang Kami</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-amber-400 transition">Layanan & Armada Bus</a></li>
                        <li><a href="{{ route('packages.index') }}" class="hover:text-amber-400 transition">Katalog Paket Wisata</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="hover:text-amber-400 transition">Galeri Foto Kegiatan</a></li>
                        <li><a href="{{ route('posts.index') }}" class="hover:text-amber-400 transition">Artikel & Tips Liburan</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-amber-400 transition">Kontak & Lokasi Kantor</a></li>
                    </ul>
                </div>

                <!-- Col 3: Destinasi Favorit -->
                <div>
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4">Destinasi Populer</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('packages.index', ['category' => 'lampung']) }}" class="hover:text-amber-400 transition">Pulau Pahawang & Kelagian</a></li>
                        <li><a href="{{ route('packages.index', ['category' => 'lampung']) }}" class="hover:text-amber-400 transition">Safari Dolphin Teluk Kiluan</a></li>
                        <li><a href="{{ route('packages.index', ['category' => 'lampung']) }}" class="hover:text-amber-400 transition">Pantai Krui & Danau Ranau</a></li>
                        <li><a href="{{ route('packages.index', ['category' => 'nusantara']) }}" class="hover:text-amber-400 transition">Yogyakarta & Sunrise Bromo</a></li>
                        <li><a href="{{ route('packages.index', ['category' => 'edukasi']) }}" class="hover:text-amber-400 transition">Study Tour Bandung & Bosscha</a></li>
                        <li><a href="{{ route('packages.index', ['category' => 'armada']) }}" class="hover:text-amber-400 transition">Sewa Big Bus Pariwisata 50 Seat</a></li>
                    </ul>
                </div>

                <!-- Col 4: Kantor & Kontak -->
                <div class="space-y-3">
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4">Kontak Resmi</h4>
                    <p class="text-xs text-slate-400 leading-relaxed flex items-start space-x-2">
                        <svg class="w-4 h-4 text-amber-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>{{ $siteSetting->address ?? 'Jl. ZA. Pagar Alam No. 88, Bandar Lampung' }}</span>
                    </p>
                    <p class="text-xs text-slate-400 flex items-center space-x-2">
                        <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        <span>WhatsApp: +{{ $waNumber }}</span>
                    </p>
                    <p class="text-xs text-slate-400 flex items-center space-x-2">
                        <svg class="w-4 h-4 text-sky-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>{{ $siteSetting->email ?? 'halo@nirwanatourlampung.com' }}</span>
                    </p>

                    @if(isset($customNavPages) && $customNavPages->count() > 0)
                        <div class="pt-2 text-xs flex flex-wrap gap-2">
                            @foreach($customNavPages as $cp)
                                <a href="{{ route('custom-page.show', $cp->slug) }}" class="underline hover:text-white">{{ $cp->title }}</a>
                            @endforeach
                        </div>
                    @else
                        <div class="pt-2 text-xs">
                            <a href="{{ route('custom-page.show', 'syarat-dan-ketentuan') }}" class="underline hover:text-white">Syarat & Ketentuan Pemesanan</a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-400 gap-4">
                <p>&copy; {{ date('Y') }} {{ $companyName }}. Hak Cipta Dilindungi Undang-Undang.</p>
                <p>Website dikembangkan oleh <span class="text-white font-medium">Swift Code Lampung</span></p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
