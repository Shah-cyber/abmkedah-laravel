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
        Schema::create('joinevent', function (Blueprint $table) {
            $table->increments('join_event_id');
            $table->integer('event_id')->unsigned()->default(0);
            $table->integer('member_id')->unsigned()->default(0);
            $table->integer('nonmember_id')->unsigned()->default(0);
            $table->foreign('event_id')->references('event_id')->on('abmevent');
            $table->foreign('member_id')->references('member_id')->on('member');
            $table->foreign('nonmember_id')->references('nonmember_id')->on('nonmember');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joinevent');
    }
};
