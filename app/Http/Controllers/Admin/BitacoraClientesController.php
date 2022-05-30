<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BitacoraClientesController extends Controller
{
    public function index()
    {
        return view('admin.bitacoras.bitacora_clientes');
    }

    public function listar_bitacora()
    {
        $bitacora = DB::table('bitacora_clientes')->get();
        foreach ($bitacora as $bit) {
            $bit->created_at = Carbon::parse($bit->created_at)->format('Y-m-d H:i');
        }
        return DataTables::of($bitacora)->toJson();
    }
}