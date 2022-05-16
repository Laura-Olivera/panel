<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('clientes')->delete();
        $cliente = Cliente::create(
            array(
                'user_id' => 2,
                'clave_cliente' => 'CG-0201CNT',
                'nombre_completo' => 'cliente',
                'telefono' => '1234567890',
                'slug' => 'CG-0201CNT',
                'tipo' => 'general',
                'created_at' => now(),
                'updated_at' => now()
            )
        );
    }
}
