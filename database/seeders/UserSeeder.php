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
        // Create admin using factory override
        User::factory()->create([
            'name' => 'Root Admin',
            'email' => 'admin@example.com',
            'role' => 1, // admin
        ]);

        // Create 5 normal users
        User::factory(5)->create();
    }
}
