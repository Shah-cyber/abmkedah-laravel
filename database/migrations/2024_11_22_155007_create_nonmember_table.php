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
        Schema::create('nonmember', function (Blueprint $table) {
            $table->increments('nonmember_id');
            $table->string('name', 50)->default('0');
            $table->string('ic_number', 20)->default('0');
            $table->string('email', 50)->default('0');
            $table->string('phone_number', 15)->default('0');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nonmember');
    }
};
