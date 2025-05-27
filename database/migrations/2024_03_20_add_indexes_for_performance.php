<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Add indexes to login table
        Schema::table('login', function (Blueprint $table) {
            $table->index('acc_status');
            $table->index(['login_id', 'email']);
        });

        // Add indexes to member table
        Schema::table('member', function (Blueprint $table) {
            $table->index(['member_id', 'name', 'member_status']);
            $table->index('login_id');
        });

        // Add indexes to application table
        Schema::table('application', function (Blueprint $table) {
            $table->index(['application_id', 'admin_id']);
        });
    }

    public function down()
    {
        // Remove indexes from login table
        Schema::table('login', function (Blueprint $table) {
            $table->dropIndex(['acc_status']);
            $table->dropIndex(['login_id', 'email']);
        });

        // Remove indexes from member table
        Schema::table('member', function (Blueprint $table) {
            $table->dropIndex(['member_id', 'name', 'member_status']);
            $table->dropIndex(['login_id']);
        });

        // Remove indexes from application table
        Schema::table('application', function (Blueprint $table) {
            $table->dropIndex(['application_id', 'admin_id']);
        });
    }
}; 