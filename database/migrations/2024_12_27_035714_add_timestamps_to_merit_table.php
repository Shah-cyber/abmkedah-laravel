<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('merit', function (Blueprint $table) {
            $table->timestamps(); // This adds both created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::table('merit', function (Blueprint $table) {
            $table->dropTimestamps(); // This will drop both columns if the migration is rolled back
        });
    }
};
