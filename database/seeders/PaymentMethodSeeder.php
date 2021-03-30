<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            [
                'name' => 'Credito',
                'description' => 'Credito',
                'user_created_id' => 1
            ],
            [
                'name' => 'Debito',
                'description' => 'Debito',
                'user_created_id' => 1
            ]
        ]);
    }
}