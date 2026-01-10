<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AttachablesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('attachables')->delete();
        
        \DB::table('attachables')->insert(array (
            0 => 
            array (
                'id' => 1,
                'attachable_type' => 'App\\Models\\RestaurantFood',
                'attachable_id' => 1,
                'name' => 'uploads/Bakery/20251120085501-1-Bakery.jpg',
                'datatype' => 'image/avif',
                'datasizeKB' => '219.08',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'attachable_type' => 'App\\Models\\RestaurantFood',
                'attachable_id' => 2,
                'name' => 'uploads/bbq/20251120085617-1-bbq.jpg',
                'datatype' => 'image/jpeg',
                'datasizeKB' => '262.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'attachable_type' => 'App\\Models\\RestaurantFood',
                'attachable_id' => 3,
                'name' => 'uploads/Noodle/20251120085701-1-Noodle.jpg',
                'datatype' => 'image/webp',
                'datasizeKB' => '127.43',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'attachable_type' => 'App\\Models\\RestaurantFood',
                'attachable_id' => 4,
                'name' => 'uploads/Pizza/20251120085744-1-Pizza.jpg',
                'datatype' => 'image/jpeg',
                'datasizeKB' => '289.77',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'attachable_type' => 'App\\Models\\RestaurantFood',
                'attachable_id' => 5,
                'name' => 'uploads/sandwich/20251120085825-1-sandwich.jpg',
                'datatype' => 'image/jpeg',
                'datasizeKB' => '82.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'attachable_type' => 'App\\Models\\RestaurantFood',
                'attachable_id' => 6,
                'name' => 'uploads/Seafood/20251120085908-1-Seafood.jpg',
                'datatype' => 'image/jpeg',
                'datasizeKB' => '482.36',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'attachable_type' => 'App\\Models\\RestaurantFood',
                'attachable_id' => 7,
                'name' => 'uploads/Steakhouse/20251120085954-1-Steakhouse.jpg',
                'datatype' => 'image/jpeg',
                'datasizeKB' => '517.30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'attachable_type' => 'App\\Models\\RestaurantFood',
                'attachable_id' => 8,
                'name' => 'uploads/Sushi/20251120090036-1-Sushi.jpg',
                'datatype' => 'image/jpeg',
                'datasizeKB' => '455.75',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'attachable_type' => 'App\\Models\\RestaurantFood',
                'attachable_id' => 11,
                'name' => 'uploads/new test food/20251121100821-1-new test food.jpg',
                'datatype' => 'image/webp',
                'datasizeKB' => '127.43',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'attachable_type' => 'App\\Models\\RestaurantFood',
                'attachable_id' => 12,
                'name' => 'uploads/abc food pizza/20251128143420-1-abc food pizza.jpg',
                'datatype' => 'image/jpeg',
                'datasizeKB' => '55.98',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'attachable_type' => 'App\\Models\\RestaurantFood',
                'attachable_id' => 1,
                'name' => 'uploads/Bakery/20251210074014-1-Bakery.png',
                'datatype' => 'image/png',
                'datasizeKB' => '456.37',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'attachable_type' => 'App\\Models\\RestaurantFood',
                'attachable_id' => 13,
                'name' => 'uploads/Bolani/20251211091250-1-Bolani.jpg',
                'datatype' => 'image/jpeg',
                'datasizeKB' => '9.31',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}