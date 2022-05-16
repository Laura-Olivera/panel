<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        \DB::table('users')->delete();
        $userSuperadmin = User::create(
            array (
                'name' => 'superadmin',
                'email' => 'superadmin@correo.com',
                'password' => Hash::make('12345678'),
                'estatus' => 1,
                'created_at' => now(),
                'updated_at' => now()
            )
        );

        $userSuperadmin->assignRole('SuperAdmin');

        $userCliente = User::create(
            array(
                'name' => 'cliente',
                'email' => 'cliente@correo.com',
                'password' => Hash::make('12345678'),
                'estatus' => 1,
                'created_at' => now(),
                'updated_at' => now()
            )
        );

        $userCliente->assignRole('Cliente');
    }
}
