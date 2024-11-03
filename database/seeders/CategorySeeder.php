<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'name' => 'burger',
                    'image' => 'burger.png',
                    'color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)),
                    'border_color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF))
                ],
                [
                    'name' => 'pizza',
                    'image' => 'pizza.png',
                    'color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)),
                    'border_color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF))
                ],
                [
                    'name' => 'pasta',
                    'image' => 'pasta.png',
                    'color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)),
                    'border_color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF))
                ],
                [
                    'name' => 'salad',
                    'image' => 'salad.png',
                    'color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)),
                    'border_color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF))
                ],
            ]
        );
    }
}
