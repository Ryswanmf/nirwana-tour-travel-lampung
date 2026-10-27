<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Partner;
use App\Models\Service;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        $partners = Partner::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('pages.about', compact('partners'));
    }

    public function services(): View
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('pages.services', compact('services'));
    }

    public function contact(): View
    {
        $faqs = Faq::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('pages.contact', compact('faqs'));
    }
}
