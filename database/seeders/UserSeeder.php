<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Toyibu Abidogun',
                'email' => 'toyibuabidogun@gmail.com',
                'password' => Hash::make('user1'),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Oga Niyi',
                'email' => 'oganiyi7@gmail.com',
                'password' => Hash::make('user2'),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            )
        ));
    }
}
