<?php

namespace App\Providers;

use App\Models\CustomPage;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            if (Schema::hasTable('site_settings')) {
                $siteSetting = SiteSetting::first();
                $customNavPages = Schema::hasTable('custom_pages')
                    ? CustomPage::where('is_active', true)->where('show_in_navbar', true)->get()
                    : collect();

                View::share('siteSetting', $siteSetting);
                View::share('customNavPages', $customNavPages);
            }
        } catch (\Throwable $e) {
            // Ignore during initial migrations or console execution
        }
    }
}
