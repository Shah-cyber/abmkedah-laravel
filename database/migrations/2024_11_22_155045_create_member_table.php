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
        Schema::create('member', function (Blueprint $table) {
            $table->increments('member_id');
            $table->integer('application_id')->unsigned()->default(0);
            $table->double('total_merit', 8, 2)->default(0);
            $table->boolean('registration_status')->default(0);
            $table->integer('intake_session')->nullable();
            $table->string('name', 200); //null
            $table->string('ic_number', 15); //null
            $table->integer('age')->default(0); 
            $table->char('gender', 20)->default('0'); //null
            $table->char('race', 20)->default('0'); //null
            $table->char('religion', 20)->default('0'); //null
            $table->date('birthdate'); //null
            $table->string('birthplace', 100)->default(''); //null
            $table->string('address', 100)->default(''); //null
            $table->string('phone_number', 15)->default(''); //null
            $table->char('member_status', 20)->default(''); //null
            $table->integer('login_id')->unsigned();
            $table->foreign('application_id')->references('application_id')->on('application');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
