<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

        $role_superadmin = Role::create([
            'name' => 'SuperAdmin',
            'guard_name' =>'web',
            'descrip' => 'Perfil con privilegios de súper administrador.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $role_superadmin->givePermissionTo([
            'SuperAdmin'
        ]);
    }
}
