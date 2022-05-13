<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ClientesController extends Controller
{
    public function index()
    {
        return view('admin.clientes.lista_clientes');
    }

    public function lista_clientes(){
        $clientes = Cliente::all();
        return DataTables::of($clientes)->toJson();
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        $user = User::findOrFail($cliente->user_id);
        return view('admin.clientes.detalle_cliente', compact('cliente', 'user'));
    }
}
