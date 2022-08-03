<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $userSuperadmin = User::create(
            array (
                'nombre' => 'admin',
                'primer_apellido' => 'panel',
                'cve_usuario' => '0000000001',
                'usuario' => 'admin',
                'email' => 'correo@correo.com',
                'password' => Hash::make('12345678'),
                'cambiar_password' => false,
                'area' => 'AADP000001',
                'estatus' => true,
                'created_at' => now(),
                'updated_at' => now()
            )
        );

        $userSuperadmin->assignRole('SuperAdmin');

    }
}
