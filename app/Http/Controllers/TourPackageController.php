<?php

namespace App\Http\Controllers;

use App\Models\TourPackage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TourPackageController extends Controller
{
    public function index(Request $request): View
    {
        $category = $request->query('category');
        $search = $request->query('q');

        $query = TourPackage::where('is_active', true);

        if ($category && in_array($category, ['lampung', 'nusantara', 'edukasi', 'armada'])) {
            $query->where('category', $category);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $packages = $query->latest()->paginate(9)->withQueryString();

        $categories = [
            'semua' => 'Semua Destinasi',
            'lampung' => 'Wisata Bahari & Alam Lampung',
            'nusantara' => 'Wisata Nusantara (Lintas Jawa-Bali-Bajo)',
            'edukasi' => 'Study Tour & Kunjungan Industri',
            'armada' => 'Sewa Bus & HiAce Pariwisata',
        ];

        return view('pages.packages.index', compact('packages', 'category', 'search', 'categories'));
    }

    public function show(string $slug): View
    {
        $package = TourPackage::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedPackages = TourPackage::where('is_active', true)
            ->where('id', '!=', $package->id)
            ->where('category', $package->category)
            ->latest()
            ->take(3)
            ->get();

        if ($relatedPackages->isEmpty()) {
            $relatedPackages = TourPackage::where('is_active', true)
                ->where('id', '!=', $package->id)
                ->latest()
                ->take(3)
                ->get();
        }

        return view('pages.packages.show', compact('package', 'relatedPackages'));
    }
}
