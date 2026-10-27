@extends('layouts.app')

@section('title', $post->title . ' — Nirwana Tour Lampung')
@section('meta_description', Str::limit(strip_tags($post->excerpt ?? $post->content), 150))

@section('content')

@php
    $waNumber = $siteSetting->whatsapp_number ?? '6282177889900';
@endphp

<!-- Breadcrumb -->
<div class="bg-white border-b border-slate-100 py-3 text-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center space-x-2 text-slate-500">
        <a href="{{ route('home') }}" class="hover:text-[#0284C7]">Beranda</a>
        <span>/</span>
        <a href="{{ route('posts.index') }}" class="hover:text-[#0284C7]">Artikel</a>
        <span>/</span>
        <span class="text-slate-800 font-bold truncate max-w-xs sm:max-w-md">{{ $post->title }}</span>
    </div>
</div>

<article class="py-12 bg-[#F8FAFC]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-6 sm:p-12 shadow-sm border border-slate-100 space-y-6">
            
            <div class="space-y-3">
                <div class="flex items-center space-x-2 text-xs text-[#0284C7] font-bold">
                    <span>Tips Wisata & Panduan</span>
                    <span>•</span>
                    <span class="text-slate-400 font-medium">{{ $post->published_at ? $post->published_at->format('d F Y') : date('d F Y') }}</span>
                </div>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-[#0F2C59] leading-tight">
                    {{ $post->title }}
                </h1>
                <div class="flex items-center space-x-3 pt-2 text-xs text-slate-500">
                    <span class="w-7 h-7 rounded-full bg-[#0284C7]/10 text-[#0284C7] flex items-center justify-center font-bold">N</span>
                    <span>Ditulis oleh Redaksi Nirwana Tour Lampung</span>
                </div>
            </div>

            @if($post->thumbnail)
                <div class="rounded-2xl overflow-hidden shadow-md max-h-[420px] bg-slate-100">
                    <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                </div>
            @endif

            <!-- Article Body Content -->
            <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed text-sm sm:text-base space-y-4 pt-4 border-t border-slate-100">
                {!! nl2br($post->content) !!}
            </div>

            <!-- WhatsApp Share & Call to Action -->
            <div class="mt-10 p-6 rounded-2xl bg-sky-50 border border-sky-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="space-y-1 text-center sm:text-left">
                    <h4 class="text-sm font-bold text-[#0F2C59]">Tertarik Mengatur Jadwal Trip Sesuai Artikel Ini?</h4>
                    <p class="text-xs text-slate-600">Konsultasikan gratis rute dan armada bus bersama tim kami sekarang.</p>
                </div>
                <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode('Halo Admin Nirwana Tour, saya baru membaca artikel: ' . $post->title . ' dan ingin konsultasi trip.') }}"
                   target="_blank"
                   class="shrink-0 px-5 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs shadow flex items-center space-x-2 transition">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    <span>Konsultasi via WhatsApp</span>
                </a>
            </div>

        </div>

        <!-- Recent Articles -->
        @if(isset($recentPosts) && $recentPosts->count() > 0)
            <div class="mt-12">
                <h3 class="text-lg font-bold text-[#0F2C59] mb-6">Artikel Lainnya</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($recentPosts as $rec)
                        <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm space-y-2">
                            <span class="text-[10px] text-slate-400 font-bold block">{{ $rec->published_at ? $rec->published_at->format('d M Y') : '' }}</span>
                            <h4 class="text-xs font-bold text-[#0F2C59] hover:text-[#0284C7] line-clamp-2">
                                <a href="{{ route('posts.show', $rec->slug) }}">{{ $rec->title }}</a>
                            </h4>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</article>

@endsection
