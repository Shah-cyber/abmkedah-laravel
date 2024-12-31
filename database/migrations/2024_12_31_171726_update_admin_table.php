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
        Schema::table('admin', function (Blueprint $table) {
            // Adding the phone_number column if it doesn't exist
            if (!Schema::hasColumn('admin', 'phone_number')) {
                $table->string('phone_number', 15)->nullable()->after('role');
            }

            // You can add more columns or modify existing ones here if needed
            // Example: $table->string('new_column')->nullable()->after('existing_column');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin', function (Blueprint $table) {
            // Dropping the phone_number column if it exists
            if (Schema::hasColumn('admin', 'phone_number')) {
                $table->dropColumn('phone_number');
            }

            // Reverse any other changes made in the up method
        });
    }
};
