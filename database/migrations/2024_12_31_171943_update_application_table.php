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
        Schema::table('application', function (Blueprint $table) {
            // Change prove_letter from binary to varchar
            $table->string('prove_letter')->nullable()->change();

            // Adding the admin_id column if it doesn't exist
            if (!Schema::hasColumn('application', 'admin_id')) {
                $table->unsignedInteger('admin_id')->nullable()->after('date_application');
            }

            // Adding foreign key constraint
            $table->foreign('admin_id')->references('admin_id')->on('admin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('application', function (Blueprint $table) {
            // Dropping foreign key constraint
            if (Schema::hasColumn('application', 'admin_id')) {
                $table->dropForeign(['admin_id']);
                $table->dropColumn('admin_id');
            }

            // Change prove_letter back to binary if it exists
            if (Schema::hasColumn('application', 'prove_letter')) {
                $table->binary('prove_letter')->nullable()->change(); // Change back to binary
            }
        });
    }
};
