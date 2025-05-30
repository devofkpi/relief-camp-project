<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReliefCampDemographyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender=fake()->randomElement(['male','female','third_gender']);
        return [
            //
            'person_name'=>fake()->name($gender),
            'gender'=>$gender,
            'age'=>fake()->numberBetween(1,100)

        ];
    }
}
