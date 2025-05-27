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
        Schema::table('login', function (Blueprint $table) {
            // Add remember_token column for "remember me" functionality
            if (!Schema::hasColumn('login', 'remember_token')) {
                $table->rememberToken();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('login', function (Blueprint $table) {
            // Drop remember_token if it exists
            if (Schema::hasColumn('login', 'remember_token')) {
                $table->dropColumn('remember_token');
            }
        });
    }
};
