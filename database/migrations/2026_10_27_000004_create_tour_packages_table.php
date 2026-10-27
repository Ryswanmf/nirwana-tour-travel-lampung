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
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('lampung'); // lampung, nusantara, edukasi, armada
            $table->string('duration')->default('1 Hari');
            $table->unsignedBigInteger('price')->default(0);
            $table->string('price_unit')->default('/ Orang');
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->json('includes')->nullable();
            $table->json('excludes')->nullable();
            $table->json('itineraries')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_packages');
    }
};
