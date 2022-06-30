<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Admin Kelurahan', 
            'email' => 'AdminKelurahan@Admin.com', 
            'nohp'=>'123',
            'password' => bcrypt("12345678"),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Instansi', 
            'email' => 'AdminInstansi@Admin.com', 
            'nohp'=>'123',
            'password' => bcrypt("12345678"),
        ]);
        DB::table('users')->insert([
            'name' => 'PunyaGue', 
            'email' => 'PunyaGue@Admin.com', 
            'nohp'=>'123',
            'password' => bcrypt("12345678"),
        ]);
    }
}
