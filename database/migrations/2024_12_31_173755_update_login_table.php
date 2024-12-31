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
            // Set member_id and admin_id to be nullable
            $table->integer('member_id')->unsigned()->nullable()->change();
            $table->integer('admin_id')->unsigned()->nullable()->change();

            // Add timestamps if they don't exist
            if (!Schema::hasColumn('login', 'created_at')) {
                $table->timestamps(); // This will add created_at and updated_at columns
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('login', function (Blueprint $table) {
            // Revert member_id and admin_id back to not nullable
            $table->integer('member_id')->unsigned()->default(0)->change();
            $table->integer('admin_id')->unsigned()->default(0)->change();

            // Drop timestamps if they exist
            if (Schema::hasColumn('login', 'created_at')) {
                $table->dropTimestamps(); // This will remove created_at and updated_at columns
            }
        });
    }
};
