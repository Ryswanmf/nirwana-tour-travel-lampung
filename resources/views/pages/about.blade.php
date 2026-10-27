@extends('layouts.app')

@section('title', 'Tentang Kami — Nirwana Tour Lampung')
@section('meta_description', 'Profil lengkap, visi & misi, sambutan pimpinan Bapak Kiki M Alfin, serta komitmen legalitas resmi Nirwana Tour Lampung.')

@section('content')

@php
    $waNumber = $siteSetting->whatsapp_number ?? '6282177889900';
    $ownerName = $siteSetting->owner_name ?? 'Kiki M Alfin';
    $ownerTitle = $siteSetting->owner_title ?? 'Pimpinan & Founder';
    $ownerGreeting = $siteSetting->owner_greeting ?? 'Perjalanan bukan sekadar berpindah dari satu titik ke titik lain, melainkan sebuah seni merajut kebersamaan, menyelami keindahan nusantara, dan memetik inspirasi hidup.';
@endphp

<!-- Page Header -->
<div class="bg-gradient-to-r from-[#0F2C59] to-[#0284C7] text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="text-xs font-bold text-amber-300 uppercase tracking-widest bg-white/10 px-3.5 py-1.5 rounded-full">
            Profil Perusahaan
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Tentang Nirwana Tour Lampung</h1>
        <p class="text-slate-200 text-sm max-w-2xl mx-auto">
            Mengenal lebih dekat dedikasi dan komitmen kami dalam menghadirkan pengalaman berwisata serta transportasi pariwisata terbaik.
        </p>
    </div>
</div>

<!-- Sambutan Pimpinan & Profil -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Pimpinan Card -->
            <div class="lg:col-span-5 text-center">
                <div class="relative inline-block mx-auto">
                    <div class="w-48 h-48 sm:w-56 sm:h-56 rounded-3xl bg-gradient-to-tr from-[#0F2C59] to-[#0284C7] p-1.5 shadow-2xl">
                        <div class="w-full h-full rounded-3xl bg-slate-100 flex items-center justify-center text-slate-400 overflow-hidden">
                            <svg class="w-28 h-28 text-slate-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                    </div>
                    <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-amber-500 text-slate-900 font-extrabold text-xs px-4 py-1.5 rounded-full shadow-md whitespace-nowrap">
                        Pimpinan & Founder
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-[#0F2C59] mt-6">{{ $ownerName }}</h3>
                <p class="text-xs font-semibold text-[#0284C7] uppercase tracking-wider">{{ $ownerTitle }}</p>
                <p class="text-xs text-slate-500 mt-2">Nirwana Tour Lampung</p>
            </div>

            <!-- Sambutan & Kisah -->
            <div class="lg:col-span-7 space-y-6">
                <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider bg-sky-50 px-3 py-1 rounded-full">
                    Sambutan Hangat Pimpinan
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0F2C59]">
                    “Merajut Cerita Bahagia di Setiap Sudut Nusantara”
                </h2>
                
                <div class="space-y-4 text-slate-600 text-sm leading-relaxed">
                    <p>
                        {{ $ownerGreeting }}
                    </p>
                    <p>
                        Berdiri di Kota Bandar Lampung, Nirwana Tour berakar dari semangat untuk memperkenalkan pesona alam dan kearifan lokal Lampung kepada masyarakat nusantara, sekaligus menjembatani institusi sekolah, kampus, dan instansi daerah untuk menjelajahi keindahan Indonesia.
                    </p>
                    <p>
                        Kami memprioritaskan rasa aman, kenyamanan armada, kejelasan jadwal perjalanan, serta sentuhan pelayanan kekeluargaan yang ramah. Setiap detail perjalanan Anda kami persiapkan dengan cermat demi menghadirkan senyum dan cerita tak terlupakan.
                    </p>
                </div>

                <div class="pt-2 flex items-center space-x-6 text-xs font-bold text-slate-700">
                    <div class="flex items-center space-x-2">
                        <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                        <span>Berizin Resmi Kemenkumham</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="w-3 h-3 rounded-full bg-[#0284C7]"></span>
                        <span>Asuransi Rekanan Jasa Raharja</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Visi & Misi -->
