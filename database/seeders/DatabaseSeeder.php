<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Drink;
use App\Models\Feature;
use App\Models\Ingredient;
use App\Models\Option;
use App\Models\Profile;
use App\Models\Side;
use App\Models\User;
use App\Models\WeekHour;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        $this->call([
            //CategorySeeder::class,
            //RestaurantSeeder::class,
            //TagSeeder::class,
            //MealSeeder::class,
            //OfferSeeder::class,
            //ReviewSeeder::class,
            //FavoriteSeeder::class,
            //MealMediaSeeder::class,
            //DaySeeder::class,
            //SizeSeeder::class,
            //ProfileSeeder::class,
            //AddressSeeder::class,
            StatusSeeder::class,
        ]);

        //WeekHour::factory(100)->create();

        //Admin::factory(10)->create();

        //Feature::factory(300)->create();

        //Ingredient::factory(500)->create();

        //Option::factory(500)->create();

        // Drink::factory(500)->create();

        // Side::factory(500)->create();

    }
}
