@extends('layouts.app')

@section('title', $package->title . ' — Nirwana Tour Lampung')
@section('meta_description', Str::limit(strip_tags($package->description), 150))

@section('content')

@php
    $waNumber = $siteSetting->whatsapp_number ?? '6282177889900';
    $waMessage = 'Halo Admin Nirwana Tour, saya tertarik berkonsultasi mengenai paket: ' . $package->title;
@endphp

<!-- Breadcrumb -->
<div class="bg-white border-b border-slate-100 py-3 text-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center space-x-2 text-slate-500">
        <a href="{{ route('home') }}" class="hover:text-[#0284C7]">Beranda</a>
        <span>/</span>
        <a href="{{ route('packages.index') }}" class="hover:text-[#0284C7]">Paket Wisata</a>
        <span>/</span>
        <span class="text-slate-800 font-bold truncate max-w-xs sm:max-w-md">{{ $package->title }}</span>
    </div>
</div>

<section class="py-10 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Left Column: Main Detail, Facilities & Rundown -->
            <div class="lg:col-span-8 space-y-8">
                <!-- Package Hero Visual -->
                <div class="relative rounded-3xl overflow-hidden shadow-md bg-slate-900 h-80 sm:h-96">
                    <img src="{{ $package->thumbnail ?? 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80' }}" 
                         alt="{{ $package->title }}" 
                         class="w-full h-full object-cover opacity-90">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    
                    <div class="absolute bottom-6 left-6 right-6 text-white space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="px-3 py-1 rounded-full bg-[#0284C7] text-white text-[11px] font-bold">
                                {{ $package->category_label }}
                            </span>
                            <span class="px-3 py-1 rounded-full bg-white/20 backdrop-blur-md text-white text-[11px] font-semibold">
                                ⏱ {{ $package->duration }}
                            </span>
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-white leading-tight">
                            {{ $package->title }}
                        </h1>
                    </div>
                </div>

                <!-- Description Card -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-100 space-y-4">
                    <h2 class="text-lg font-bold text-[#0F2C59]">Tentang Paket Wisata Ini</h2>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        {{ $package->description }}
                    </p>
                </div>

                <!-- Include & Exclude Facilities Card -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-100 space-y-6">
                    <h2 class="text-lg font-bold text-[#0F2C59]">Rincian Fasilitas Perjalanan</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Include -->
                        <div class="bg-emerald-50/60 rounded-2xl p-5 border border-emerald-100/80">
                            <h3 class="text-xs font-bold text-emerald-800 uppercase tracking-wider mb-3 flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>Fasilitas Termasuk (Include)</span>
                            </h3>
                            @if(!empty($package->includes) && is_array($package->includes))
                                <ul class="space-y-2 text-xs text-slate-700">
                                    @foreach($package->includes as $inc)
                                        <li class="flex items-start space-x-2">
                                            <svg class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                            <span>{{ $inc }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-xs text-slate-400">Informasi fasilitas include hubungi admin.</p>
                            @endif
                        </div>

                        <!-- Exclude -->
                        <div class="bg-slate-50 rounded-2xl p-5 border border-slate-200/60">
                            <h3 class="text-xs font-bold text-slate-600 uppercase tracking-wider mb-3 flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-rose-400"></span>
                                <span>Tidak Termasuk (Exclude)</span>
                            </h3>
                            @if(!empty($package->excludes) && is_array($package->excludes))
                                <ul class="space-y-2 text-xs text-slate-600">
                                    @foreach($package->excludes as $exc)
                                        <li class="flex items-start space-x-2">
                                            <svg class="w-4 h-4 text-rose-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                                            <span>{{ $exc }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-xs text-slate-400">Keperluan pribadi tidak termasuk.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Day-by-Day Rundown Timeline -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-100 space-y-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider">Itinerary Lengkap</span>
                            <h2 class="text-lg font-bold text-[#0F2C59] mt-0.5">Rundown Perjalanan Harian</h2>
                        </div>
                        <span class="text-xs text-slate-500 bg-slate-100 px-3 py-1 rounded-full font-medium">
                            Dapat disesuaikan (custom)
                        </span>
                    </div>

                    @if(!empty($package->itineraries) && is_array($package->itineraries))
                        <div class="space-y-6 relative before:absolute before:inset-0 before:left-4 before:w-0.5 before:bg-slate-200">
                            @foreach($package->itineraries as $idx => $day)
                                <div class="relative flex items-start space-x-4">
                                    <div class="relative z-10 w-8 h-8 rounded-full bg-[#0284C7] text-white text-xs font-extrabold flex items-center justify-center shrink-0 shadow-md shadow-sky-500/20">
                                        {{ $day['day'] ?? ($idx + 1) }}
                                    </div>
                                    <div class="bg-[#F8FAFC] rounded-2xl p-5 border border-slate-100 flex-grow space-y-2">
                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                                            <h3 class="text-sm font-bold text-[#0F2C59]">
                                                {{ $day['title'] ?? ('Hari ke-' . ($idx + 1)) }}
                                            </h3>
                                            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Hari {{ $day['day'] ?? ($idx + 1) }}</span>
                                        </div>
                                        <p class="text-xs text-slate-600 leading-relaxed">
                                            {{ $day['activities'] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs text-slate-500 py-4 text-center">
                            Rundown harian untuk paket ini siap dikirimkan melalui WhatsApp oleh tim konsultan kami.
                        </p>
                    @endif
                </div>

            </div>

            <!-- Right Column: Sticky Booking Card (No Calculator - Direct WhatsApp) -->
            <div class="lg:col-span-4">
                <div class="sticky top-28 space-y-6">
                    <div class="bg-white rounded-3xl p-6 shadow-md border border-slate-100 space-y-6">
                        <div>
                            <span class="text-xs text-slate-400 block font-medium">Biaya Investasi Mulai Dari</span>
                            <div class="flex items-baseline space-x-1.5 mt-1">
                                <span class="text-3xl font-extrabold text-[#0284C7]">{{ $package->formatted_price }}</span>
                                <span class="text-xs text-slate-500 font-medium">{{ $package->price_unit }}</span>
                            </div>
                            <span class="inline-block mt-2 text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-md">
                                Bebas Konsultasi & Negosiasi Rombongan
                            </span>
                        </div>

                        <div class="space-y-3 pt-3 border-t border-slate-100 text-xs text-slate-600">
                            <div class="flex justify-between">
                                <span class="text-slate-400">Durasi Trip:</span>
                                <span class="font-bold text-slate-800">{{ $package->duration }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400">Kategori:</span>
                                <span class="font-bold text-slate-800">{{ $package->category_label }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400">Titik Kumpul:</span>
                                <span class="font-bold text-slate-800">Lampung / Sesuai Request</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400">Uang Muka (DP):</span>
                                <span class="font-bold text-slate-800">Mulai 30% Terkonfirmasi</span>
                            </div>
                        </div>

                        <!-- Main CTA: Direct Pre-filled WhatsApp Booking Button -->
                        <div class="pt-2">
                            <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode($waMessage) }}"
                               target="_blank"
                               class="w-full py-4 px-6 rounded-2xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-sm shadow-lg shadow-emerald-500/25 flex items-center justify-center space-x-2.5 transition transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                                <span>Pesan / Konsultasi via WA</span>
                            </a>
                            <p class="text-[10px] text-slate-400 text-center mt-2.5">
                                Terhubung langsung dengan Admin Resmi Nirwana Tour Lampung
                            </p>
                        </div>
                    </div>

                    <!-- Trust Box -->
                    <div class="bg-sky-50 rounded-3xl p-5 border border-sky-100 text-xs text-slate-700 space-y-2">
                        <div class="font-bold text-[#0F2C59] flex items-center space-x-1.5">
                            <span class="text-[#0284C7]">🛡️</span>
                            <span>Jaminan Kepuasan & Legalitas</span>
                        </div>
                        <p class="text-[11px] text-slate-600 leading-relaxed">
                            Kami menyediakan invoice resmi, kwitansi bertanda tangan basah, dan surat kontrak untuk pertanggungjawaban dana dinas/sekolah (SPJ).
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Related Tour Packages -->
        @if(isset($relatedPackages) && $relatedPackages->count() > 0)
            <div class="mt-16 pt-12 border-t border-slate-200">
                <div class="mb-8">
                    <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider">Rekomendasi Lainnya</span>
                    <h2 class="text-2xl font-extrabold text-[#0F2C59] mt-1">Paket Wisata Terkait</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedPackages as $rel)
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 flex flex-col justify-between group">
                            <div class="h-44 overflow-hidden relative">
                                <img src="{{ $rel->thumbnail ?? 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $rel->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                <span class="absolute bottom-3 right-3 text-[10px] font-bold bg-white/90 px-2 py-0.5 rounded shadow">⏱ {{ $rel->duration }}</span>
                            </div>
                            <div class="p-5 flex-grow flex flex-col justify-between space-y-3">
                                <div>
                                    <h4 class="text-sm font-bold text-[#0F2C59] group-hover:text-[#0284C7] line-clamp-2">
                                        <a href="{{ route('packages.show', $rel->slug) }}">{{ $rel->title }}</a>
                                    </h4>
                                    <div class="text-xs font-extrabold text-[#0284C7] mt-2">{{ $rel->formatted_price }} <span class="text-[10px] text-slate-400 font-normal">{{ $rel->price_unit }}</span></div>
                                </div>
                                <div class="pt-2 border-t border-slate-100">
                                    <a href="{{ route('packages.show', $rel->slug) }}" class="text-xs font-bold text-[#0F2C59] hover:text-[#0284C7]">
                                        Lihat Rincian →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>

@endsection
