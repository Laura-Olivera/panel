<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ClientesController extends Controller
{
    public function index()
    {
        return view('admin.clientes.lista_clientes');
    }

    public function lista_clientes(){
        $clientes = DB::table('clientes')
        ->join('users', 'clientes.user_id', '=', 'users.id')
        ->select('clientes.*', 'users.email', 'users.estatus')
        ->get();
        return DataTables::of($clientes)->toJson();
    }

    public function show($id)
    {
        $cliente = DB::table('clientes')
            ->join('users', 'clientes.user_id', '=', 'users.id')
            ->select('clientes.*', 'users.email','users.estatus')
            ->first();
        return view('admin.clientes.detalle_cliente', compact('cliente'));
    }
}
