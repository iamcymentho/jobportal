<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'user_id' => User::all()->random()->id,
            'company_id' => Company::all()->random()->id,
            'title' => $title = fake()->text,
            'slug' => Str::slug($title),
            'position' => fake()->jobTitle,
            'address' => fake()->address,
            'category_id' => rand(1, 5),
            'type' =>
            fake()->randomElement(['full-time', 'part-time']),
            'status' => rand(0, 1),
            'description' => fake()->paragraph(rand(2, 10)),
            'roles' => fake()->text,
            'last_date' => fake()->DateTime,
            'number_of_vacancy' =>
            rand(1, 20),
            'experience' =>
            rand(1, 10),
            'gender' => fake()->randomElement(['male', 'female']),
            'salary' =>
            rand(2000, 100000)
        ];
    }
}
