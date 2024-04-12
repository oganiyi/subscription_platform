<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->delete();
        
        DB::table('websites')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Inisev',
                'url' => 'https://www.inisev.com',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Sell Codes',
                'url' => 'https://www.sellcodes.com',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            )
        ));

    }
}
