<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Attach all permissions to the admin role
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        // Attach supervisor and ticket access permissions to the supervisor role
        $supervisor_permissions = Permission::whereIn('id', [2, 3])->get();
        Role::findOrFail(2)->permissions()->sync($supervisor_permissions->pluck('id'));

        // Attach ticket permission to the user role
        $user_permissions = Permission::where('id', 3)->get();
        Role::findOrFail(3)->permissions()->sync($user_permissions);
    }
}
