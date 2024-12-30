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
        Schema::table('member', function (Blueprint $table) {
            $table->string('name', 200)->nullable()->change();
            $table->string('ic_number', 15)->nullable()->change();
            $table->char('gender', 20)->nullable()->change();
            $table->char('race', 20)->nullable()->change();
            $table->char('religion', 20)->nullable()->change();
            $table->date('birthdate')->nullable()->change();
            $table->string('birthplace', 100)->nullable()->change();
            $table->string('address', 100)->nullable()->change();
            $table->string('phone_number', 15)->nullable()->change();
            $table->char('member_status', 20)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member', function (Blueprint $table) {
            $table->string('name', 200)->nullable(false)->change();
            $table->string('ic_number', 15)->nullable(false)->change();
            $table->char('gender', 20)->nullable(false)->change();
            $table->char('race', 20)->nullable(false)->change();
            $table->char('religion', 20)->nullable(false)->change();
            $table->date('birthdate')->nullable(false)->change();
            $table->string('birthplace', 100)->nullable(false)->change();
            $table->string('address', 100)->nullable(false)->change();
            $table->string('phone_number', 15)->nullable(false)->change();
            $table->char('member_status', 20)->nullable(false)->change();
        });
    }
};
