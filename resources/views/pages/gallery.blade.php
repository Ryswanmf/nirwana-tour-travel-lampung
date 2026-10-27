@extends('layouts.app')

@section('title', 'Galeri Dokumentasi Wisata & Kegiatan — Nirwana Tour Lampung')
@section('meta_description', 'Foto-foto asli dokumentasi perjalanan wisata, study tour, dan sewa bus pariwisata Nirwana Tour Lampung bersama berbagai instansi dan klien.')

@section('content')

<!-- Alpine.js Lightbox Controller -->
<div x-data="{
    lightboxOpen: false,
    currentIndex: 0,
    items: {{ json_encode($galleries->items()) }},
    openLightbox(index) {
        this.currentIndex = index;
        this.lightboxOpen = true;
        document.body.classList.add('overflow-hidden');
    },
    closeLightbox() {
        this.lightboxOpen = false;
        document.body.classList.remove('overflow-hidden');
    },
    nextImage() {
        this.currentIndex = (this.currentIndex + 1) % this.items.length;
    },
    prevImage() {
        this.currentIndex = (this.currentIndex - 1 + this.items.length) % this.items.length;
    }
}" 
@keydown.escape.window="closeLightbox()"
@keydown.arrow-right.window="if(lightboxOpen) nextImage()"
@keydown.arrow-left.window="if(lightboxOpen) prevImage()">

    <!-- Page Header -->
    <div class="bg-gradient-to-r from-[#0F2C59] to-[#0284C7] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
            <span class="text-xs font-bold text-amber-300 uppercase tracking-widest bg-white/10 px-3.5 py-1.5 rounded-full">
                Dokumentasi Kegiatan
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Galeri Perjalanan Bersama Klien</h1>
            <p class="text-slate-200 text-sm max-w-2xl mx-auto">
                Koleksi momen tak terlupakan dari ratusan trip yang telah kami laksanakan bersama keluarga, sekolah, universitas, dan instansi BUMN.
            </p>
        </div>
    </div>

    <!-- Category Filter Tabs -->
    @if(count($categories) > 0)
        <section class="py-6 bg-white border-b border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-wrap gap-2 justify-center">
                    <a href="{{ route('gallery.index') }}" 
                       class="px-4 py-2 rounded-xl text-xs font-bold transition {{ !$selectedCategory ? 'bg-[#0284C7] text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                        Semua Foto
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('gallery.index', ['category' => $cat]) }}" 
                           class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $selectedCategory === $cat ? 'bg-[#0284C7] text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                            {{ $cat }}
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Gallery Grid -->
    <section class="py-16 bg-[#F8FAFC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($galleries->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($galleries as $idx => $gal)
                        <div @click="openLightbox({{ $idx }})" 
                             class="group cursor-pointer bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-xl transition duration-300 flex flex-col justify-between">
                            <!-- Image Frame -->
                            <div class="relative aspect-video sm:aspect-square overflow-hidden bg-slate-100">
                                <img src="{{ $gal->image_path }}" 
                                     alt="{{ $gal->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-between p-4 text-white">
                                    <div class="flex justify-end">
                                        <span class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                        </span>
                                    </div>
                                    <div>
                                        <span class="text-[10px] font-bold text-amber-300 uppercase">
                                            {{ $gal->category ?? 'Dokumentasi' }}
                                        </span>
                                        <h4 class="text-xs font-bold line-clamp-2 mt-1">{{ $gal->title }}</h4>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Info -->
                            <div class="p-4 space-y-1">
                                <h4 class="text-xs font-bold text-[#0F2C59] group-hover:text-[#0284C7] transition line-clamp-1">
                                    {{ $gal->title }}
                                </h4>
                                <div class="flex items-center justify-between text-[11px] text-slate-500 pt-1">
                                    <span class="font-medium truncate max-w-[150px]">{{ $gal->client_name ?? 'Nirwana Tour Klien' }}</span>
                                    <span class="text-slate-400 text-[10px]">{{ $gal->trip_date ? $gal->trip_date->format('M Y') : '' }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $galleries->links() }}
                </div>
            @else
                <div class="bg-white rounded-3xl p-12 text-center border border-slate-100 max-w-md mx-auto space-y-3">
                    <p class="text-sm font-bold text-slate-700">Belum ada foto untuk kategori ini.</p>
                    <a href="{{ route('gallery.index') }}" class="text-xs font-bold text-[#0284C7] hover:underline">Tampilkan Semua Foto</a>
                </div>
            @endif
        </div>
    </section>

    <!-- FULLSCREEN LIGHTBOX MODAL (ALPINE.JS) -->
    <div x-show="lightboxOpen" 
         x-cloak
         class="fixed inset-0 z-50 overflow-hidden flex items-center justify-center bg-black/90 backdrop-blur-md"
         role="dialog"
         aria-modal="true">
        
        <!-- Close Button -->
        <button @click="closeLightbox()" 
                class="absolute top-5 right-5 z-50 text-white/70 hover:text-white p-2 rounded-full bg-white/10 hover:bg-white/20 transition focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <!-- Previous Button -->
        <button @click="prevImage()" 
                class="absolute left-4 top-1/2 -translate-y-1/2 z-50 text-white/80 hover:text-white p-3 rounded-full bg-white/10 hover:bg-white/25 transition focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
        </button>

        <!-- Next Button -->
        <button @click="nextImage()" 
                class="absolute right-4 top-1/2 -translate-y-1/2 z-50 text-white/80 hover:text-white p-3 rounded-full bg-white/10 hover:bg-white/25 transition focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </button>

        <!-- Image Content Container -->
        <div class="relative max-w-5xl max-h-[85vh] p-4 flex flex-col items-center">
            <template x-if="items.length > 0">
                <div class="space-y-4 text-center">
                    <img :src="items[currentIndex]?.image_path" 
                         :alt="items[currentIndex]?.title" 
                         class="max-h-[70vh] max-w-full rounded-2xl object-contain mx-auto shadow-2xl">
                    
                    <div class="text-white max-w-2xl mx-auto space-y-1">
                        <div class="flex items-center justify-center space-x-2 text-xs text-amber-300 font-bold">
                            <span x-text="items[currentIndex]?.category"></span>
                            <span>•</span>
                            <span x-text="items[currentIndex]?.client_name"></span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold" x-text="items[currentIndex]?.title"></h3>
                        <p class="text-xs text-slate-300 leading-relaxed" x-text="items[currentIndex]?.caption"></p>
                    </div>
                </div>
            </template>
        </div>

    </div>

</div>

@endsection