<section class="py-16 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Visi -->
            <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-[#0284C7]/10 text-[#0284C7] flex items-center justify-center font-bold text-xl">
                    🎯
                </div>
                <h3 class="text-xl font-bold text-[#0F2C59]">Visi Kami</h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Menjadi biro perjalanan wisata dan penyedia layanan transportasi pariwisata terkemuka di Sumatera bagian Selatan yang dikenal atas standar profesionalisme, integritas, keselamatan tinggi, serta inovasi pelayanan berorientasi kepuasan pelanggan.
                </p>
            </div>

            <!-- Misi -->
            <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-500 flex items-center justify-center font-bold text-xl">
                    🚀
                </div>
                <h3 class="text-xl font-bold text-[#0F2C59]">Misi Kami</h3>
                <ul class="text-sm text-slate-600 space-y-2.5">
                    <li class="flex items-start space-x-2">
                        <span class="text-amber-500 font-bold shrink-0">1.</span>
                        <span>Menyajikan paket wisata edukatif, rekreatif, dan dinas yang terstruktur rapi dengan harga kompetitif.</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <span class="text-amber-500 font-bold shrink-0">2.</span>
                        <span>Menyediakan armada bus dan minibus pariwisata berstandar uji kelayakan berkala dan fasilitas kabin modern.</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <span class="text-amber-500 font-bold shrink-0">3.</span>
                        <span>Membangun sumber daya manusia (Tour Leader & Kru Pengemudi) yang ramah, beretika, dan berkompetensi tinggi.</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <span class="text-amber-500 font-bold shrink-0">4.</span>
                        <span>Menjalin kemitraan jangka panjang saling menguntungkan bersama institusi pendidikan dan korporasi BUMN.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Keunggulan Nirwana Tour -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider bg-sky-50 px-3 py-1 rounded-full">
                Kenapa Memilih Kami
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0F2C59] mt-3">
                Keunggulan Layanan Nirwana Tour
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-[#F8FAFC] p-6 rounded-2xl border border-slate-100 space-y-3 text-center">
                <div class="text-3xl mb-2">📜</div>
                <h4 class="font-bold text-base text-[#0F2C59]">Legalitas Berizin</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Berizin resmi dan terdaftar sehingga seluruh administrasi SPJ kedinasan dijamin aman & rapi.</p>
            </div>
            <div class="bg-[#F8FAFC] p-6 rounded-2xl border border-slate-100 space-y-3 text-center">
                <div class="text-3xl mb-2">🚌</div>
                <h4 class="font-bold text-base text-[#0F2C59]">Armada Prima & Dingin</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Unit armada bus SHD/HDD dan HiAce terbaru, bersih, ber-AC sejuk, dan perawatan mesin rutin.</p>
            </div>
            <div class="bg-[#F8FAFC] p-6 rounded-2xl border border-slate-100 space-y-3 text-center">
                <div class="text-3xl mb-2">🧭</div>
                <h4 class="font-bold text-base text-[#0F2C59]">Rundown Fleksibel</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Jadwal perjalanan dapat disesuaikan secara khusus sesuai preferensi dan anggaran rombongan Anda.</p>
            </div>
            <div class="bg-[#F8FAFC] p-6 rounded-2xl border border-slate-100 space-y-3 text-center">
                <div class="text-3xl mb-2">🤝</div>
                <h4 class="font-bold text-base text-[#0F2C59]">Kru Berpengalaman</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Tour leader bersertifikat dan sopir ramah yang memahami seluk-beluk rute pariwisata nusantara.</p>
            </div>
        </div>
    </div>
</section>

<!-- Mitra Rekanan -->
<section class="py-16 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <h3 class="text-xl sm:text-2xl font-bold text-[#0F2C59]">Mitra & Klien Rekanan Kami</h3>
            <p class="text-xs text-slate-500 mt-2">Daftar BUMN, dinas pemerintahan, universitas, dan sekolah yang telah mempercayakan perjalanan bersama kami.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
            @foreach($partners as $partner)
                <div class="bg-white p-4 rounded-xl border border-slate-200/60 shadow-sm text-center flex flex-col justify-center items-center h-24">
                    <span class="text-xs font-bold text-[#0F2C59] line-clamp-2">{{ $partner->name }}</span>
                    <span class="text-[10px] text-[#0284C7] font-semibold mt-1">{{ $partner->category }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
