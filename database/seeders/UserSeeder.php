<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'status' => 1,
            'user_type' => 'Admin',
            'password' => Hash::make('admin@admin.com'), // Change this!
        ]);

        //User::factory()->count(10)->create(); // optional fake users
    }
}