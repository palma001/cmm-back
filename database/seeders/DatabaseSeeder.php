<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use App\Helpers\RoleAcronym;
use App\Models\Guide;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            EgressTypeSeeder::class,
            RoleSeeder::class,
            BranchOfficeSeeder::class
            // SectionSeeder::class,
            // ModuleSeeder::class,
            // ModuleRoleSeeder::class
        ]);
    }
}
