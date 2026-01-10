<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RestaurantFoodDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('restaurant_food_details')->delete();
        
        \DB::table('restaurant_food_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'food_id' => 1,
                'name' => 'abc',
                'description' => 'dshfjfhsdakhff klhf asdlk fhasd hsdalhdsaf',
                'created_at' => '2025-11-20 07:54:56',
                'updated_at' => '2025-11-20 07:54:56',
            ),
            1 => 
            array (
                'id' => 2,
                'food_id' => 1,
                'name' => 'new information',
                'description' => 'djkshfkhfakl hfdask lhjf hsdalkfjhdasfkj shaflkjahfasd',
                'created_at' => '2025-11-20 07:55:13',
                'updated_at' => '2025-11-20 07:55:13',
            ),
            2 => 
            array (
                'id' => 3,
                'food_id' => 1,
                'name' => 'cde',
                'description' => 'dskjlf slkö jads jsdaö jfasdj fdasfds fads fasf',
                'created_at' => '2025-11-20 07:55:23',
                'updated_at' => '2025-11-20 07:55:23',
            ),
            3 => 
            array (
                'id' => 4,
                'food_id' => 2,
                'name' => 'abc',
                'description' => 'sdkljf sdlajfdasljf jfdasölkjf dasö ljfasd',
                'created_at' => '2025-11-20 07:56:27',
                'updated_at' => '2025-11-20 07:56:27',
            ),
            4 => 
            array (
                'id' => 5,
                'food_id' => 2,
                'name' => 'cde',
                'description' => 'dsfhjasfhdasklf hakahdasf s',
                'created_at' => '2025-11-20 07:56:36',
                'updated_at' => '2025-11-20 07:56:36',
            ),
            5 => 
            array (
                'id' => 6,
                'food_id' => 3,
                'name' => 'abc',
                'description' => 'dskljf klajfaöjfdaskölfjdasöf',
                'created_at' => '2025-11-20 07:57:09',
                'updated_at' => '2025-11-20 07:57:09',
            ),
            6 => 
            array (
                'id' => 7,
                'food_id' => 3,
                'name' => 'cde',
                'description' => 'dsjkfhdalfhsda hfhsdjah fdlas hfdas fds f',
                'created_at' => '2025-11-20 07:57:17',
                'updated_at' => '2025-11-20 07:57:17',
            ),
            7 => 
            array (
                'id' => 8,
                'food_id' => 4,
                'name' => 'abc',
                'description' => 'sdjfkhdas fhalk hfasd hfdsajkfadsf',
                'created_at' => '2025-11-20 07:57:43',
                'updated_at' => '2025-11-20 07:57:43',
            ),
            8 => 
            array (
                'id' => 9,
                'food_id' => 4,
                'name' => 'cde',
                'description' => 'dsjkfhasdjf sdaklfh asdjlkf hadsjl ksdaf',
                'created_at' => '2025-11-20 07:57:51',
                'updated_at' => '2025-11-20 07:57:51',
            ),
            9 => 
            array (
                'id' => 10,
                'food_id' => 5,
                'name' => 'abc',
                'description' => 'djskhfhka hfsdahf sdaljh fsdalhjf sdah fds',
                'created_at' => '2025-11-20 07:58:19',
                'updated_at' => '2025-11-20 07:58:19',
            ),
            10 => 
            array (
                'id' => 11,
                'food_id' => 5,
                'name' => 'cde',
                'description' => 'jksdhfkh asdl hfl fsdla hsdlkj hfdsa kjhfdas',
                'created_at' => '2025-11-20 07:58:33',
                'updated_at' => '2025-11-20 07:58:33',
            ),
            11 => 
            array (
                'id' => 12,
                'food_id' => 6,
                'name' => 'abc',
                'description' => 'slkjf sdaljfsd af',
                'created_at' => '2025-11-20 07:58:57',
                'updated_at' => '2025-11-20 07:58:57',
            ),
            12 => 
            array (
                'id' => 13,
                'food_id' => 6,
                'name' => 'cde',
                'description' => 'jksdhfk hflasd hfasd hfasdl das',
                'created_at' => '2025-11-20 07:59:03',
                'updated_at' => '2025-11-20 07:59:03',
            ),
            13 => 
            array (
                'id' => 14,
                'food_id' => 7,
                'name' => 'abc',
                'description' => 'sjdkfh askhfasklhfdaslk',
                'created_at' => '2025-11-20 07:59:44',
                'updated_at' => '2025-11-20 07:59:44',
            ),
            14 => 
            array (
                'id' => 15,
                'food_id' => 7,
                'name' => 'cde',
                'description' => 'djksfhaslhsdakj hdsajlk hajflk as',
                'created_at' => '2025-11-20 07:59:49',
                'updated_at' => '2025-11-20 07:59:49',
            ),
            15 => 
            array (
                'id' => 16,
                'food_id' => 8,
                'name' => 'abc',
                'description' => 'jkdshfhlkahfsdajkhf',
                'created_at' => '2025-11-20 08:00:28',
                'updated_at' => '2025-11-20 08:00:28',
            ),
            16 => 
            array (
                'id' => 17,
                'food_id' => 8,
                'name' => 'cde',
                'description' => 'dsjkhf fhdaslfhsdalkfhsdalkfha',
                'created_at' => '2025-11-20 08:00:33',
                'updated_at' => '2025-11-20 08:00:33',
            ),
            17 => 
            array (
                'id' => 18,
                'food_id' => 11,
                'name' => 'abc',
                'description' => 'dksljflasdjf lösdaa',
                'created_at' => '2025-11-21 09:39:15',
                'updated_at' => '2025-11-21 09:39:15',
            ),
            18 => 
            array (
                'id' => 19,
                'food_id' => 11,
                'name' => 'dsafdasfa',
                'description' => 'dasfadsfas',
                'created_at' => '2025-11-21 09:39:18',
                'updated_at' => '2025-11-21 09:39:18',
            ),
            19 => 
            array (
                'id' => 20,
                'food_id' => 11,
                'name' => 'asdfasdf',
                'description' => 'sdafadsfads',
                'created_at' => '2025-11-21 09:39:20',
                'updated_at' => '2025-11-21 09:39:20',
            ),
            20 => 
            array (
                'id' => 21,
                'food_id' => 11,
                'name' => 'adsfadsfdas',
                'description' => 'dasfadsfads',
                'created_at' => '2025-11-21 09:39:22',
                'updated_at' => '2025-11-21 09:39:22',
            ),
            21 => 
            array (
                'id' => 22,
                'food_id' => 11,
                'name' => 'asdfdasfads',
                'description' => 'dasfasdfads',
                'created_at' => '2025-11-21 09:39:24',
                'updated_at' => '2025-11-21 09:39:24',
            ),
            22 => 
            array (
                'id' => 23,
                'food_id' => 11,
                'name' => 'adsfdasfas',
                'description' => 'sdafadsfas',
                'created_at' => '2025-11-21 09:39:26',
                'updated_at' => '2025-11-21 09:39:26',
            ),
            23 => 
            array (
                'id' => 24,
                'food_id' => 11,
                'name' => 'dasfdasfa',
                'description' => 'asdfadfdas',
                'created_at' => '2025-11-21 09:39:28',
                'updated_at' => '2025-11-21 09:39:28',
            ),
            24 => 
            array (
                'id' => 25,
                'food_id' => 11,
                'name' => 'adsfadsf',
                'description' => 'dsafdasfadsf',
                'created_at' => '2025-11-21 09:39:30',
                'updated_at' => '2025-11-21 09:39:30',
            ),
            25 => 
            array (
                'id' => 26,
                'food_id' => 11,
                'name' => 'asdfasdf',
                'description' => 'asdfdasfdasf',
                'created_at' => '2025-11-21 09:39:33',
                'updated_at' => '2025-11-21 09:39:33',
            ),
            26 => 
            array (
                'id' => 27,
                'food_id' => 11,
                'name' => 'asdfadsf',
                'description' => 'dasfadsfdasf',
                'created_at' => '2025-11-21 09:39:35',
                'updated_at' => '2025-11-21 09:39:35',
            ),
            27 => 
            array (
                'id' => 28,
                'food_id' => 11,
                'name' => 'adsfadsf',
                'description' => 'dasfadsf',
                'created_at' => '2025-11-21 09:39:37',
                'updated_at' => '2025-11-21 09:39:37',
            ),
            28 => 
            array (
                'id' => 29,
                'food_id' => 11,
                'name' => 'asdfdasf',
                'description' => 'dasfadsfads',
                'created_at' => '2025-11-21 09:39:40',
                'updated_at' => '2025-11-21 09:39:40',
            ),
            29 => 
            array (
                'id' => 30,
                'food_id' => 11,
                'name' => 'dasfadsfdasf',
                'description' => 'dasfasfads',
                'created_at' => '2025-11-21 09:39:42',
                'updated_at' => '2025-11-21 09:39:42',
            ),
            30 => 
            array (
                'id' => 31,
                'food_id' => 11,
                'name' => 'dasfdasfads',
                'description' => 'asdfasdfasdf',
                'created_at' => '2025-11-21 09:39:44',
                'updated_at' => '2025-11-21 09:39:44',
            ),
            31 => 
            array (
                'id' => 32,
                'food_id' => 11,
                'name' => 'adsfadsfa',
                'description' => 'sdafasdf',
                'created_at' => '2025-11-21 09:39:46',
                'updated_at' => '2025-11-21 09:39:46',
            ),
            32 => 
            array (
                'id' => 33,
                'food_id' => 12,
                'name' => 'abc',
                'description' => 'dasjkfhadslkfh daskf ha',
                'created_at' => '2025-11-28 13:33:39',
                'updated_at' => '2025-11-28 13:33:39',
            ),
            33 => 
            array (
                'id' => 34,
                'food_id' => 12,
                'name' => 'dfgsda dasg ads g',
                'description' => 'dvaddaads',
                'created_at' => '2025-11-28 13:33:43',
                'updated_at' => '2025-11-28 13:33:43',
            ),
            34 => 
            array (
                'id' => 35,
                'food_id' => 12,
                'name' => 'dsagfadsasd g',
                'description' => 'adsgasdgdafgd',
                'created_at' => '2025-11-28 13:33:45',
                'updated_at' => '2025-11-28 13:33:45',
            ),
            35 => 
            array (
                'id' => 36,
                'food_id' => 12,
                'name' => 'ewrewrew5435343',
                'description' => 'dsafdasfadsf',
                'created_at' => '2025-11-28 13:33:48',
                'updated_at' => '2025-11-28 13:33:48',
            ),
            36 => 
            array (
                'id' => 37,
                'food_id' => 1,
                'name' => '121221',
                'description' => '123123213',
                'created_at' => '2025-12-10 06:44:14',
                'updated_at' => '2025-12-10 06:44:14',
            ),
            37 => 
            array (
                'id' => 38,
                'food_id' => 1,
                'name' => '123213123',
                'description' => '213123213',
                'created_at' => '2025-12-10 06:44:17',
                'updated_at' => '2025-12-10 06:44:17',
            ),
            38 => 
            array (
                'id' => 39,
                'food_id' => 1,
                'name' => 'asdfasd1243213',
                'description' => 'sadas213213',
                'created_at' => '2025-12-10 06:44:22',
                'updated_at' => '2025-12-10 06:44:22',
            ),
            39 => 
            array (
                'id' => 40,
                'food_id' => 1,
                'name' => 'asdas23123',
                'description' => '12321ada',
                'created_at' => '2025-12-10 06:44:26',
                'updated_at' => '2025-12-10 06:44:26',
            ),
            40 => 
            array (
                'id' => 41,
                'food_id' => 1,
                'name' => '1235',
                'description' => 'kjhkj',
                'created_at' => '2025-12-10 06:44:37',
                'updated_at' => '2025-12-10 06:44:37',
            ),
            41 => 
            array (
                'id' => 42,
                'food_id' => 1,
                'name' => 'sdsa21321',
                'description' => 'asdasdas',
                'created_at' => '2025-12-10 06:44:41',
                'updated_at' => '2025-12-10 06:44:41',
            ),
            42 => 
            array (
                'id' => 43,
                'food_id' => 13,
                'name' => 'ajkshas hkhdas',
                'description' => 'Veg',
                'created_at' => '2025-12-11 08:13:03',
                'updated_at' => '2025-12-11 08:13:03',
            ),
            43 => 
            array (
                'id' => 44,
                'food_id' => 13,
                'name' => 'asdasdas',
                'description' => 'veg',
                'created_at' => '2025-12-11 08:13:09',
                'updated_at' => '2025-12-11 08:13:09',
            ),
        ));
        
        
    }
}