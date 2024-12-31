<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('login', function (Blueprint $table) {
            $table->timestamps(); // This adds `created_at` and `updated_at` columns
        });
    }

    public function down()
    {
        Schema::table('login', function (Blueprint $table) {
            $table->dropTimestamps(); // This removes `created_at` and `updated_at` columns
        });
    }
};
