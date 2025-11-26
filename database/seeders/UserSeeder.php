<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Root Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'role' => 1, // admin
            'email_verified_at' => Carbon::now(),
        ]);

        // Create 5 normal users
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "Normal User $i",
                'email' => "user$i@example.com",
                'password' => Hash::make('123456'),
                'role' => 2, // normal
                'email_verified_at' => Carbon::now(),
            ]);
        }
    }
}
