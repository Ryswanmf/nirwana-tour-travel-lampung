<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->default('Nirwana Tour Lampung');
            $table->string('tagline')->nullable()->default('Jelajahi Dunia, Ciptakan Cerita Tak Terlupakan');
            $table->string('owner_name')->default('Kiki M Alfin');
            $table->string('owner_title')->default('Pimpinan & Founder');
            $table->string('owner_photo')->nullable();
            $table->text('owner_greeting')->nullable();
            $table->string('whatsapp_number')->default('6281234567890');
            $table->string('email')->nullable()->default('info@nirwanatourlampung.com');
            $table->text('address')->nullable();
            $table->text('google_maps_embed')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('years_experience')->default('8+');
            $table->string('total_trips')->default('1.500+');
            $table->string('satisfaction_rate')->default('99%');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
