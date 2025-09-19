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
      Schema::create('about_us', function (Blueprint $table) {
    $table->id();
    $table->string('title'); // e.g. "Oreo Hospital"
    $table->longText('content'); // main about us text
    $table->text('mission')->nullable();
    $table->text('vision')->nullable();
    $table->text('idea')->nullable();
    $table->json('opening_hours')->nullable(); // ✅ store hours in JSON
    $table->softDeletes();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
