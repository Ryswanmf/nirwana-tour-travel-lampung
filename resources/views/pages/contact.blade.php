@extends('layouts.app')

@section('title', 'Hubungi Kami & Tanya Jawab (FAQ) — Nirwana Tour Lampung')
@section('meta_description', 'Kontak resmi, nomor WhatsApp, alamat kantor pusat, peta Google Maps, serta jawaban pertanyaan umum pemesanan paket wisata Nirwana Tour Lampung.')

@section('content')

@php
    $waNumber = $siteSetting->whatsapp_number ?? '6282177889900';
    $address = $siteSetting->address ?? 'Jl. ZA. Pagar Alam No. 88, Gedong Meneng, Rajabasa, Kota Bandar Lampung';
    $email = $siteSetting->email ?? 'halo@nirwanatourlampung.com';
@endphp

<!-- Page Header -->
<div class="bg-gradient-to-r from-[#0F2C59] to-[#0284C7] text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="text-xs font-bold text-amber-300 uppercase tracking-widest bg-white/10 px-3.5 py-1.5 rounded-full">
            Layanan Pelanggan
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Hubungi Kami & Tanya Jawab</h1>
        <p class="text-slate-200 text-sm max-w-2xl mx-auto">
            Tim konsultan Nirwana Tour siap membantu merancang perjalanan dan menyediakan informasi armada bus kapan pun Anda butuhkan.
        </p>
    </div>
</div>

