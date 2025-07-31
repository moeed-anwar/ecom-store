<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
          $users =[ [
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => Hash::make('user'),
            'role' => 'user',
        ],
        [
             'name' => 'Admin',
             'email' => 'admin@admin.com',
             'password' => Hash::make('admin'),
             'role' => 'admin',   
        ]
    ];
    foreach ($users as $user) {
        User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => $user['password'],
            'role' => $user['role'],
        ]);
    }
}
}
