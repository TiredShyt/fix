<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

      // Find this block and update the keys:
        User::factory()->create([
            'firstName' => 'Test',
            'lastName' => 'User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Use bcrypt to hash the password
            'user_id' => 'admin_001',
            'role' => 'admin', // Add any other required fields like role
        ]);
    }
}
