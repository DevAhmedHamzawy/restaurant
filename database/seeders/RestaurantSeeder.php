<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            [
                'name' => 'burger_king',
                'image' => 'burger_king_big.png',
                'cover' => 'burger_king.png',
                'address' => 'some address',
                'delivery_time' => '10 - 12',
                'delivery_fees' => '20',
                'description' => 'Enjoy Free Delivery with KFC Egypt. Check
                out KFC menu Enjoy Free Delivery with KFC Egypt. Check
                out KFC menu Enjoy Free Delivery with KFC Egypt. Check
                out KFC menu ',
                'lat' => '31.04928',
                'lng' => '31.443823',
            ],
            [
                'name' => 'mac',
                'image' => 'mac_big.png',
                'cover' => 'mac.png',
                'address' => 'some address',
                'delivery_time' => '10 - 12',
                'delivery_fees' => '20',
                'description' => 'Enjoy Free Delivery with KFC Egypt. Check
                out KFC menu Enjoy Free Delivery with KFC Egypt. Check
                out KFC menu Enjoy Free Delivery with KFC Egypt. Check
                out KFC menu ',
                'lat' => '31.063412',
                'lng' => '31.373953'
            ],
            [
                'name' => 'kentucky',
                'image' => 'kentucky_big.png',
                'cover' => 'kentucky.png',
                'address' => 'some address',
                'delivery_time' => '10 - 12',
                'delivery_fees' => '20',
                'description' => 'Enjoy Free Delivery with KFC Egypt. Check
                out KFC menu Enjoy Free Delivery with KFC Egypt. Check
                out KFC menu Enjoy Free Delivery with KFC Egypt. Check
                out KFC menu ',
                'lat' => '31.055328',
                'lng' => '31.446301'
            ],
        ]);
    }
}
