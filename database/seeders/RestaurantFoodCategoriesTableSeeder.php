<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RestaurantFoodCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('restaurant_food_categories')->delete();
        
        \DB::table('restaurant_food_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Pizza',
                'created_at' => '2025-11-20 07:17:55',
                'updated_at' => '2025-11-20 07:17:55',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Hot Drink',
                'created_at' => '2025-11-20 07:18:03',
                'updated_at' => '2025-11-20 07:18:30',
            ),
            2 => 
            array (
                'id' => 9,
                'name' => 'BBQ',
                'created_at' => '2025-11-20 07:20:30',
                'updated_at' => '2025-11-20 07:20:30',
            ),
            3 => 
            array (
                'id' => 10,
                'name' => 'Steakhouse',
                'created_at' => '2025-11-20 07:20:34',
                'updated_at' => '2025-11-20 07:20:34',
            ),
            4 => 
            array (
                'id' => 11,
                'name' => 'Seafood',
                'created_at' => '2025-11-20 07:20:38',
                'updated_at' => '2025-11-20 07:20:38',
            ),
            5 => 
            array (
                'id' => 12,
                'name' => 'Bakery',
                'created_at' => '2025-11-20 07:20:43',
                'updated_at' => '2025-11-20 07:20:43',
            ),
            6 => 
            array (
                'id' => 13,
                'name' => 'Dessert shop',
                'created_at' => '2025-11-20 07:20:47',
                'updated_at' => '2025-11-20 07:20:47',
            ),
            7 => 
            array (
                'id' => 14,
                'name' => 'Sandwich/Sub shop',
                'created_at' => '2025-11-20 07:20:53',
                'updated_at' => '2025-11-20 07:20:53',
            ),
            8 => 
            array (
                'id' => 15,
                'name' => 'Sushi bar',
                'created_at' => '2025-11-20 07:20:57',
                'updated_at' => '2025-11-20 07:20:57',
            ),
            9 => 
            array (
                'id' => 16,
                'name' => 'Noodle house',
                'created_at' => '2025-11-20 07:21:01',
                'updated_at' => '2025-11-20 07:21:01',
            ),
        ));
        
        
    }
}