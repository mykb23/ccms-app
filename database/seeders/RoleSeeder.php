<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            ['id' => 1, 'name' => 'Admin'],
            ['id' => 2, 'name' => 'Supervisor'],
            ['id' => 3, 'name' => 'User'],
        ];
        Role::insert($role);
    }
}
