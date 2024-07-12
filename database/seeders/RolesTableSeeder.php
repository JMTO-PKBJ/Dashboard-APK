<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->updateOrInsert(['id' => 1], ['name' => 'Admin']);
        DB::table('roles')->updateOrInsert(['id' => 2], ['name' => 'Supervisor']);
        DB::table('roles')->updateOrInsert(['id' => 3], ['name' => 'Operator']);
    }
}
