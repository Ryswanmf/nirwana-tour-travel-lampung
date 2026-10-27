@extends('layouts.app')

@section('title', 'Katalog Paket Wisata & Sewa Bus — Nirwana Tour Lampung')
@section('meta_description', 'Pilihan lengkap paket wisata Lampung, open trip Pahawang, paket Nusantara Jogja Bromo, study tour edukatif, dan sewa bus pariwisata.')

@section('content')

@php
    $waNumber = $siteSetting->whatsapp_number ?? '6282177889900';
@endphp

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

    <!-- Page Header -->
    <div class="bg-gradient-to-r from-[#0F2C59] to-[#0284C7] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
            <span class="text-xs font-bold text-amber-300 uppercase tracking-widest bg-white/10 px-3.5 py-1.5 rounded-full">
                Katalog Destinasi
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Katalog Paket Wisata & Transportasi</h1>
            <p class="text-slate-200 text-sm max-w-2xl mx-auto">
                Pilih destinasi impian Anda bersama Nirwana Tour. Seluruh paket dapat disesuaikan (customized) sesuai kebutuhan rombongan.
            </p>
        </div>
    </div>

    <!-- Filter & Search Controls -->
    <section class="py-8 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <!-- Category Tabs -->
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('packages.index', request()->only('q')) }}" 
                       class="px-4 py-2 rounded-xl text-xs font-bold transition {{ !$category ? 'bg-[#0284C7] text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                        Semua Paket
                    </a>
                    <a href="{{ route('packages.index', array_merge(request()->only('q'), ['category' => 'lampung'])) }}" 
                       class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $category === 'lampung' ? 'bg-[#0284C7] text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                        Wisata Lampung
                    </a>
                    <a href="{{ route('packages.index', array_merge(request()->only('q'), ['category' => 'nusantara'])) }}" 
                       class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $category === 'nusantara' ? 'bg-[#0284C7] text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                        Wisata Nusantara
                    </a>
                    <a href="{{ route('packages.index', array_merge(request()->only('q'), ['category' => 'edukasi'])) }}" 
                       class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $category === 'edukasi' ? 'bg-[#0284C7] text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                        Study Tour & Edukasi
                    </a>
                    <a href="{{ route('packages.index', array_merge(request()->only('q'), ['category' => 'armada'])) }}" 
                       class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $category === 'armada' ? 'bg-[#0284C7] text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                        Sewa Armada Bus
                    </a>
                </div>

                <!-- Search Form -->
                <form action="{{ route('packages.index') }}" method="GET" class="flex items-center space-x-2">
                    @if($category)
                        <input type="hidden" name="category" value="{{ $category }}">
                    @endif
                    <div class="relative w-full md:w-64">
                        <input type="text" 
                               name="q" 
                               value="{{ $search }}" 
                               placeholder="Cari paket atau destinasi..." 
                               class="w-full pl-9 pr-4 py-2 text-xs rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#0284C7] transition">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-[#0F2C59] text-white rounded-xl text-xs font-bold hover:bg-[#0284C7] transition">
                        Cari
                    </button>
                    @if($search || $category)
                        <a href="{{ route('packages.index') }}" class="px-2.5 py-2 text-xs text-rose-500 font-semibold hover:underline">
                            Reset
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </section>

    <!-- Packages Listing Grid -->
    <section class="py-16 bg-[#F8FAFC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($packages->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($packages as $pkg)
                        <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                            <!-- Image Header -->
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

                            <!-- Body -->
                            <div class="p-6 flex-grow flex flex-col justify-between space-y-4">
                                <div>
                                    <h3 class="text-lg font-bold text-[#0F2C59] group-hover:text-[#0284C7] transition line-clamp-2">
                                        <a href="{{ route('packages.show', $pkg->slug) }}">{{ $pkg->title }}</a>
                                    </h3>
                                    <p class="text-xs text-slate-500 mt-2 line-clamp-2">
                                        {{ $pkg->description }}
                                    </p>

                                    <!-- Includes Preview -->
                                    @if(!empty($pkg->includes) && is_array($pkg->includes))
                                        <div class="mt-4 flex flex-wrap gap-1.5">
                                            @foreach(array_slice($pkg->includes, 0, 3) as $inc)
                                                <span class="inline-flex items-center text-[10px] font-medium bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-md">
                                                    ✓ {{ $inc }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <!-- Price and Buttons -->
                                <div class="pt-4 border-t border-slate-100">
                                    <div class="flex items-baseline justify-between mb-4">
                                        <div>
                                            <span class="text-[10px] text-slate-400 font-medium block">Harga</span>
                                            <span class="text-xl font-extrabold text-[#0284C7]">{{ $pkg->formatted_price }}</span>
                                            <span class="text-xs text-slate-500 font-normal">{{ $pkg->price_unit }}</span>
                                        </div>
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
                                            Detail Lengkap
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

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $packages->links() }}
                </div>
            @else
                <div class="bg-white rounded-3xl p-12 text-center border border-slate-100 max-w-lg mx-auto space-y-4">
                    <div class="text-4xl">🔍</div>
                    <h3 class="text-lg font-bold text-[#0F2C59]">Paket Wisata Tidak Ditemukan</h3>
                    <p class="text-xs text-slate-500">
                        Tidak ada paket yang sesuai dengan kata kunci atau kategori yang Anda pilih. Coba reset filter atau konsultasikan paket custom via WhatsApp.
                    </p>
                    <a href="{{ route('packages.index') }}" class="inline-block px-5 py-2.5 rounded-xl bg-[#0284C7] text-white text-xs font-bold">
                        Reset Pencarian
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- QUICK ITINERARY MODAL (ALPINE.JS) -->
    <div x-show="modalOpen" 
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto"
         role="dialog" 
         aria-modal="true">
        <div x-show="modalOpen" 
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="closeModal()"
             class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>

        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div x-show="modalOpen" 
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">
                
                <div class="bg-gradient-to-r from-[#0F2C59] to-[#0284C7] p-6 text-white flex justify-between items-start">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-wider bg-amber-400 text-slate-900 px-2 py-0.5 rounded">
                            Rundown Singkat
                        </span>
                        <h3 class="text-xl font-bold mt-2" x-text="modalPackage?.title"></h3>
                        <p class="text-xs text-slate-200 mt-1" x-text="'Durasi: ' + modalPackage?.duration"></p>
                    </div>
                    <button @click="closeModal()" class="text-white/70 hover:text-white p-1 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

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

</div>

@endsection
