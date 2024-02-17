<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'branch_name' => 'Fairview',
            'username' => 'admin-Fairview',
            'branch_email' => 'Fairview@example.com',
            'branch_number' => '09123456789',
            'branch_location' => '168 Gen. Luna Street, Malabon, Metro Manila',
            'password' => Hash::make('admin'),
        ]);

        \App\Models\User::create([
            'branch_name' => 'Malabon',
            'username' => 'admin-Malabon',
            'branch_email' => 'Malabon@example.com',
            'branch_number' => '09123456789',
            'branch_location' => 'Malabon',
            'password' => Hash::make('admin'),
        ]);
    }
}
