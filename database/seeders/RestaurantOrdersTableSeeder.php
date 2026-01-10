<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RestaurantOrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('restaurant_orders')->delete();
        
        \DB::table('restaurant_orders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'customer' => 'Selfonlineservice',
                'table_id' => NULL,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => 'card',
                'description' => NULL,
                'reference' => NULL,
                'created_at' => '2025-11-20 08:45:13',
                'updated_at' => '2025-11-20 10:26:52',
            ),
            1 => 
            array (
                'id' => 2,
                'customer' => 'Selfonlineservice',
                'table_id' => NULL,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => 'card',
                'description' => NULL,
                'reference' => NULL,
                'created_at' => '2025-11-20 10:25:46',
                'updated_at' => '2025-11-20 13:51:26',
            ),
            2 => 
            array (
                'id' => 3,
                'customer' => 'Selfonlineservice',
                'table_id' => NULL,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => 'card',
                'description' => NULL,
                'reference' => NULL,
                'created_at' => '2025-11-20 10:27:50',
                'updated_at' => '2025-11-20 10:29:44',
            ),
            3 => 
            array (
                'id' => 4,
                'customer' => 'Naeem',
                'table_id' => 1,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => 'gsgsgsgfdgs',
                'reference' => NULL,
                'created_at' => '2025-11-20 10:28:52',
                'updated_at' => '2025-11-20 13:51:38',
            ),
            4 => 
            array (
                'id' => 5,
                'customer' => 'aaaa',
                'table_id' => 2,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => 'asdadasdasdadas',
                'reference' => NULL,
                'created_at' => '2025-11-20 13:52:36',
                'updated_at' => '2025-11-21 10:02:56',
            ),
            5 => 
            array (
                'id' => 6,
                'customer' => 'aaaa',
                'table_id' => 1,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => 'sdafasfasdfasdf asdfd asf',
                'reference' => NULL,
                'created_at' => '2025-11-21 08:40:17',
                'updated_at' => '2025-12-10 13:46:15',
            ),
            6 => 
            array (
                'id' => 7,
                'customer' => 'Selfonlineservice',
                'table_id' => NULL,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => 'card',
                'description' => NULL,
                'reference' => NULL,
                'created_at' => '2025-11-21 09:40:55',
                'updated_at' => '2025-12-10 13:46:18',
            ),
            7 => 
            array (
                'id' => 8,
                'customer' => 'test',
                'table_id' => 1,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => 'asdfasdfasfasdfasd',
                'reference' => NULL,
                'created_at' => '2025-11-21 10:06:31',
                'updated_at' => '2025-12-10 13:46:42',
            ),
            8 => 
            array (
                'id' => 9,
                'customer' => 'naeem',
                'table_id' => 6,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => 'jhaslkjf hafl hasdf',
                'reference' => NULL,
                'created_at' => '2025-11-28 13:28:49',
                'updated_at' => '2025-12-10 13:46:43',
            ),
            9 => 
            array (
                'id' => 10,
                'customer' => 'Selfonlineservice',
                'table_id' => NULL,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => 'card',
                'description' => NULL,
                'reference' => NULL,
                'created_at' => '2025-11-28 13:31:05',
                'updated_at' => '2025-12-10 13:46:43',
            ),
            10 => 
            array (
                'id' => 12,
                'customer' => '212133213',
                'table_id' => 1,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => '21312312',
                'reference' => NULL,
                'created_at' => '2025-12-10 09:52:22',
                'updated_at' => '2025-12-10 13:46:44',
            ),
            11 => 
            array (
                'id' => 13,
                'customer' => 'abc',
                'table_id' => 3,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => 'sdafasdfasdf',
                'reference' => NULL,
                'created_at' => '2025-12-10 10:47:50',
                'updated_at' => '2025-12-10 13:46:46',
            ),
            12 => 
            array (
                'id' => 17,
                'customer' => 'new information',
                'table_id' => 2,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => '123123456',
                'reference' => NULL,
                'created_at' => '2025-12-10 11:25:28',
                'updated_at' => '2025-12-11 06:29:09',
            ),
            13 => 
            array (
                'id' => 18,
                'customer' => 'test name ok',
                'table_id' => 8,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => 'this is a test description',
                'reference' => NULL,
                'created_at' => '2025-12-10 11:26:44',
                'updated_at' => '2025-12-11 07:09:16',
            ),
            14 => 
            array (
                'id' => 19,
                'customer' => 'ok',
                'table_id' => 2,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => 'ok',
                'reference' => NULL,
                'created_at' => '2025-12-10 11:34:47',
                'updated_at' => '2025-12-11 07:09:18',
            ),
            15 => 
            array (
                'id' => 20,
                'customer' => 'aaaa',
                'table_id' => 11,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => 'dsfsaff',
                'reference' => NULL,
                'created_at' => '2025-12-10 13:42:18',
                'updated_at' => '2025-12-10 13:46:49',
            ),
            16 => 
            array (
                'id' => 21,
                'customer' => 'cccc',
                'table_id' => 1,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => 'hjgjhgjhgg',
                'reference' => NULL,
                'created_at' => '2025-12-10 13:44:46',
                'updated_at' => '2025-12-11 07:09:20',
            ),
            17 => 
            array (
                'id' => 22,
                'customer' => 'order today test 11.12.2025',
                'table_id' => 1,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => 'asdasdasdas',
                'reference' => NULL,
                'created_at' => '2025-12-11 06:40:11',
                'updated_at' => '2025-12-11 06:40:38',
            ),
            18 => 
            array (
                'id' => 23,
                'customer' => 'second test 11.12.2025',
                'table_id' => 9,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => 'dljkfhasdlf kasdlfkhsdaf',
                'reference' => NULL,
                'created_at' => '2025-12-11 07:09:43',
                'updated_at' => '2025-12-11 07:13:11',
            ),
            19 => 
            array (
                'id' => 24,
                'customer' => 'bolani order',
                'table_id' => 1,
                'plate' => NULL,
                'status' => 3,
                'paid_by' => NULL,
                'description' => 'asdasdas',
                'reference' => NULL,
                'created_at' => '2025-12-11 08:13:44',
                'updated_at' => '2025-12-11 08:15:13',
            ),
            20 => 
            array (
                'id' => 25,
                'customer' => 'test info',
                'table_id' => 6,
                'plate' => NULL,
                'status' => 2,
                'paid_by' => NULL,
                'description' => 'new information',
                'reference' => NULL,
                'created_at' => '2025-12-11 08:45:55',
                'updated_at' => '2025-12-11 08:49:43',
            ),
            21 => 
            array (
                'id' => 26,
                'customer' => 'Stephen boss',
                'table_id' => 10,
                'plate' => NULL,
                'status' => 1,
                'paid_by' => NULL,
                'description' => 'he likes sweet foods',
                'reference' => NULL,
                'created_at' => '2025-12-11 13:39:53',
                'updated_at' => '2025-12-11 13:40:36',
            ),
            22 => 
            array (
                'id' => 27,
                'customer' => 'Selfonlineservice',
                'table_id' => NULL,
                'plate' => NULL,
                'status' => 1,
                'paid_by' => 'card',
                'description' => NULL,
                'reference' => NULL,
                'created_at' => '2025-12-11 13:58:54',
                'updated_at' => '2025-12-11 13:58:54',
            ),
            23 => 
            array (
                'id' => 28,
                'customer' => 'aaa',
                'table_id' => 1,
                'plate' => NULL,
                'status' => 1,
                'paid_by' => NULL,
                'description' => 'asasas',
                'reference' => NULL,
                'created_at' => '2025-12-27 23:28:33',
                'updated_at' => '2025-12-27 23:28:57',
            ),
            24 => 
            array (
                'id' => 29,
                'customer' => 'asdasd',
                'table_id' => 1,
                'plate' => NULL,
                'status' => 0,
                'paid_by' => NULL,
                'description' => 'asdadasd',
                'reference' => NULL,
                'created_at' => '2026-01-05 12:37:14',
                'updated_at' => '2026-01-05 12:37:14',
            ),
        ));
        
        
    }
}