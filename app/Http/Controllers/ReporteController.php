<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function reporteReservasxClientes(){
        $clientes = Cliente::all();

        return view('reportes.reporteReservasxCliente',compact('clientes'));
    }
}
