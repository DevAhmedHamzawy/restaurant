<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meals_pics = ['meals.png', 'meals1.png' , 'meals2.png' , 'meals3.png'];

        for ($i=0; $i < 500; $i++) {
            DB::table('meal_media')->insert([
                [
                    'meal_id' => Meal::inRandomOrder()->first()->id,
                    'default' => rand(0,1),
                    'media' => $meals_pics[rand(0,3)],
                    'type' => 'image'
                ]
            ]);
        }
    }
}
