<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $userIds = User::pluck('id')->toArray();

        for ($i=1; $i < count($userIds) ; $i++) {
            DB::table('addresses')->insert(
                ['user_id' => $userIds[$i],
                'contact_title' => 'avatar',
                'telephone' => $faker->numberBetween(00000,99999),
                'address' => $faker->text(),
                'default' => $faker->numberBetween(0,1)
                ]
            );
        }
    }
}
