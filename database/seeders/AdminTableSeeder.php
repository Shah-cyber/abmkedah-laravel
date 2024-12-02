<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin')->insert([
            ['admin_id' => 1, 'role' => 'super admin', 'login_id' => 1],
            ['admin_id' => 2, 'role' => 'sub admin', 'login_id' => 2],
            ['admin_id' => 3, 'role' => 'super admin', 'login_id' => 3],
            ['admin_id' => 4, 'role' => 'sub admin', 'login_id' => 4],
        ]);
    }
}
