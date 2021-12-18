<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                // 'id'    => 1,
                'name' => 'admin_access',
            ],
            [
                // 'id'    => 2,
                'name' => 'supervisor_access',
            ],
            [
                // 'id'    => 3,
                'name' => 'ticket_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
