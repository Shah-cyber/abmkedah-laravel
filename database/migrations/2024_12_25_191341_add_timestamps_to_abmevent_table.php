<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('abmevent', function (Blueprint $table) {
            // Add created_at and updated_at columns
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('abmevent', function (Blueprint $table) {
            // Drop created_at and updated_at columns
            $table->dropTimestamps();
        });
    }
};
