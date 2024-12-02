<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AbmEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abmevent')->insert([
            [
                'event_id' => 1,
                'event_name' => 'Fun Run 2024',
                'banner' => NULL,
                'event_description' => 'Annual fun run event',
                'total_participation' => 50,
                'event_category' => 'public',
                'event_status' => 'draft',
                'event_date' => '2024-10-15',
                'event_session' => 2024,
                'event_start_time' => '07:30:00',
                'event_end_time' => '11:30:00',
                'event_location' => 'Seksyen 17, Shah Alam',
                'event_price' => 0,
            ],
            [
                'event_id' => 2,
                'event_name' => 'Tech Summit',
                'banner' => NULL,
                'event_description' => 'Annual technology summit',
                'total_participation' => 150,
                'event_category' => 'private',
                'event_status' => 'draft',
                'event_date' => '2024-09-20',
                'event_session' => 2024,
                'event_start_time' => '09:00:00',
                'event_end_time' => '17:00:00',
                'event_location' => 'Kuala Lumpur',
                'event_price' => 0,
            ],
            [
                'event_id' => 3,
                'event_name' => 'Charity Gala',
                'banner' => NULL,
                'event_description' => 'Charity event for fundraising',
                'total_participation' => 200,
                'event_category' => 'public',
                'event_status' => 'running',
                'event_date' => '2024-08-22',
                'event_session' => 2024,
                'event_start_time' => '19:00:00',
                'event_end_time' => '22:00:00',
                'event_location' => 'Hilton Hotel',
                'event_price' => 100,
            ],
            [
                'event_id' => 4,
                'event_name' => 'Workshop Series',
                'banner' => NULL,
                'event_description' => 'Educational workshops',
                'total_participation' => 30,
                'event_category' => 'private',
                'event_status' => 'running',
                'event_date' => '2024-07-05',
                'event_session' => 2024,
                'event_start_time' => '08:30:00',
                'event_end_time' => '12:30:00',
                'event_location' => 'Cyberjaya',
                'event_price' => 50,
            ],
            [
                'event_id' => 5,
                'event_name' => 'Health Fair',
                'banner' => NULL,
                'event_description' => 'Community health event',
                'total_participation' => 75,
                'event_category' => 'public',
                'event_status' => 'running',
                'event_date' => '2024-06-11',
                'event_session' => 2024,
                'event_start_time' => '09:00:00',
                'event_end_time' => '14:00:00',
                'event_location' => 'Park City Mall',
                'event_price' => 20,
            ],
            [
                'event_id' => 6,
                'event_name' => 'Career Expo',
                'banner' => NULL,
                'event_description' => 'Job and career fair',
                'total_participation' => 300,
                'event_category' => 'public',
                'event_status' => 'running',
                'event_date' => '2024-05-18',
                'event_session' => 2024,
                'event_start_time' => '10:00:00',
                'event_end_time' => '16:00:00',
                'event_location' => 'Expo Center',
                'event_price' => 50,
            ],
            [
                'event_id' => 7,
                'event_name' => 'Music Fest',
                'banner' => NULL,
                'event_description' => 'Outdoor music festival',
                'total_participation' => 500,
                'event_category' => 'public',
                'event_status' => 'running',
                'event_date' => '2024-04-01',
                'event_session' => 2024,
                'event_start_time' => '17:00:00',
                'event_end_time' => '23:59:00',
                'event_location' => 'Downtown Plaza',
                'event_price' => 50,
            ],
            [
                'event_id' => 8,
                'event_name' => 'Startup Pitch',
                'banner' => NULL,
                'event_description' => 'Pitch event for startups',
                'total_participation' => 40,
                'event_category' => 'public',
                'event_status' => 'ended',
                'event_date' => '2024-03-15',
                'event_session' => 2024,
                'event_start_time' => '13:00:00',
                'event_end_time' => '17:00:00',
                'event_location' => 'TechHub',
                'event_price' => 20,
            ],
            [
                'event_id' => 9,
                'event_name' => 'Food Bazaar',
                'banner' => NULL,
                'event_description' => 'Local food tasting event',
                'total_participation' => 100,
                'event_category' => 'public',
                'event_status' => 'ended',
                'event_date' => '2023-02-25',
                'event_session' => 2023,
                'event_start_time' => '10:00:00',
                'event_end_time' => '20:00:00',
                'event_location' => 'Central Park',
                'event_price' => 0,
            ],
            [
                'event_id' => 10,
                'event_name' => 'Science Fair',
                'banner' => NULL,
                'event_description' => 'Annual science fair',
                'total_participation' => 150,
                'event_category' => 'public',
                'event_status' => 'ended',
                'event_date' => '2023-01-30',
                'event_session' => 2023,
                'event_start_time' => '08:00:00',
                'event_end_time' => '15:00:00',
                'event_location' => 'City Hall',
                'event_price' => 0,
            ],
        ]);
    }
}
