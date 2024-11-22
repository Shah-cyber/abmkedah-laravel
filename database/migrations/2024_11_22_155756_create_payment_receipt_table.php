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
        Schema::create('payment_receipt', function (Blueprint $table) {
            $table->increments('payment_receipt_id');
            $table->string('payment_name', 50)->default('0');
            $table->double('payment_fee', 8, 2)->default(0);
            $table->time('payment_time')->default('00:00:00');
            $table->date('payment_date');
            $table->integer('member_id')->unsigned()->nullable();
            $table->integer('nonmember_id')->unsigned()->nullable();
            $table->char('payment_status', 20);
            $table->string('transaction_id', 50);
            $table->integer('event_id')->unsigned()->default(0);
            $table->integer('payment_allocation_id')->unsigned()->default(0);
            $table->foreign('member_id')->references('member_id')->on('member');
            $table->foreign('nonmember_id')->references('nonmember_id')->on('nonmember');
            $table->foreign('event_id')->references('event_id')->on('abmevent');
            $table->foreign('payment_allocation_id')->references('payment_allocation_id')->on('payment_allocation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_receipt');
    }
};
