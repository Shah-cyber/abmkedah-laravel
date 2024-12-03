<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TruncateTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Disable foreign key checks
         DB::statement('SET FOREIGN_KEY_CHECKS=0;');

           // Truncate tables
        DB::table('application')->truncate();
        DB::table('abmevent')->truncate(); // Replace with other tables if needed
        DB::table('admin')->truncate();
        DB::table('member')->truncate();
        DB::table('nonmember')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
