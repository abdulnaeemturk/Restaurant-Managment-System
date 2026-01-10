<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
            $this->call([
            UserSeeder::class,
            RestaurantFoodCategoriesTableSeeder::class,
            RestaurantFoodTableSeeder::class,
            RestaurantFoodDetailsTableSeeder::class,
            RestaurantTableLocationsTableSeeder::class,
            RestaurantTablesTableSeeder::class,
            RestaurantOrdersTableSeeder::class,
            RestaurantOrderDetailsTableSeeder::class,
            RestaurantLinkTableUsersTableSeeder::class,
            AttachablesTableSeeder::class,
            TemporaryOrdersTableSeeder::class,
            ]);

        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);

    }
}
