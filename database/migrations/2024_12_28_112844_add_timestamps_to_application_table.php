<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('application', function (Blueprint $table) {
            $table->timestamps(); // This adds `created_at` and `updated_at` columns
        });
    }

    public function down()
    {
        Schema::table('application', function (Blueprint $table) {
            $table->dropTimestamps(); // This removes `created_at` and `updated_at` columns
        });
    }
};
