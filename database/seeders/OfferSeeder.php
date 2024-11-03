<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offerImages = ['1.png' , '2.png'];

        for ($i=0; $i < 5; $i++) {
            DB::table('offers')->insert([
                ['name' => 'november offer', 'description' => 'description' , 'percentage' => 50 , 'image' => $offerImages[rand(0,1)], 'color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)) ]
            ]);
        }

    }
}
