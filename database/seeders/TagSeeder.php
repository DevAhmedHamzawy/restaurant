<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $r1 = Restaurant::inRandomOrder()->first()->id;
        $r2 = Restaurant::inRandomOrder()->first()->id;
        $r3 = Restaurant::inRandomOrder()->first()->id;

        DB::table('tags')->insert([
            [
                'restaurant_id' => $r1,
                'parent_id' => null,
                'name' => 'Burger'
            ],
            [
                'restaurant_id' => $r1,
                'parent_id' => null,
                'name' => 'pasta'
            ],
            [
                'restaurant_id' => $r1,
                'parent_id' => null,
                'name' => 'Grills'
            ],
            [
                'restaurant_id' => $r2,
                'parent_id' => null,
                'name' => 'Burger'
            ],
            [
                'restaurant_id' => $r2,
                'parent_id' => null,
                'name' => 'pasta'
            ],
            [
                'restaurant_id' => $r2,
                'parent_id' => null,
                'name' => 'Grills'
            ],
            [
                'restaurant_id' => $r3,
                'parent_id' => null,
                'name' => 'Burger'
            ],
            [
                'restaurant_id' => $r3,
                'parent_id' => null,
                'name' => 'pasta'
            ],
            [
                'restaurant_id' => $r3,
                'parent_id' => null,
                'name' => 'Grills'
            ]
        ]);

        DB::table('tags')->insert([
            [
                'restaurant_id' => $r1,
                'parent_id' => 10,
                'name' => 'beef burger'
            ],
            [
                'restaurant_id' => $r1,
                'parent_id' => 10,
                'name' => 'chicken burger'
            ],
            [
                'restaurant_id' => $r1,
                'parent_id' => 13,
                'name' => 'beef burger'
            ],
            [
                'restaurant_id' => $r1,
                'parent_id' => 13,
                'name' => 'chicken burger'
            ],
            [
                'restaurant_id' => $r1,
                'parent_id' => 16,
                'name' => 'beef burger'
            ],
            [
                'restaurant_id' => $r1,
                'parent_id' => 16,
                'name' => 'chicken burger'
            ],
            [
                'restaurant_id' => $r1,
                'parent_id' => 11,
                'name' => 'pasta one'
            ],
            [
                'restaurant_id' => $r1,
                'parent_id' => 11,
                'name' => 'pasta two'
            ],
            [
                'restaurant_id' => $r1,
                'parent_id' => 14,
                'name' => 'pasta one'
            ],
            [
                'restaurant_id' => $r1,
                'parent_id' => 14,
                'name' => 'pasta two'
            ],
            [
                'restaurant_id' => $r1,
                'parent_id' => 17,
                'name' => 'pasta one'
            ],
            [
                'restaurant_id' => $r1,
                'parent_id' => 17,
                'name' => 'pasta two'
            ],




            [
                'restaurant_id' => $r2,
                'parent_id' => 10,
                'name' => 'beef burger'
            ],
            [
                'restaurant_id' => $r2,
                'parent_id' => 10,
                'name' => 'chicken burger'
            ],
            [
                'restaurant_id' => $r2,
                'parent_id' => 13,
                'name' => 'beef burger'
            ],
            [
                'restaurant_id' => $r2,
                'parent_id' => 13,
                'name' => 'chicken burger'
            ],
            [
                'restaurant_id' => $r2,
                'parent_id' => 16,
                'name' => 'beef burger'
            ],
            [
                'restaurant_id' => $r2,
                'parent_id' => 16,
                'name' => 'chicken burger'
            ],
            [
                'restaurant_id' => $r2,
                'parent_id' => 11,
                'name' => 'pasta one'
            ],
            [
                'restaurant_id' => $r2,
                'parent_id' => 11,
                'name' => 'pasta two'
            ],
            [
                'restaurant_id' => $r2,
                'parent_id' => 14,
                'name' => 'pasta one'
            ],
            [
                'restaurant_id' => $r2,
                'parent_id' => 14,
                'name' => 'pasta two'
            ],
            [
                'restaurant_id' => $r2,
                'parent_id' => 17,
                'name' => 'pasta one'
            ],
            [
                'restaurant_id' => $r2,
                'parent_id' => 17,
                'name' => 'pasta two'
            ],



            [
                'restaurant_id' => $r3,
                'parent_id' => 10,
                'name' => 'beef burger'
            ],
            [
                'restaurant_id' => $r3,
                'parent_id' => 10,
                'name' => 'chicken burger'
            ],
            [
                'restaurant_id' => $r3,
                'parent_id' => 13,
                'name' => 'beef burger'
            ],
            [
                'restaurant_id' => $r3,
                'parent_id' => 13,
                'name' => 'chicken burger'
            ],
            [
                'restaurant_id' => $r3,
                'parent_id' => 16,
                'name' => 'beef burger'
            ],
            [
                'restaurant_id' => $r3,
                'parent_id' => 16,
                'name' => 'chicken burger'
            ],
            [
                'restaurant_id' => $r3,
                'parent_id' => 11,
                'name' => 'pasta one'
            ],
            [
                'restaurant_id' => $r3,
                'parent_id' => 11,
                'name' => 'pasta two'
            ],
            [
                'restaurant_id' => $r3,
                'parent_id' => 14,
                'name' => 'pasta one'
            ],
            [
                'restaurant_id' => $r3,
                'parent_id' => 14,
                'name' => 'pasta two'
            ],
            [
                'restaurant_id' => $r3,
                'parent_id' => 17,
                'name' => 'pasta one'
            ],
            [
                'restaurant_id' => $r3,
                'parent_id' => 17,
                'name' => 'pasta two'
            ]


            ]);
    }
}
