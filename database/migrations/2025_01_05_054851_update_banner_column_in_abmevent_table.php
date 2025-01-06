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
        Schema::table('abmevent', function (Blueprint $table) {
            // Change the banner column from BLOB to VARCHAR(255)
            $table->string('banner', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abmevent', function (Blueprint $table) {
            // Revert the banner column back to BLOB
            $table->binary('banner')->nullable()->change();
        });
    }
};
