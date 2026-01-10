<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RestaurantLinkTableUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('restaurant_link_table_users')->delete();
        
        \DB::table('restaurant_link_table_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'table_id' => 1,
                'pin' => 123456789,
                'created_at' => '2025-11-20 07:43:22',
                'updated_at' => '2025-11-20 07:43:22',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'table_id' => 2,
                'pin' => 123456789,
                'created_at' => '2025-11-20 07:43:34',
                'updated_at' => '2025-11-20 07:43:34',
            ),
        ));
        
        
    }
}