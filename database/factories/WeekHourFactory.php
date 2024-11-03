<?php

namespace Database\Factories;

use App\Models\Day;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeekHourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'restaurant_id' => Restaurant::inRandomOrder()->first()->id,
            'day_id' => Day::inRandomOrder()->first()->id,
            'from' => $this->faker->time(),
            'to' => $this->faker->time()
        ];
    }
}
