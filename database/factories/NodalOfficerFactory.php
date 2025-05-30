<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NodalOfficerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'officer_name'=>fake()->name,
            'officer_designation'=>fake()->randomElement(['Sub Divisional Officer','District Manager','District Supply Officer']),
            'officer_contact'=>fake()->unique()->numerify('##########')
        ];
    }
}
