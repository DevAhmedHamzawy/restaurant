<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ProfileSeeder extends Seeder
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
            DB::table('profiles')->insert(
                ['user_id' => $userIds[$i],
                'avatar' => 'avatar.png',
                'telephone' => $faker->numberBetween(00000,99999)
                ]
            );
        }
    }
}
