<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RestaurantOrderDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('restaurant_order_details')->delete();
        
        \DB::table('restaurant_order_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'order_id' => 1,
                'food_id' => 8,
                'piece' => 3,
                'created_at' => '2025-11-20 08:45:13',
                'updated_at' => '2025-11-20 08:45:13',
            ),
            1 => 
            array (
                'id' => 2,
                'order_id' => 1,
                'food_id' => 3,
                'piece' => 2,
                'created_at' => '2025-11-20 08:45:13',
                'updated_at' => '2025-11-20 08:45:13',
            ),
            2 => 
            array (
                'id' => 3,
                'order_id' => 1,
                'food_id' => 6,
                'piece' => 1,
                'created_at' => '2025-11-20 08:45:13',
                'updated_at' => '2025-11-20 08:45:13',
            ),
            3 => 
            array (
                'id' => 4,
                'order_id' => 1,
                'food_id' => 7,
                'piece' => 1,
                'created_at' => '2025-11-20 08:45:13',
                'updated_at' => '2025-11-20 08:45:13',
            ),
            4 => 
            array (
                'id' => 5,
                'order_id' => 2,
                'food_id' => 1,
                'piece' => 1,
                'created_at' => '2025-11-20 10:25:46',
                'updated_at' => '2025-11-20 10:25:46',
            ),
            5 => 
            array (
                'id' => 6,
                'order_id' => 2,
                'food_id' => 2,
                'piece' => 2,
                'created_at' => '2025-11-20 10:25:46',
                'updated_at' => '2025-11-20 10:25:46',
            ),
            6 => 
            array (
                'id' => 7,
                'order_id' => 2,
                'food_id' => 5,
                'piece' => 1,
                'created_at' => '2025-11-20 10:25:46',
                'updated_at' => '2025-11-20 10:25:46',
            ),
            7 => 
            array (
                'id' => 8,
                'order_id' => 3,
                'food_id' => 1,
                'piece' => 1,
                'created_at' => '2025-11-20 10:27:50',
                'updated_at' => '2025-11-20 10:27:50',
            ),
            8 => 
            array (
                'id' => 9,
                'order_id' => 3,
                'food_id' => 2,
                'piece' => 4,
                'created_at' => '2025-11-20 10:27:50',
                'updated_at' => '2025-11-20 10:27:50',
            ),
            9 => 
            array (
                'id' => 10,
                'order_id' => 4,
                'food_id' => 1,
                'piece' => 3,
                'created_at' => '2025-11-20 10:29:01',
                'updated_at' => '2025-11-20 10:29:05',
            ),
            10 => 
            array (
                'id' => 11,
                'order_id' => 4,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2025-11-20 10:29:03',
                'updated_at' => '2025-11-20 10:29:03',
            ),
            11 => 
            array (
                'id' => 12,
                'order_id' => 5,
                'food_id' => 1,
                'piece' => 2,
                'created_at' => '2025-11-20 13:52:42',
                'updated_at' => '2025-11-21 08:40:22',
            ),
            12 => 
            array (
                'id' => 13,
                'order_id' => 5,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2025-11-20 13:52:43',
                'updated_at' => '2025-11-20 13:52:43',
            ),
            13 => 
            array (
                'id' => 14,
                'order_id' => 5,
                'food_id' => 4,
                'piece' => 1,
                'created_at' => '2025-11-21 08:40:23',
                'updated_at' => '2025-11-21 08:40:23',
            ),
            14 => 
            array (
                'id' => 15,
                'order_id' => 5,
                'food_id' => 6,
                'piece' => 1,
                'created_at' => '2025-11-21 08:40:25',
                'updated_at' => '2025-11-21 08:40:25',
            ),
            15 => 
            array (
                'id' => 16,
                'order_id' => 5,
                'food_id' => 7,
                'piece' => 1,
                'created_at' => '2025-11-21 08:40:25',
                'updated_at' => '2025-11-21 08:40:25',
            ),
            16 => 
            array (
                'id' => 17,
                'order_id' => 5,
                'food_id' => 8,
                'piece' => 1,
                'created_at' => '2025-11-21 08:40:27',
                'updated_at' => '2025-11-21 08:40:27',
            ),
            17 => 
            array (
                'id' => 18,
                'order_id' => 5,
                'food_id' => 9,
                'piece' => 1,
                'created_at' => '2025-11-21 08:40:28',
                'updated_at' => '2025-11-21 08:40:28',
            ),
            18 => 
            array (
                'id' => 19,
                'order_id' => 6,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2025-11-21 08:40:34',
                'updated_at' => '2025-11-21 08:40:34',
            ),
            19 => 
            array (
                'id' => 20,
                'order_id' => 6,
                'food_id' => 3,
                'piece' => 1,
                'created_at' => '2025-11-21 08:40:35',
                'updated_at' => '2025-11-21 08:40:35',
            ),
            20 => 
            array (
                'id' => 21,
                'order_id' => 6,
                'food_id' => 4,
                'piece' => 1,
                'created_at' => '2025-11-21 08:40:36',
                'updated_at' => '2025-11-21 08:40:36',
            ),
            21 => 
            array (
                'id' => 22,
                'order_id' => 6,
                'food_id' => 5,
                'piece' => 1,
                'created_at' => '2025-11-21 08:40:37',
                'updated_at' => '2025-11-21 08:40:37',
            ),
            22 => 
            array (
                'id' => 23,
                'order_id' => 6,
                'food_id' => 6,
                'piece' => 1,
                'created_at' => '2025-11-21 08:40:38',
                'updated_at' => '2025-11-21 08:40:38',
            ),
            23 => 
            array (
                'id' => 24,
                'order_id' => 7,
                'food_id' => 11,
                'piece' => 3,
                'created_at' => '2025-11-21 09:40:55',
                'updated_at' => '2025-11-21 09:40:55',
            ),
            24 => 
            array (
                'id' => 25,
                'order_id' => 7,
                'food_id' => 5,
                'piece' => 1,
                'created_at' => '2025-11-21 09:40:55',
                'updated_at' => '2025-11-21 09:40:55',
            ),
            25 => 
            array (
                'id' => 26,
                'order_id' => 7,
                'food_id' => 4,
                'piece' => 1,
                'created_at' => '2025-11-21 09:40:55',
                'updated_at' => '2025-11-21 09:40:55',
            ),
            26 => 
            array (
                'id' => 27,
                'order_id' => 8,
                'food_id' => 1,
                'piece' => 1,
                'created_at' => '2025-11-21 10:06:34',
                'updated_at' => '2025-11-21 10:06:34',
            ),
            27 => 
            array (
                'id' => 28,
                'order_id' => 8,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2025-11-21 10:06:34',
                'updated_at' => '2025-11-21 10:06:34',
            ),
            28 => 
            array (
                'id' => 29,
                'order_id' => 8,
                'food_id' => 3,
                'piece' => 1,
                'created_at' => '2025-11-21 10:06:35',
                'updated_at' => '2025-11-21 10:06:35',
            ),
            29 => 
            array (
                'id' => 30,
                'order_id' => 8,
                'food_id' => 4,
                'piece' => 1,
                'created_at' => '2025-11-21 10:06:36',
                'updated_at' => '2025-11-21 10:06:36',
            ),
            30 => 
            array (
                'id' => 31,
                'order_id' => 8,
                'food_id' => 5,
                'piece' => 1,
                'created_at' => '2025-11-21 10:06:37',
                'updated_at' => '2025-11-21 10:06:37',
            ),
            31 => 
            array (
                'id' => 32,
                'order_id' => 8,
                'food_id' => 6,
                'piece' => 1,
                'created_at' => '2025-11-21 10:06:38',
                'updated_at' => '2025-11-21 10:06:38',
            ),
            32 => 
            array (
                'id' => 33,
                'order_id' => 9,
                'food_id' => 1,
                'piece' => 2,
                'created_at' => '2025-11-28 13:28:55',
                'updated_at' => '2025-11-28 13:28:57',
            ),
            33 => 
            array (
                'id' => 34,
                'order_id' => 9,
                'food_id' => 6,
                'piece' => 1,
                'created_at' => '2025-11-28 13:29:00',
                'updated_at' => '2025-11-28 13:29:00',
            ),
            34 => 
            array (
                'id' => 35,
                'order_id' => 9,
                'food_id' => 8,
                'piece' => 1,
                'created_at' => '2025-11-28 13:29:03',
                'updated_at' => '2025-11-28 13:29:03',
            ),
            35 => 
            array (
                'id' => 36,
                'order_id' => 9,
                'food_id' => 5,
                'piece' => 1,
                'created_at' => '2025-11-28 13:29:06',
                'updated_at' => '2025-11-28 13:29:06',
            ),
            36 => 
            array (
                'id' => 37,
                'order_id' => 10,
                'food_id' => 1,
                'piece' => 3,
                'created_at' => '2025-11-28 13:31:05',
                'updated_at' => '2025-11-28 13:31:05',
            ),
            37 => 
            array (
                'id' => 38,
                'order_id' => 10,
                'food_id' => 9,
                'piece' => 1,
                'created_at' => '2025-11-28 13:31:05',
                'updated_at' => '2025-11-28 13:31:05',
            ),
            38 => 
            array (
                'id' => 39,
                'order_id' => 10,
                'food_id' => 2,
                'piece' => 2,
                'created_at' => '2025-11-28 13:31:05',
                'updated_at' => '2025-11-28 13:31:05',
            ),
            39 => 
            array (
                'id' => 40,
                'order_id' => 10,
                'food_id' => 4,
                'piece' => 2,
                'created_at' => '2025-11-28 13:31:05',
                'updated_at' => '2025-11-28 13:31:05',
            ),
            40 => 
            array (
                'id' => 53,
                'order_id' => 11,
                'food_id' => 1,
                'piece' => 1,
                'created_at' => '2025-12-10 09:54:13',
                'updated_at' => '2025-12-10 09:54:13',
            ),
            41 => 
            array (
                'id' => 54,
                'order_id' => 11,
                'food_id' => 3,
                'piece' => 1,
                'created_at' => '2025-12-10 09:59:50',
                'updated_at' => '2025-12-10 09:59:50',
            ),
            42 => 
            array (
                'id' => 55,
                'order_id' => 11,
                'food_id' => 4,
                'piece' => 1,
                'created_at' => '2025-12-10 09:59:51',
                'updated_at' => '2025-12-10 09:59:51',
            ),
            43 => 
            array (
                'id' => 56,
                'order_id' => 11,
                'food_id' => 11,
                'piece' => 1,
                'created_at' => '2025-12-10 10:00:04',
                'updated_at' => '2025-12-10 10:00:04',
            ),
            44 => 
            array (
                'id' => 57,
                'order_id' => 12,
                'food_id' => 3,
                'piece' => 4,
                'created_at' => '2025-12-10 10:40:36',
                'updated_at' => '2025-12-10 10:43:46',
            ),
            45 => 
            array (
                'id' => 58,
                'order_id' => 12,
                'food_id' => 4,
                'piece' => 4,
                'created_at' => '2025-12-10 10:40:37',
                'updated_at' => '2025-12-10 10:45:51',
            ),
            46 => 
            array (
                'id' => 59,
                'order_id' => 12,
                'food_id' => 1,
                'piece' => 2,
                'created_at' => '2025-12-10 10:40:39',
                'updated_at' => '2025-12-10 10:45:53',
            ),
            47 => 
            array (
                'id' => 60,
                'order_id' => 13,
                'food_id' => 4,
                'piece' => 1,
                'created_at' => '2025-12-10 11:01:14',
                'updated_at' => '2025-12-10 11:01:14',
            ),
            48 => 
            array (
                'id' => 61,
                'order_id' => 13,
                'food_id' => 8,
                'piece' => 1,
                'created_at' => '2025-12-10 11:01:15',
                'updated_at' => '2025-12-10 11:01:15',
            ),
            49 => 
            array (
                'id' => 62,
                'order_id' => 13,
                'food_id' => 7,
                'piece' => 1,
                'created_at' => '2025-12-10 11:01:16',
                'updated_at' => '2025-12-10 11:01:16',
            ),
            50 => 
            array (
                'id' => 63,
                'order_id' => 13,
                'food_id' => 3,
                'piece' => 1,
                'created_at' => '2025-12-10 11:01:17',
                'updated_at' => '2025-12-10 11:01:17',
            ),
            51 => 
            array (
                'id' => 64,
                'order_id' => 14,
                'food_id' => 1,
                'piece' => 1,
                'created_at' => '2025-12-10 11:18:57',
                'updated_at' => '2025-12-10 11:18:57',
            ),
            52 => 
            array (
                'id' => 65,
                'order_id' => 14,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2025-12-10 11:18:58',
                'updated_at' => '2025-12-10 11:18:58',
            ),
            53 => 
            array (
                'id' => 66,
                'order_id' => 14,
                'food_id' => 3,
                'piece' => 1,
                'created_at' => '2025-12-10 11:18:59',
                'updated_at' => '2025-12-10 11:18:59',
            ),
            54 => 
            array (
                'id' => 67,
                'order_id' => 14,
                'food_id' => 4,
                'piece' => 1,
                'created_at' => '2025-12-10 11:18:59',
                'updated_at' => '2025-12-10 11:18:59',
            ),
            55 => 
            array (
                'id' => 75,
                'order_id' => 17,
                'food_id' => 5,
                'piece' => 1,
                'created_at' => '2025-12-10 12:30:20',
                'updated_at' => '2025-12-10 12:30:20',
            ),
            56 => 
            array (
                'id' => 76,
                'order_id' => 17,
                'food_id' => 1,
                'piece' => 1,
                'created_at' => '2025-12-10 12:30:22',
                'updated_at' => '2025-12-10 12:30:22',
            ),
            57 => 
            array (
                'id' => 77,
                'order_id' => 17,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2025-12-10 12:30:24',
                'updated_at' => '2025-12-10 12:30:24',
            ),
            58 => 
            array (
                'id' => 78,
                'order_id' => 17,
                'food_id' => 8,
                'piece' => 1,
                'created_at' => '2025-12-10 12:30:41',
                'updated_at' => '2025-12-10 12:30:41',
            ),
            59 => 
            array (
                'id' => 79,
                'order_id' => 18,
                'food_id' => 9,
                'piece' => 1,
                'created_at' => '2025-12-10 13:36:58',
                'updated_at' => '2025-12-10 13:36:58',
            ),
            60 => 
            array (
                'id' => 80,
                'order_id' => 18,
                'food_id' => 10,
                'piece' => 1,
                'created_at' => '2025-12-10 13:36:59',
                'updated_at' => '2025-12-10 13:36:59',
            ),
            61 => 
            array (
                'id' => 81,
                'order_id' => 18,
                'food_id' => 11,
                'piece' => 1,
                'created_at' => '2025-12-10 13:36:59',
                'updated_at' => '2025-12-10 13:36:59',
            ),
            62 => 
            array (
                'id' => 82,
                'order_id' => 18,
                'food_id' => 12,
                'piece' => 1,
                'created_at' => '2025-12-10 13:37:00',
                'updated_at' => '2025-12-10 13:37:00',
            ),
            63 => 
            array (
                'id' => 83,
                'order_id' => 19,
                'food_id' => 7,
                'piece' => 1,
                'created_at' => '2025-12-10 13:37:03',
                'updated_at' => '2025-12-10 13:37:03',
            ),
            64 => 
            array (
                'id' => 84,
                'order_id' => 19,
                'food_id' => 6,
                'piece' => 1,
                'created_at' => '2025-12-10 13:37:03',
                'updated_at' => '2025-12-10 13:37:03',
            ),
            65 => 
            array (
                'id' => 85,
                'order_id' => 19,
                'food_id' => 5,
                'piece' => 1,
                'created_at' => '2025-12-10 13:37:04',
                'updated_at' => '2025-12-10 13:37:04',
            ),
            66 => 
            array (
                'id' => 86,
                'order_id' => 19,
                'food_id' => 8,
                'piece' => 1,
                'created_at' => '2025-12-10 13:37:04',
                'updated_at' => '2025-12-10 13:37:04',
            ),
            67 => 
            array (
                'id' => 87,
                'order_id' => 19,
                'food_id' => 4,
                'piece' => 1,
                'created_at' => '2025-12-10 13:37:05',
                'updated_at' => '2025-12-10 13:37:05',
            ),
            68 => 
            array (
                'id' => 88,
                'order_id' => 20,
                'food_id' => 1,
                'piece' => 1,
                'created_at' => '2025-12-10 13:42:23',
                'updated_at' => '2025-12-10 13:42:23',
            ),
            69 => 
            array (
                'id' => 89,
                'order_id' => 20,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2025-12-10 13:42:24',
                'updated_at' => '2025-12-10 13:42:24',
            ),
            70 => 
            array (
                'id' => 90,
                'order_id' => 20,
                'food_id' => 5,
                'piece' => 1,
                'created_at' => '2025-12-10 13:42:25',
                'updated_at' => '2025-12-10 13:42:25',
            ),
            71 => 
            array (
                'id' => 91,
                'order_id' => 20,
                'food_id' => 6,
                'piece' => 1,
                'created_at' => '2025-12-10 13:42:28',
                'updated_at' => '2025-12-10 13:42:28',
            ),
            72 => 
            array (
                'id' => 92,
                'order_id' => 20,
                'food_id' => 12,
                'piece' => 1,
                'created_at' => '2025-12-10 13:42:31',
                'updated_at' => '2025-12-10 13:42:31',
            ),
            73 => 
            array (
                'id' => 93,
                'order_id' => 21,
                'food_id' => 1,
                'piece' => 2,
                'created_at' => '2025-12-10 13:44:53',
                'updated_at' => '2025-12-10 13:48:45',
            ),
            74 => 
            array (
                'id' => 94,
                'order_id' => 21,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2025-12-10 13:44:54',
                'updated_at' => '2025-12-10 13:44:54',
            ),
            75 => 
            array (
                'id' => 95,
                'order_id' => 21,
                'food_id' => 7,
                'piece' => 1,
                'created_at' => '2025-12-10 13:44:56',
                'updated_at' => '2025-12-10 13:44:56',
            ),
            76 => 
            array (
                'id' => 96,
                'order_id' => 21,
                'food_id' => 11,
                'piece' => 1,
                'created_at' => '2025-12-10 13:44:58',
                'updated_at' => '2025-12-10 13:44:58',
            ),
            77 => 
            array (
                'id' => 97,
                'order_id' => 22,
                'food_id' => 3,
                'piece' => 1,
                'created_at' => '2025-12-11 06:40:15',
                'updated_at' => '2025-12-11 06:40:15',
            ),
            78 => 
            array (
                'id' => 98,
                'order_id' => 22,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2025-12-11 06:40:15',
                'updated_at' => '2025-12-11 06:40:15',
            ),
            79 => 
            array (
                'id' => 99,
                'order_id' => 22,
                'food_id' => 1,
                'piece' => 1,
                'created_at' => '2025-12-11 06:40:16',
                'updated_at' => '2025-12-11 06:40:16',
            ),
            80 => 
            array (
                'id' => 100,
                'order_id' => 22,
                'food_id' => 4,
                'piece' => 1,
                'created_at' => '2025-12-11 06:40:16',
                'updated_at' => '2025-12-11 06:40:16',
            ),
            81 => 
            array (
                'id' => 101,
                'order_id' => 22,
                'food_id' => 8,
                'piece' => 1,
                'created_at' => '2025-12-11 06:40:17',
                'updated_at' => '2025-12-11 06:40:17',
            ),
            82 => 
            array (
                'id' => 102,
                'order_id' => 22,
                'food_id' => 7,
                'piece' => 1,
                'created_at' => '2025-12-11 06:40:17',
                'updated_at' => '2025-12-11 06:40:17',
            ),
            83 => 
            array (
                'id' => 103,
                'order_id' => 22,
                'food_id' => 6,
                'piece' => 1,
                'created_at' => '2025-12-11 06:40:18',
                'updated_at' => '2025-12-11 06:40:18',
            ),
            84 => 
            array (
                'id' => 104,
                'order_id' => 22,
                'food_id' => 5,
                'piece' => 1,
                'created_at' => '2025-12-11 06:40:18',
                'updated_at' => '2025-12-11 06:40:18',
            ),
            85 => 
            array (
                'id' => 105,
                'order_id' => 23,
                'food_id' => 1,
                'piece' => 1,
                'created_at' => '2025-12-11 07:09:47',
                'updated_at' => '2025-12-11 07:09:47',
            ),
            86 => 
            array (
                'id' => 106,
                'order_id' => 23,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2025-12-11 07:09:47',
                'updated_at' => '2025-12-11 07:09:47',
            ),
            87 => 
            array (
                'id' => 107,
                'order_id' => 23,
                'food_id' => 3,
                'piece' => 1,
                'created_at' => '2025-12-11 07:09:48',
                'updated_at' => '2025-12-11 07:09:48',
            ),
            88 => 
            array (
                'id' => 108,
                'order_id' => 23,
                'food_id' => 7,
                'piece' => 4,
                'created_at' => '2025-12-11 07:09:48',
                'updated_at' => '2025-12-11 07:09:50',
            ),
            89 => 
            array (
                'id' => 109,
                'order_id' => 23,
                'food_id' => 6,
                'piece' => 1,
                'created_at' => '2025-12-11 07:09:49',
                'updated_at' => '2025-12-11 07:09:49',
            ),
            90 => 
            array (
                'id' => 110,
                'order_id' => 24,
                'food_id' => 1,
                'piece' => 1,
                'created_at' => '2025-12-11 08:13:47',
                'updated_at' => '2025-12-11 08:13:47',
            ),
            91 => 
            array (
                'id' => 111,
                'order_id' => 24,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2025-12-11 08:13:48',
                'updated_at' => '2025-12-11 08:13:48',
            ),
            92 => 
            array (
                'id' => 112,
                'order_id' => 24,
                'food_id' => 3,
                'piece' => 1,
                'created_at' => '2025-12-11 08:13:48',
                'updated_at' => '2025-12-11 08:13:48',
            ),
            93 => 
            array (
                'id' => 113,
                'order_id' => 24,
                'food_id' => 7,
                'piece' => 1,
                'created_at' => '2025-12-11 08:13:49',
                'updated_at' => '2025-12-11 08:13:49',
            ),
            94 => 
            array (
                'id' => 114,
                'order_id' => 24,
                'food_id' => 6,
                'piece' => 1,
                'created_at' => '2025-12-11 08:13:49',
                'updated_at' => '2025-12-11 08:13:49',
            ),
            95 => 
            array (
                'id' => 115,
                'order_id' => 24,
                'food_id' => 13,
                'piece' => 1,
                'created_at' => '2025-12-11 08:13:50',
                'updated_at' => '2025-12-11 08:13:50',
            ),
            96 => 
            array (
                'id' => 116,
                'order_id' => 25,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2025-12-11 08:46:01',
                'updated_at' => '2025-12-11 08:46:01',
            ),
            97 => 
            array (
                'id' => 117,
                'order_id' => 25,
                'food_id' => 13,
                'piece' => 1,
                'created_at' => '2025-12-11 08:48:52',
                'updated_at' => '2025-12-11 08:48:52',
            ),
            98 => 
            array (
                'id' => 118,
                'order_id' => 26,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2025-12-11 13:40:24',
                'updated_at' => '2025-12-11 13:40:24',
            ),
            99 => 
            array (
                'id' => 119,
                'order_id' => 26,
                'food_id' => 1,
                'piece' => 1,
                'created_at' => '2025-12-11 13:40:29',
                'updated_at' => '2025-12-11 13:40:29',
            ),
            100 => 
            array (
                'id' => 120,
                'order_id' => 26,
                'food_id' => 4,
                'piece' => 1,
                'created_at' => '2025-12-11 13:40:30',
                'updated_at' => '2025-12-11 13:40:30',
            ),
            101 => 
            array (
                'id' => 121,
                'order_id' => 26,
                'food_id' => 7,
                'piece' => 1,
                'created_at' => '2025-12-11 13:40:31',
                'updated_at' => '2025-12-11 13:40:31',
            ),
            102 => 
            array (
                'id' => 122,
                'order_id' => 27,
                'food_id' => 11,
                'piece' => 1,
                'created_at' => '2025-12-11 13:58:54',
                'updated_at' => '2025-12-11 13:58:54',
            ),
            103 => 
            array (
                'id' => 123,
                'order_id' => 27,
                'food_id' => 8,
                'piece' => 1,
                'created_at' => '2025-12-11 13:58:54',
                'updated_at' => '2025-12-11 13:58:54',
            ),
            104 => 
            array (
                'id' => 124,
                'order_id' => 28,
                'food_id' => 1,
                'piece' => 1,
                'created_at' => '2025-12-27 23:28:39',
                'updated_at' => '2025-12-27 23:28:39',
            ),
            105 => 
            array (
                'id' => 125,
                'order_id' => 28,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2025-12-27 23:28:40',
                'updated_at' => '2025-12-27 23:28:40',
            ),
            106 => 
            array (
                'id' => 126,
                'order_id' => 28,
                'food_id' => 3,
                'piece' => 1,
                'created_at' => '2025-12-27 23:28:41',
                'updated_at' => '2025-12-27 23:28:41',
            ),
            107 => 
            array (
                'id' => 127,
                'order_id' => 28,
                'food_id' => 4,
                'piece' => 1,
                'created_at' => '2025-12-27 23:28:42',
                'updated_at' => '2025-12-27 23:28:42',
            ),
            108 => 
            array (
                'id' => 128,
                'order_id' => 28,
                'food_id' => 8,
                'piece' => 1,
                'created_at' => '2025-12-27 23:28:43',
                'updated_at' => '2025-12-27 23:28:43',
            ),
            109 => 
            array (
                'id' => 129,
                'order_id' => 29,
                'food_id' => 13,
                'piece' => 1,
                'created_at' => '2026-01-05 12:37:19',
                'updated_at' => '2026-01-05 12:37:19',
            ),
            110 => 
            array (
                'id' => 134,
                'order_id' => 29,
                'food_id' => 4,
                'piece' => 6,
                'created_at' => '2026-01-05 17:47:35',
                'updated_at' => '2026-01-05 17:49:04',
            ),
            111 => 
            array (
                'id' => 135,
                'order_id' => 29,
                'food_id' => 1,
                'piece' => 3,
                'created_at' => '2026-01-05 17:48:33',
                'updated_at' => '2026-01-05 17:48:38',
            ),
            112 => 
            array (
                'id' => 136,
                'order_id' => 29,
                'food_id' => 2,
                'piece' => 1,
                'created_at' => '2026-01-05 17:48:42',
                'updated_at' => '2026-01-05 17:48:42',
            ),
            113 => 
            array (
                'id' => 137,
                'order_id' => 29,
                'food_id' => 6,
                'piece' => 1,
                'created_at' => '2026-01-05 17:49:20',
                'updated_at' => '2026-01-05 17:49:20',
            ),
            114 => 
            array (
                'id' => 138,
                'order_id' => 29,
                'food_id' => 5,
                'piece' => 1,
                'created_at' => '2026-01-05 17:52:50',
                'updated_at' => '2026-01-05 17:52:50',
            ),
        ));
        
        
    }
}