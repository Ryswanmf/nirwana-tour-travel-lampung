@extends('layouts.app')

@section('title', $page->title . ' — Nirwana Tour Lampung')
@section('meta_description', $page->meta_description ?? Str::limit(strip_tags($page->content), 150))

@section('content')

@php
    $waNumber = $siteSetting->whatsapp_number ?? '6282177889900';
@endphp

<!-- Page Header -->
<div class="bg-gradient-to-r from-[#0F2C59] to-[#0284C7] text-white py-14">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-2">
        <span class="text-xs font-bold text-amber-300 uppercase tracking-widest bg-white/10 px-3 py-1 rounded-full">
            Informasi Tambahan
        </span>
        <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">{{ $page->title }}</h1>
    </div>
</div>

<div class="py-12 bg-[#F8FAFC]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-6 sm:p-12 shadow-sm border border-slate-100">
            <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed text-sm sm:text-base space-y-4">
                {!! $page->content !!}
            </div>

            <div class="mt-10 pt-6 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                <span>Pembaruan Terakhir: {{ $page->updated_at ? $page->updated_at->format('d F Y') : date('d F Y') }}</span>
                <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="font-bold text-[#0284C7] hover:underline">
                    Hubungi Admin jika ada pertanyaan →
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
