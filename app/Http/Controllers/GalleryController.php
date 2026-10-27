<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(Request $request): View
    {
        $selectedCategory = $request->query('category');

        $categories = Gallery::where('is_active', true)
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category')
            ->all();

        $query = Gallery::where('is_active', true);

        if ($selectedCategory && in_array($selectedCategory, $categories)) {
            $query->where('category', $selectedCategory);
        }

        $galleries = $query->latest('trip_date')->paginate(12)->withQueryString();

        return view('pages.gallery', compact('galleries', 'categories', 'selectedCategory'));
    }
}
