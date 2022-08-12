<?php

namespace Database\Seeders;

use App\Models\Catalogos\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->delete();
        Area::create([
            'cve_area' => 'AADP000001',
            'nombre' => 'AREA DE PRUEBAS',
            'responsable' => 'ADMIN',
            'estatus' => true,
        ]);
    }
}
