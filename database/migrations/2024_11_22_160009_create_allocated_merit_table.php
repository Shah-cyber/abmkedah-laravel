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
        Schema::create('allocated_merit', function (Blueprint $table) {
            $table->increments('allocated_merit_id');
            $table->integer('admin_id')->unsigned()->default(0);
            $table->integer('member_id')->unsigned()->default(0);
            $table->integer('event_id')->unsigned()->default(0);
            $table->integer('merit_id')->unsigned()->default(0);
            $table->double('merit_point', 8, 2)->default(0);
            $table->date('allocation_date');
            $table->foreign('admin_id')->references('admin_id')->on('admin');
            $table->foreign('member_id')->references('member_id')->on('member');
            $table->foreign('event_id')->references('event_id')->on('abmevent');
            $table->foreign('merit_id')->references('merit_id')->on('merit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allocated_merit');
    }
};
