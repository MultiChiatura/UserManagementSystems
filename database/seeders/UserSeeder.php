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
        $usersData = [
            [
                'check' => [
                    'email' => 'admin@gmail.com'
                ],
                'data' => [
                    'role_id' => 1,
                    'name' => 'Admin Adminadze',
                    'position' => 'System Administrator',
                    'phone' => 555999888,
                    'address' => 'Georgia, Tbilisi',
                    'email_verified_at' => now(),
                    'password' => Hash::make('admin')
                ]
            ],
            [
                'check' => [
                    'email' => 'manager@gmail.com'
                ],
                'data' => [
                    'role_id' => 2,
                    'name' => 'Manager Manageradze',
                    'position' => 'System Manager',
                    'phone' => 555444333,
                    'address' => 'Georgia, Tbilisi',
                    'email_verified_at' => now(),
                    'password' => Hash::make('manager')
                ]
            ],
            [
                'check' => [
                    'email' => 'user@gmail.com'
                ],
                'data' => [
                    'role_id' => 3,
                    'name' => 'User Useradze',
                    'position' => 'System User',
                    'phone' => 555777666,
                    'address' => 'Georgia, Tbilisi',
                    'email_verified_at' => now(),
                    'password' => Hash::make('user')
                ]
            ],
        ];

        foreach ($usersData as $userData) {
            User::firstOrCreate($userData['check'], $userData['data']);
        }
    }
}
