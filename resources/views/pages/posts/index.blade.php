@extends('layouts.app')

@section('title', 'Artikel & Tips Wisata — Nirwana Tour Lampung')
@section('meta_description', 'Kumpulan artikel tips liburan aman, panduan snorkeling Pahawang, persiapan study tour sekolah, dan info pariwisata Lampung.')

@section('content')

<!-- Page Header -->
<div class="bg-gradient-to-r from-[#0F2C59] to-[#0284C7] text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="text-xs font-bold text-amber-300 uppercase tracking-widest bg-white/10 px-3.5 py-1.5 rounded-full">
            Blog & Informasi
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Artikel & Tips Wisata</h1>
        <p class="text-slate-200 text-sm max-w-2xl mx-auto">
            Wawasan seputar destinasi unggulan, kiat memilih armada bus terbaik, serta panduan kegiatan study tour dan family gathering.
        </p>
    </div>
</div>

<section class="py-16 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                        <div class="relative h-52 overflow-hidden bg-slate-100">
                            <img src="{{ $post->thumbnail ?? 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=80' }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            
                            <div class="absolute bottom-3 left-3 bg-[#0F2C59]/80 backdrop-blur-md text-white text-[10px] font-bold px-2.5 py-1 rounded-md">
                                📅 {{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }}
                            </div>
                        </div>

                        <div class="p-6 flex-grow flex flex-col justify-between space-y-4">
                            <div>
                                <h3 class="text-base sm:text-lg font-bold text-[#0F2C59] group-hover:text-[#0284C7] transition line-clamp-2">
                                    <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                </h3>
                                <p class="text-xs text-slate-500 mt-2 line-clamp-3 leading-relaxed">
                                    {{ $post->excerpt }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-slate-100">
                                <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center space-x-1.5 text-xs font-bold text-[#0284C7] hover:underline">
                                    <span>Baca Artikel Lengkap</span>
                                    <span>→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        @else
            <div class="bg-white rounded-3xl p-12 text-center border border-slate-100 max-w-md mx-auto">
                <p class="text-sm font-bold text-slate-700">Belum ada artikel yang dipublikasikan.</p>
            </div>
        @endif
    </div>
</section>

@endsection
