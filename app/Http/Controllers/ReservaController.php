<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleReserva;
use App\Models\Reserva;
use App\Models\Terreno;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::paginate(10);
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $terrenos = Terreno::all();
        $clientes = Cliente::all();
        return view('reservas.create', compact('terrenos', 'clientes'));
    }

    public function obtenerDatosTerreno(Request $request)
    {
        $terreno = Terreno::find($request->terreno_id);

        return response()->json([
            "terreno" => $terreno
        ]);
    }

    public function store(Request $request){
       
        $reserva = new Reserva();
        $reserva->fecha = Carbon::now();
        $reserva->estado = "P";
        $reserva->fecha_inicio = $request->fecha_inicio;
        $reserva->fecha_fin = $request->fecha_fin;
        $reserva->total_cuota = $this->calcularTotalReserva($request->subtotales);
        $reserva->user_id = Auth::user()->id;
        $reserva->cliente_id = $request->cliente_id;
        $reserva->save();

        foreach($request->terrenos as $index => $terreno){
            $detalleReserva = new DetalleReserva();
            $detalleReserva->subtotal_cuota_inicial = $request->subtotales[$index];
            $detalleReserva->terreno_id = $terreno;
            $detalleReserva->reserva_id = $reserva->id;
            $detalleReserva->save();
        }
        return redirect()->route('reservas.index');
    }

    public function show($id){
        $reserva = Reserva::find($id);

        return view('reservas.show',compact('reserva'));
    }

    public function calcularTotalReserva($subtotales){
        $total=0;
        foreach($subtotales as $subtotal){
            $total+=$subtotal;
        }
        return $total;
    }

    public function destroy($id){
        $reserva = Reserva::find($id);

        $reserva->delete();

        return redirect()->route('reservas.index');
    }
}
