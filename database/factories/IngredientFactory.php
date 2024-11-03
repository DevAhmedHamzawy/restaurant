<?php

namespace Database\Factories;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    private static $i = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if(self::$i == 100) self::$i = 1;

        $ingredientImages = ['ingredient1.png','ingredient2.png', 'ingredient3.png', 'ingredient4.png', 'ingredient5.png'];

        return [
            'meal_id' => self::$i++,
            'image' => $ingredientImages[rand(0,4)],
            'name' => $this->faker->name,
        ];
    }
}
