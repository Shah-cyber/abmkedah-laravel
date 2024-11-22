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
        Schema::create('abmevent', function (Blueprint $table) {
            $table->increments('event_id');
            $table->string('event_name', 25)->default('0');
            $table->binary('banner')->nullable();
            $table->string('event_description', 255)->default('');
            $table->integer('total_participation')->nullable();
            $table->char('event_category', 20)->nullable();
            $table->char('event_status', 20)->nullable();
            $table->date('event_date')->nullable();
            $table->integer('event_session')->nullable();
            $table->time('event_start_time')->nullable();
            $table->time('event_end_time')->nullable();
            $table->string('event_location', 50)->nullable();
            $table->double('event_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abmevent');
    }
};
