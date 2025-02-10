<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::table('payment_allocation', function (Blueprint $table) {
            $table->enum('payment_type', ['annual_fee', 'registration_fee'])->after('payment_allocation_name')->notNullable();
        });
    }

    public function down() {
        Schema::table('payment_allocation', function (Blueprint $table) {
            $table->dropColumn('payment_type');
        });
    }
};
