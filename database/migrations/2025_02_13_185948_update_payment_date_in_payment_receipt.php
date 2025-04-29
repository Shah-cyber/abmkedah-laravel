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
        Schema::table('payment_receipt', function (Blueprint $table) {
            $table->timestamp('payment_date')->nullable()->change(); // Make it nullable
        });
    }

    public function down()
    {
        Schema::table('payment_receipt', function (Blueprint $table) {
            $table->timestamp('payment_date')->nullable(false)->change(); // Revert if needed
        });
    }
};
