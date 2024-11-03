<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=1; $i < 101 ; $i++) {
            $mealId = $i;

            DB::table('sizes')->insert([
                ['meal_id' => $mealId, 'abbreviation' => 'S' ,'name' => 'small', 'price' => rand(0,100)],
                ['meal_id' => $mealId, 'abbreviation' => 'M' ,'name' => 'medium', 'price' => rand(100,200)],
                ['meal_id' => $mealId, 'abbreviation' => 'L' ,'name' => 'large', 'price' => rand(200,300)]
            ]);
        }

    }
}
