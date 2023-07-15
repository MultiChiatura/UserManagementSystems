<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesData = [
            [
                'id' => 1,
                'name' => 'admin'
            ],
            [
                'id' => 2,
                'name' => 'manager'
            ],
            [
                'id' => 3,
                'name' => 'user'
            ]
        ];

        foreach ($rolesData as $roleData) {
            Role::firstOrCreate($roleData);
        }
    }
}
