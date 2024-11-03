<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100 ; $i++) {
            DB::table('favorites')->insert([
                ['user_id' => User::inRandomOrder()->first()->id, 'favoriteable_id' =>  Restaurant::inRandomOrder()->first()->id, 'favoriteable_type' => 'App\Models\Restaurant']
            ]);
        }

        for ($i=0; $i < 100 ; $i++) {
            DB::table('favorites')->insert([
                ['user_id' => User::inRandomOrder()->first()->id, 'favoriteable_id' =>  Meal::inRandomOrder()->first()->id, 'favoriteable_type' => 'App\Models\Meal']
            ]);
        }
    }
}
