<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_role')
            ->insert([
                [
                    'role_id' => 1,
                    'module_id' => 1
                ],
                [
                    'role_id' => 1,
                    'module_id' => 2
                ],
                [
                    'role_id' => 1,
                    'module_id' => 3
                ],
                [
                    'role_id' => 1,
                    'module_id' => 4
                ],
                [
                    'role_id' => 1,
                    'module_id' => 5
                ],
                [
                    'role_id' => 1,
                    'module_id' => 6
                ],
                [
                    'role_id' => 1,
                    'module_id' => 7
                ],
                [
                    'role_id' => 1,
                    'module_id' => 8
                ],
                [
                    'role_id' => 1,
                    'module_id' => 9
                ],
                [
                    'role_id' => 1,
                    'module_id' => 10
                ]
            ]);
    }
}
