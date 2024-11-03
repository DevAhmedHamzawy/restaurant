<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) {
            DB::table('meals')->insert([
                [
                    'restaurant_id' => Restaurant::inRandomOrder()->first()->id,
                    'tag_id' => Tag::whereNotNull('parent_id')->inRandomOrder()->first()->id,
                    'name' => 'meal'.rand(00,99),
                    'description' => 'Enjoy Free Delivery with KFC Egypt. Check
                    out KFC menu Enjoy Free Delivery with KFC Egypt. Check
                    out KFC menu Enjoy Free Delivery with KFC Egypt. Check
                    out KFC menu ',
                    'price' => 10
                ]
            ]);
        }
    }
}
