<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = ['excellent', 'good', 'bad'];

        for ($i=0; $i < 100 ; $i++) {
            DB::table('reviews')->insert([
                ['user_id' => User::inRandomOrder()->first()->id, 'rating' => rand(0,5), 'comment' => $comments[rand(0,2)] , 'reviewable_id' =>  Restaurant::inRandomOrder()->first()->id, 'reviewable_type' => 'App\Models\Restaurant']
            ]);
        }


        for ($i=0; $i < 100 ; $i++) {
            DB::table('reviews')->insert([
                ['user_id' => User::inRandomOrder()->first()->id, 'rating' => rand(0,5), 'comment' => $comments[rand(0,2)] , 'reviewable_id' =>  Meal::inRandomOrder()->first()->id, 'reviewable_type' => 'App\Models\Meal']
            ]);
        }

    }
}
