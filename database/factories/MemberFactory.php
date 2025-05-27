<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition()
    {
        $statuses = ['active', 'inactive'];
        $religions = ['Islam', 'Christianity', 'Buddhism', 'Hinduism'];
        $races = ['Malay', 'Chinese', 'Indian', 'Others'];
        
        return [
            'application_id' => null, // Will be set in seeder
            'total_merit' => 0.00,
            'registration_status' => 1,
            'intake_session' => date('Y'),
            'name' => $this->faker->name(),
            'ic_number' => $this->faker->numerify('######-##-####'),
            'age' => $this->faker->numberBetween(18, 60),
            'race' => $this->faker->randomElement($races),
            'religion' => $this->faker->randomElement($religions),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'phone_number' => '01' . $this->faker->numerify('########'), // 10-digit Malaysian format
            'birthplace' => $this->faker->city(),
            'birthdate' => $this->faker->date(),
            'address' => $this->faker->address(),
            'member_status' => $this->faker->randomElement($statuses),
            'login_id' => null, // Will be set in seeder
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            },
        ];
    }
} 