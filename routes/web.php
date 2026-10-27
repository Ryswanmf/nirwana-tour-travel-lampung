<?php

use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TourPackageController;
use Illuminate\Support\Facades\Route;

// Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profil, Layanan & Kontak
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/layanan', [PageController::class, 'services'])->name('services');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');

// Katalog & Detail Paket Wisata
Route::get('/paket-wisata', [TourPackageController::class, 'index'])->name('packages.index');
Route::get('/paket-wisata/{slug}', [TourPackageController::class, 'show'])->name('packages.show');

// Galeri Dokumentasi (Lightbox)
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');

// Artikel & Tips Wisata
Route::get('/artikel', [PostController::class, 'index'])->name('posts.index');
Route::get('/artikel/{slug}', [PostController::class, 'show'])->name('posts.show');

// Halaman Kustom Dinamis
Route::get('/halaman/{slug}', [CustomPageController::class, 'show'])->name('custom-page.show');
