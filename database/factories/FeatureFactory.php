<?php

namespace Database\Factories;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'meal_id' => Meal::inRandomOrder()->first()->id,
            'name' => $this->faker->name,
            'value' => $this->faker->numberBetween(0,999)
        ];
    }
}
