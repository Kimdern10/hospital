<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('blog_topics', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g. Cardio Monitoring
            $table->softDeletes(); // enables trash (soft delete) functionality
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('blog_topics');
    }
};
