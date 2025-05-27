<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Application;
use App\Models\Login;
use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DummyMembersSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        // Number of dummy members to create
        $numberOfMembers = 1000;

        DB::beginTransaction();

        try {
            // Create an admin first
            $adminLogin = Login::factory()->create([
                'acc_status' => 'active',
                'username' => 'admin',
                'email' => 'admin@example.com',
            ]);

            $admin = Admin::factory()->create([
                'role' => 'admin',
                'login_id' => $adminLogin->login_id
            ]);

            // Update admin login with admin_id
            $adminLogin->update([
                'admin_id' => $admin->admin_id
            ]);

            for ($i = 0; $i < $numberOfMembers; $i++) {
                // 1. Create Login first
                $login = Login::factory()->create();

                // 2. Create Application with approved status and link to admin
                $application = Application::factory()
                    ->approved()
                    ->create([
                        'admin_id' => $admin->admin_id,
                        'date_application' => now()
                    ]);

                // 3. Create Member with details
                $member = Member::create([
                    'login_id' => $login->login_id,
                    'application_id' => $application->application_id,
                    'name' => $faker->name(),
                    'ic_number' => $faker->numerify('######-##-####'),
                    'age' => $faker->numberBetween(18, 60),
                    'race' => $faker->randomElement(['Malay', 'Chinese', 'Indian', 'Others']),
                    'religion' => $faker->randomElement(['Islam', 'Christianity', 'Buddhism', 'Hinduism']),
                    'gender' => $faker->randomElement(['Male', 'Female']),
                    'phone_number' => '01' . $faker->numerify('########'), // 10-digit Malaysian format
                    'birthplace' => $faker->city(),
                    'birthdate' => $faker->date(),
                    'address' => $faker->address(),
                    'member_status' => 'active',
                    'total_merit' => 0.00,
                    'registration_status' => 1,
                    'intake_session' => date('Y'),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                // 4. Update the login record with member_id
                $login->update([
                    'member_id' => $member->member_id
                ]);

                // Log progress every 100 records
                if (($i + 1) % 100 === 0) {
                    $this->command->info("Created " . ($i + 1) . " members");
                }
            }

            DB::commit();
            $this->command->info('Successfully created ' . $numberOfMembers . ' dummy members!');

        } catch (\Exception $e) {
            DB::rollBack();
            $this->command->error('Error creating dummy members: ' . $e->getMessage());
            throw $e; // Re-throw the exception to see the full stack trace
        }
    }
} 