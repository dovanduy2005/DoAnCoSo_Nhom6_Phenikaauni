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

        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
            ]
        );

        // Customer User
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('12345678'),
                'role' => 'customer',
            ]
        );

        $this->call([
            AdminSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            CarSeeder::class,
            ContractSeeder::class,
        ]);
    }
}
