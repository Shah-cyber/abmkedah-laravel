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
        $tables = [
            'nonmember',
            'member',
            'allocated_merit',
            'joinevent',
            'payment_allocation',
            'payment_receipt',
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                if (!Schema::hasColumn($table->getTable(), 'created_at') && !Schema::hasColumn($table->getTable(), 'updated_at')) {
                    $table->timestamps(); // Adds created_at and updated_at columns
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables = [
            'nonmember',
            'member',
            'allocated_merit',
            'joinevent',
            'payment_allocation',
            'payment_receipt',
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                if (Schema::hasColumn($table->getTable(), 'created_at') && Schema::hasColumn($table->getTable(), 'updated_at')) {
                    $table->dropTimestamps(); // Drops created_at and updated_at columns
                }
            });
        }
    }
};
