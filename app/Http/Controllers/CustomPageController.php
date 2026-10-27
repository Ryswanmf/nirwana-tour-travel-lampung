<?php

namespace App\Http\Controllers;

use App\Models\CustomPage;
use Illuminate\View\View;

class CustomPageController extends Controller
{
    public function show(string $slug): View
    {
        $page = CustomPage::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.custom-page', compact('page'));
    }
}
