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
           $table->string('transaction_id')->nullable()->change();
       });
   }

   public function down()
   {
       Schema::table('payment_receipt', function (Blueprint $table) {
           $table->string('transaction_id')->nullable(false)->change();
       });
   }
};
