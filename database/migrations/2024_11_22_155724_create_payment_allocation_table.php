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
        Schema::create('payment_allocation', function (Blueprint $table) {
            $table->increments('payment_allocation_id');
            $table->string('payment_allocation_name', 50)->default('0');
            $table->double('amount', 8, 2)->default(0);
            $table->date('allocation_date');
            $table->integer('admin_id')->unsigned();
            $table->integer('session');
            $table->foreign('admin_id')->references('admin_id')->on('admin')->onDelete('cascade')->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_allocation');
    }
};
