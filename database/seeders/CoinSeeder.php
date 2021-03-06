<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coins')->insert([
            [
                'name' => 'USD',
                'symbol' => '$',
                'user_created_id' => 1
            ],
            [
                'name' => 'Euros',
                'symbol' => 'E',
                'user_created_id' => 1
            ]
        ]);
    }
}
