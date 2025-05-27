<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition()
    {
        return [
            'admin_id' => Admin::factory(), // Create or reference an admin
            'applicant_status' => 'pending',
            'date_application' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'prove_letter' => null, // Since this is dummy data
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            },
        ];
    }

    /**
     * Configure the factory to generate approved applications.
     */
    public function approved()
    {
        return $this->state(function (array $attributes) {
            return [
                'applicant_status' => 'approved'
            ];
        });
    }
} 