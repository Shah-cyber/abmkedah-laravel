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
        Schema::create('merit', function (Blueprint $table) {
            $table->increments('merit_id');
            $table->integer('event_id')->unsigned()->default(0);
            $table->double('merit_point', 8, 2)->default(0);
            $table->integer('admin_id')->unsigned();
            $table->date('allocation_date');
            $table->foreign('event_id')->references('event_id')->on('abmevent');
            $table->foreign('admin_id')->references('admin_id')->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merit');
    }
};
