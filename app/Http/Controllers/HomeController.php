<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Service;
use App\Models\TourPackage;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredPackages = TourPackage::where('is_active', true)
            ->where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->take(4)
            ->get();

        $partners = Partner::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $galleries = Gallery::where('is_active', true)
            ->latest('trip_date')
            ->take(6)
            ->get();

        $faqs = Faq::where('is_active', true)
            ->orderBy('sort_order')
            ->take(5)
            ->get();

        $latestPosts = Post::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.home', compact(
            'featuredPackages',
            'services',
            'partners',
            'galleries',
            'faqs',
            'latestPosts'
        ));
    }
}
