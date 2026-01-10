<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RestaurantFoodTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('restaurant_food')->delete();
        
        \DB::table('restaurant_food')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bakery',
                'price' => 7,
                'category_id' => 12,
                'created_at' => '2025-11-20 07:54:36',
                'updated_at' => '2025-11-21 08:33:25',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'bbq',
                'price' => 15,
                'category_id' => 9,
                'created_at' => '2025-11-20 07:56:01',
                'updated_at' => '2025-11-20 07:56:01',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Noodle',
                'price' => 4,
                'category_id' => 16,
                'created_at' => '2025-11-20 07:56:52',
                'updated_at' => '2025-11-20 07:56:52',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Pizza',
                'price' => 8,
                'category_id' => 1,
                'created_at' => '2025-11-20 07:57:30',
                'updated_at' => '2025-11-20 07:57:30',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'sandwich',
                'price' => 5,
                'category_id' => 14,
                'created_at' => '2025-11-20 07:58:08',
                'updated_at' => '2025-11-20 07:58:08',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Seafood',
                'price' => 18,
                'category_id' => 11,
                'created_at' => '2025-11-20 07:58:48',
                'updated_at' => '2025-11-20 07:58:48',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Steakhouse',
                'price' => 22,
                'category_id' => 10,
                'created_at' => '2025-11-20 07:59:34',
                'updated_at' => '2025-11-20 07:59:34',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Sushi',
                'price' => 10,
                'category_id' => 15,
                'created_at' => '2025-11-20 08:00:20',
                'updated_at' => '2025-11-20 08:00:20',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'new information',
                'price' => 12,
                'category_id' => 12,
                'created_at' => '2025-11-21 08:27:57',
                'updated_at' => '2025-11-21 08:27:57',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'testfood',
                'price' => 8,
                'category_id' => 16,
                'created_at' => '2025-11-21 08:28:24',
                'updated_at' => '2025-11-21 08:28:24',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'new test food',
                'price' => 15,
                'category_id' => 15,
                'created_at' => '2025-11-21 08:28:40',
                'updated_at' => '2025-11-21 08:28:40',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'abc food pizza',
                'price' => 15,
                'category_id' => 1,
                'created_at' => '2025-11-28 13:33:14',
                'updated_at' => '2025-11-28 13:33:14',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Bolani',
                'price' => 15,
                'category_id' => 1,
                'created_at' => '2025-12-11 08:11:55',
                'updated_at' => '2025-12-11 08:11:55',
            ),
        ));
        
        
    }
}