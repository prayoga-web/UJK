<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user admin default
        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@123.com',
            'role' => 'admin',
        ]);

        // Buat user biasa untuk testing
        \App\Models\User::factory()->create([
            'name' => 'User Biasa',
            'email' => 'user@123.com',
            'role' => 'user',
        ]);

        // Buat beberapa user biasa tambahan dengan email random
        \App\Models\User::factory(5)->create([
            'role' => 'user',
        ]);
    }
}
