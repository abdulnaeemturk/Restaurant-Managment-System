<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TemporaryOrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('temporary_orders')->delete();
        
        \DB::table('temporary_orders')->insert(array (
            0 => 
            array (
                'id' => 23,
                'food_id' => 2,
                'piece' => 1,
                'user_id' => 1,
                'status' => 0,
                'created_at' => '2026-01-05 18:17:04',
                'updated_at' => '2026-01-05 18:17:04',
            ),
            1 => 
            array (
                'id' => 24,
                'food_id' => 9,
                'piece' => 1,
                'user_id' => 1,
                'status' => 0,
                'created_at' => '2026-01-05 18:17:06',
                'updated_at' => '2026-01-05 18:17:06',
            ),
            2 => 
            array (
                'id' => 25,
                'food_id' => 1,
                'piece' => 1,
                'user_id' => 1,
                'status' => 0,
                'created_at' => '2026-01-05 18:17:10',
                'updated_at' => '2026-01-05 18:17:10',
            ),
            3 => 
            array (
                'id' => 26,
                'food_id' => 12,
                'piece' => 1,
                'user_id' => 1,
                'status' => 0,
                'created_at' => '2026-01-05 18:17:13',
                'updated_at' => '2026-01-05 18:17:13',
            ),
        ));
        
        
    }
}