<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()
    {
        return [
            'role' => $this->faker->randomElement(['super admin', 'admin']),
            'phone_number' => '01' . $this->faker->numerify('########'), // 10-digit Malaysian format
            'login_id' => null, // Will be set in seeder
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            },
        ];
    }
} 