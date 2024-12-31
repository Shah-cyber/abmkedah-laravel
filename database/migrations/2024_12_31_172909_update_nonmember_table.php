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
        Schema::table('nonmember', function (Blueprint $table) {
            // Check and modify existing columns
            // Change name column to have default value of '0'
            $table->string('name', 50)->default('0')->change();
            $table->string('ic_number', 20)->default('0')->change();
            $table->string('email', 50)->default('0')->change();
            $table->string('phone_number', 15)->default('0')->change();

            // Add created_at and updated_at columns if they don't exist
            if (!Schema::hasColumn('nonmember', 'created_at')) {
                $table->timestamps(); // Adds created_at and updated_at
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nonmember', function (Blueprint $table) {
            // Dropping created_at and updated_at columns if they exist
            if (Schema::hasColumn('nonmember', 'created_at')) {
                $table->dropTimestamps();
            }

            // Change columns back to their previous state if needed
            $table->string('name', 50)->default('0')->change();
            $table->string('ic_number', 20)->default('0')->change();
            $table->string('email', 50)->default('0')->change();
            $table->string('phone_number', 15)->default('0')->change();
        });
    }
};
