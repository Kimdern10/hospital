<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Ensure no NULL values exist before making it required
        DB::table('contacts')->whereNull('address')->update(['address' => 'N/A']);

        Schema::table('contacts', function (Blueprint $table) {
            $table->string('address')->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('address')->nullable()->change();
        });
    }
};
