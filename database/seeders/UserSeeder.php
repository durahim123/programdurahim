<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Users;

class UserSeeder extends Seeder
{
    public function run()
    {
        Users::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('123123'),
        ]);
    }
}
