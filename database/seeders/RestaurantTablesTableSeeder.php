<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RestaurantTablesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('restaurant_tables')->delete();
        
        \DB::table('restaurant_tables')->insert(array (
            0 => 
            array (
                'id' => 1,
                'location_id' => 1,
                'table_number' => 'Table 001',
                'person_allocate' => '4',
                'reservation' => 0,
                'created_at' => '2025-11-20 07:40:15',
                'updated_at' => '2025-11-20 07:40:15',
            ),
            1 => 
            array (
                'id' => 2,
                'location_id' => 1,
                'table_number' => 'Table 002',
                'person_allocate' => '2',
                'reservation' => 0,
                'created_at' => '2025-11-20 07:40:37',
                'updated_at' => '2025-11-20 07:41:02',
            ),
            2 => 
            array (
                'id' => 3,
                'location_id' => 2,
                'table_number' => 'Table 001',
                'person_allocate' => '4',
                'reservation' => 0,
                'created_at' => '2025-11-20 07:40:54',
                'updated_at' => '2025-11-20 07:40:54',
            ),
            3 => 
            array (
                'id' => 4,
                'location_id' => 2,
                'table_number' => 'Table 002',
                'person_allocate' => '8',
                'reservation' => 0,
                'created_at' => '2025-11-20 07:41:18',
                'updated_at' => '2025-11-20 07:41:18',
            ),
            4 => 
            array (
                'id' => 5,
                'location_id' => 3,
                'table_number' => 'Table 001',
                'person_allocate' => '2',
                'reservation' => 0,
                'created_at' => '2025-11-20 07:41:35',
                'updated_at' => '2025-11-20 07:41:35',
            ),
            5 => 
            array (
                'id' => 6,
                'location_id' => 3,
                'table_number' => 'Table 002',
                'person_allocate' => '2',
                'reservation' => 0,
                'created_at' => '2025-11-20 07:41:42',
                'updated_at' => '2025-11-20 07:41:42',
            ),
            6 => 
            array (
                'id' => 7,
                'location_id' => 3,
                'table_number' => 'Table 003',
                'person_allocate' => '2',
                'reservation' => 0,
                'created_at' => '2025-11-20 07:41:51',
                'updated_at' => '2025-11-20 07:41:51',
            ),
            7 => 
            array (
                'id' => 8,
                'location_id' => 4,
                'table_number' => 'Table 001',
                'person_allocate' => '4',
                'reservation' => 0,
                'created_at' => '2025-11-20 07:41:59',
                'updated_at' => '2025-11-20 07:41:59',
            ),
            8 => 
            array (
                'id' => 9,
                'location_id' => 4,
                'table_number' => 'Table 002',
                'person_allocate' => '2',
                'reservation' => 0,
                'created_at' => '2025-11-20 07:42:13',
                'updated_at' => '2025-11-20 07:42:13',
            ),
            9 => 
            array (
                'id' => 10,
                'location_id' => 4,
                'table_number' => 'Table 003',
                'person_allocate' => '4',
                'reservation' => 0,
                'created_at' => '2025-11-20 07:42:23',
                'updated_at' => '2025-11-20 07:42:23',
            ),
            10 => 
            array (
                'id' => 11,
                'location_id' => 5,
                'table_number' => 'Table 001',
                'person_allocate' => '8',
                'reservation' => 0,
                'created_at' => '2025-11-20 07:42:30',
                'updated_at' => '2025-11-20 07:42:30',
            ),
            11 => 
            array (
                'id' => 12,
                'location_id' => 5,
                'table_number' => 'Table 002',
                'person_allocate' => '8',
                'reservation' => 0,
                'created_at' => '2025-11-20 07:42:39',
                'updated_at' => '2025-11-20 07:42:39',
            ),
            12 => 
            array (
                'id' => 13,
                'location_id' => 5,
                'table_number' => 'Table 003',
                'person_allocate' => '16',
                'reservation' => 0,
                'created_at' => '2025-11-20 07:42:48',
                'updated_at' => '2025-11-20 07:42:48',
            ),
            13 => 
            array (
                'id' => 14,
                'location_id' => 6,
                'table_number' => 'Table 001',
                'person_allocate' => '20',
                'reservation' => 0,
                'created_at' => '2025-11-20 07:43:00',
                'updated_at' => '2025-11-20 07:43:00',
            ),
            14 => 
            array (
                'id' => 15,
                'location_id' => 1,
                'table_number' => 'Table 005',
                'person_allocate' => '5',
                'reservation' => 0,
                'created_at' => '2025-11-21 09:42:39',
                'updated_at' => '2025-11-21 09:42:39',
            ),
        ));
        
        
    }
}