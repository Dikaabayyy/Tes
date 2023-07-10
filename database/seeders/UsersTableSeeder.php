<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
                    'name' => 'admin',
                    'username' => 'admin',
                    'email' => 'admin@gmail.com',
                    'role' => 'Admin',
                    'password' => Hash::make('123'),
                    'avatar' => 'profile.jpg',
        ]);
    }
}