<section class="py-16 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- Contact Information & Interactive WhatsApp Message Form -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Left: Office Info & Direct Contacts -->
            <div class="lg:col-span-5 space-y-6">
                <div>
                    <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider">Informasi Kantor</span>
                    <h2 class="text-2xl font-extrabold text-[#0F2C59] mt-1">Siap Melayani 24 Jam</h2>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Kunjungi kantor kami atau hubungi kami melalui saluran komunikasi resmi di bawah ini:
                    </p>
                </div>

                <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm space-y-5">
                    <div class="flex items-start space-x-3.5">
                        <div class="w-10 h-10 rounded-xl bg-sky-50 text-[#0284C7] flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold">Alamat Kantor Pusat:</div>
                            <div class="text-xs text-slate-800 font-bold mt-0.5 leading-relaxed">
                                {{ $address }}
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3.5">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        </div>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold">WhatsApp Layanan Cepat:</div>
                            <div class="text-xs text-slate-800 font-bold mt-0.5">
                                +{{ $waNumber }} (Konsultasi & Booking)
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3.5">
                        <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold">Email Korespondensi:</div>
                            <div class="text-xs text-slate-800 font-bold mt-0.5">
                                {{ $email }}
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3.5">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold">Jam Operasional:</div>
                            <div class="text-xs text-slate-800 font-bold mt-0.5">
                                Senin – Minggu: 08.00 – 21.00 WIB (Online 24 Jam)
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-[#0F2C59] to-[#0284C7] rounded-3xl p-6 text-white space-y-3">
                    <h4 class="font-bold text-sm">Konsultasi Rombongan Besar?</h4>
                    <p class="text-xs text-slate-200 leading-relaxed">
                        Untuk penawaran harga khusus instansi, sekolah, proposal kerja sama dinas, atau tender pengadaan bus pariwisata, silakan hubungi langsung Pimpinan kami.
                    </p>
                </div>
            </div>

            <!-- Right: Interactive Form to WhatsApp -->
            <div class="lg:col-span-7" x-data="{
                senderName: '',
                instansi: '',
                paketTujuan: 'Paket Wisata Bahari Pahawang',
                jumlahPeserta: '',
                catatan: '',
                sendToWa() {
                    if(!this.senderName.trim()) {
                        alert('Silakan masukkan nama Anda.');
                        return;
                    }
                    let text = `Halo Admin Nirwana Tour Lampung,\n\nNama: ${this.senderName}\nInstansi/Rombongan: ${this.instansi || '-'}\nPaket / Layanan yang Diminati: ${this.paketTujuan}\nEstimasi Jumlah Peserta: ${this.jumlahPeserta || '-'} orang\nCatatan Tambahan: ${this.catatan || '-'}\n\nSaya ingin berkonsultasi mengenai ketersediaan jadwal dan penawaran harganya. Terima kasih!`;
                    let url = 'https://wa.me/{{ $waNumber }}?text=' + encodeURIComponent(text);
                    window.open(url, '_blank');
                }
            }">
                <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm space-y-6">
                    <div>
                        <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider">Kirim Pesan Instan</span>
                        <h2 class="text-2xl font-extrabold text-[#0F2C59] mt-1">Formulir Permintaan Penawaran</h2>
                        <p class="text-xs text-slate-500 mt-1">
                            Isi formulir singkat ini untuk langsung terhubung ke WhatsApp Admin dengan draf pesan otomatis yang tersusun rapi.
                        </p>
                    </div>

                    <form @submit.prevent="sendToWa()" class="space-y-4 text-xs">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-bold text-slate-700 mb-1.5">Nama Lengkap <span class="text-rose-500">*</span></label>
                                <input type="text" x-model="senderName" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#0284C7] text-xs">
                            </div>
                            <div>
                                <label class="block font-bold text-slate-700 mb-1.5">Nama Instansi / Sekolah / Keluarga</label>
                                <input type="text" x-model="instansi" placeholder="Contoh: SMAN 2 Bandar Lampung / PT PLN" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#0284C7] text-xs">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-bold text-slate-700 mb-1.5">Layanan / Paket yang Diminati</label>
                                <select x-model="paketTujuan" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#0284C7] text-xs">
                                    <option value="Paket Wisata Pahawang & Kelagian">Paket Snorkeling Pahawang & Kelagian</option>
                                    <option value="Paket Teluk Kiluan Dolphin">Safari Dolphin Teluk Kiluan</option>
                                    <option value="Paket Krui & Danau Ranau">Wisata Pantai Krui & Danau Ranau</option>
                                    <option value="Paket Yogyakarta & Sunrise Bromo">Paket Yogyakarta & Bromo Sunrise</option>
                                    <option value="Study Tour Edukatif Sekolah">Study Tour Edukatif Sekolah / Kampus</option>
                                    <option value="Kunjungan Industri BUMN / Perusahaan">Kunjungan Industri / Studi Banding</option>
                                    <option value="Sewa Big Bus Pariwisata 50 Seat">Sewa Big Bus SHD 50 Seats</option>
                                    <option value="Sewa Medium Bus 31-35 Seat">Sewa Medium Bus 31–35 Seats</option>
                                    <option value="Sewa Toyota HiAce Premio">Sewa Toyota HiAce Premio 14 Seats</option>
                                    <option value="Paket Custom / Rute Khusus">Paket Custom Rute Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label class="block font-bold text-slate-700 mb-1.5">Estimasi Jumlah Peserta (Orang)</label>
                                <input type="number" x-model="jumlahPeserta" placeholder="Contoh: 45" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#0284C7] text-xs">
                            </div>
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1.5">Rencana Tanggal / Catatan Khusus</label>
                            <textarea x-model="catatan" rows="3" placeholder="Tuliskan tanggal rencana berangkat atau fasilitas khusus yang diharapkan..." class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#0284C7] text-xs"></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full py-3.5 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs shadow-md shadow-emerald-500/20 flex items-center justify-center space-x-2 transition">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                                <span>Kirim Permintaan Langsung ke WhatsApp Admin</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <!-- Google Maps Embed Section -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-base font-bold text-[#0F2C59]">Lokasi Kantor Nirwana Tour Lampung</h3>
                    <p class="text-xs text-slate-500">Kunjungi kami di Bandar Lampung untuk konsultasi langsung.</p>
                </div>
                <a href="https://maps.google.com" target="_blank" class="text-xs font-bold text-[#0284C7] hover:underline">
                    Buka di Aplikasi Google Maps →
                </a>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-inner h-80 sm:h-96 w-full">
                {!! $siteSetting->google_maps_embed ?? '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127117.84462106727!2d105.19566675!3d-5.3971396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40da423a2f7c03%3A0x6b7724a87c1c1f28!2sBandar%20Lampung!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>' !!}
            </div>
        </div>

        <!-- Full FAQ Section -->
        <div class="max-w-4xl mx-auto" x-data="{ activeFaq: null }">
            <div class="text-center mb-10">
                <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider bg-sky-50 px-3 py-1 rounded-full">
                    FAQ Lengkap
                </span>
                <h2 class="text-2xl font-extrabold text-[#0F2C59] mt-2">
                    Pertanyaan yang Sering Diajukan
                </h2>
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
        </div>

    </div>
</section>

@endsection
