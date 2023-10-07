<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReliefCampFacilityFactory extends Factory
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
            'building_type'=>fake()->company,
            'number_of_persons'=>fake()->numberBetween(1,500),
            'number_of_rooms'=>fake()->numberBetween(1,10),
            'number_of_halls'=>fake()->numberBetween(1,20),
            'number_of_toilets'=>fake()->numberBetween(1,50),
            'number_of_persons_utilising_toilets'=>fake()->numberBetween(1,500),
            'number_of_persons_staying_at_night'=>fake()->numberBetween(1,500),
            'number_of_mattresses'=>fake()->numberBetween(1,500),
            'number_of_badsheets'=>fake()->numberBetween(1,500),
            'number_of_blankets'=>fake()->numberBetween(1,500),
            'number_of_mosquito'=>fake()->numberBetween(1,100),
            'number_of_fans'=>fake()->numberBetween(1,100),
            'availability_of_food_grains_in_days'=>fake()->numberBetween(1,10),
            'availability_of_veg_in_days'=>fake()->numberBetween(1,10),
        ];
    }
}
