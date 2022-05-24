<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'masyarakat', 
        ]);

        DB::table('roles')->insert([
            'name' => 'admin_kelurahan', 
        ]);

        DB::table('roles')->insert([
            'name' => 'admin_instansi_umum', 
        ]);

        DB::table('roles')->insert([
            'name' => 'punya_gue', 
        ]);
    }
}
