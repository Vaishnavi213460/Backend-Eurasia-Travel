<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'first_name' => 'System',
                'last_name'  => 'Admin',
                'phone'      => '9999999999',
                'role'       => 'admin',
                'password'   => Hash::make('Admin123'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'first_name' => 'Test',
                'last_name'  => 'User',
                'phone'      => '8888888888',
                'role'       => 'user',
                'password'   => Hash::make('password123'),
            ]
        );
    }
}
