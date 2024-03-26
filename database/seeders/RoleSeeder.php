<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    private $roles = [
        ["admin", "Admin"],
        ["owner", "Owner"],
        ["dev", "Developer"],
        ["vendor", "Vendor"],
        ["cashier", "Cashier"],
        ["user", "User"],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->roles as $role) {
            \App\Models\Role::create([
                #  "id" => $role[0],
                "role_name" => $role[1],
            ]);
        }
    }
}