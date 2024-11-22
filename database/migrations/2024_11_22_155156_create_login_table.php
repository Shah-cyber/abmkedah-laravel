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
        Schema::create('login', function (Blueprint $table) {
            $table->increments('login_id');
            $table->integer('member_id')->unsigned()->default(0);
            $table->integer('admin_id')->unsigned()->default(0);
            $table->char('acc_status', 20)->nullable();
            $table->string('username', 25)->nullable();
            $table->string('password', 25)->nullable();
            $table->string('email', 50)->nullable();
            $table->foreign('member_id')->references('member_id')->on('member');
            $table->foreign('admin_id')->references('admin_id')->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login');
    }
};
