<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert(
            [
            ['name' => 'Order Pending', 'description' => 'Your order has been recived'],
            ['name' => 'Order Confirmed', 'description' => 'Your order has been confirmed'],
            ['name' => 'Order Preparing', 'description' => 'Your order has been preparing'],
            ['name' => 'Deliver In Progress', 'description' => 'Hang on ! your food is on the way' ],
            ['name' => 'Delivered',  'description' => 'Wish you have interesting experiances'],
            ]
        );
    }
}
