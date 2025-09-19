<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')->constrained('blog_topics')->onDelete('cascade');
            $table->string('title'); // post title
            $table->text('content'); // main blog content
            $table->string('image')->nullable(); // optional image
            $table->softDeletes(); // enables trash functionality
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('blog_posts');
    }
};
