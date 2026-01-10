<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RestaurantTableLocationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('restaurant_table_locations')->delete();
        
        \DB::table('restaurant_table_locations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'First Floor ABC Building',
                'created_at' => '2025-11-20 07:35:05',
                'updated_at' => '2025-11-20 07:38:42',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Balkon ABC Building',
                'created_at' => '2025-11-20 07:35:11',
                'updated_at' => '2025-11-20 07:38:57',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Outside ABC Building',
                'created_at' => '2025-11-20 07:35:19',
                'updated_at' => '2025-11-20 07:39:11',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Inside ABC Building',
                'created_at' => '2025-11-20 07:35:24',
                'updated_at' => '2025-11-20 07:39:28',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Second Floor ABC Building',
                'created_at' => '2025-11-20 07:35:29',
                'updated_at' => '2025-11-20 07:39:41',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Special Room ABC Building',
                'created_at' => '2025-11-20 07:35:34',
                'updated_at' => '2025-11-20 07:39:57',
            ),
        ));
        
        
    }
}