<?php

namespace Database\Factories;

use App\Models\Login;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class LoginFactory extends Factory
{
    protected $model = Login::class;

    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password123'), // Default password for all dummy users
            'acc_status' => 'active',
            'username' => $this->faker->userName(), // Add username
            'member_id' => null, // Will be updated after member creation
            'admin_id' => null, // Will be updated after admin creation
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            },
        ];
    }
} 