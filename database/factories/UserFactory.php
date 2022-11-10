<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => 'Jainendra',
            'last_name' => 'Kumar',
            'mobile' => '9100001232',
            'email' => 'admin@gmail.com',
            'gender' => 'male',
            'address' => 'Bihar sharif',
            'city' => 'Patna',
            'company' => 'bloom',
            'job_title' => 'Software Engineer',
            'rfid' => 10001,
            'dob' => date('d-m-Y'),
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
