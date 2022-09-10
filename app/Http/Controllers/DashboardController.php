<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function mostrar()
    {
        $fecha_actual = Carbon::now();

        $cardUser = $this->cardUsuario();
        $cardCliente = $this->cardCliente();
        $cardReserva = $this->cardReserva();
       
        return view('dashboard', compact('cardUser','cardCliente','cardReserva'));
    }

    public function cardUsuario(){
        $countUsers = $this->obtenerCantidadUsuarios(Carbon::now());
        $countUsersLastWeek = $this->obtenerCantidadUsuarios((Carbon::now())->subWeek());
        if ($countUsersLastWeek == 0) $porcentajeUsuarioNuevos = 100;
        if ($countUsers == 0) $porcentajeUsuarioNuevos = 0;
        if ($countUsersLastWeek != 0 && $countUsers != 0)
            $porcentajeUsuarioNuevos = 100 - ($countUsersLastWeek / $countUsers) * 100;
  
        return [
            'countUserNews'=>$countUsers,
            'porcentajeUsuarioNews'=>$porcentajeUsuarioNuevos,
        ];
    }

    public function cardCliente(){
        $countClientes = $this->obtenerCantidadClientes(Carbon::now());
        $countClientesLastDay = $this->obtenerCantidadClientes((Carbon::now())->subDay());
        if ($countClientesLastDay == 0) $porcentajeClienteNuevos = 100;
        if ($countClientes == 0) $porcentajeClienteNuevos = 0;
        if ($countClientesLastDay != 0 && $countClientes != 0)
            $porcentajeClienteNuevos = 100 - ($countClientesLastDay / $countClientes) * 100;
  
        return [
            'countClienteNews'=>$countClientes,
            'porcentajeClienteNews'=>$porcentajeClienteNuevos,
        ];
    }

    public function cardReserva(){
        $totalReservas = $this->obtenerTotalReserva(Carbon::now());
        $totalReservasLastMonth = $this->obtenerTotalReserva((Carbon::now())->subMonth());
        if ($totalReservasLastMonth == 0) $porcentajeTotalReservaNuevos = 100;
        if ($totalReservas == 0) $porcentajeTotalReservaNuevos = 0;
        if ($totalReservasLastMonth != 0 && $totalReservas != 0)
            $porcentajeTotalReservaNuevos = 100 - ($porcentajeTotalReservaNuevos / $totalReservas) * 100;
  
        return [
            'totalReservas'=>$totalReservas,
            'porcentajetotalReservas'=>$porcentajeTotalReservaNuevos,
        ];
    }

    public function obtenerCantidadUsuarios($fecha)
    {
        $fecha_fin = $fecha->toDateTimeString();
        $fecha_inicio = $fecha->startOfWeek()->toDateTimeString();
        $countUsers = User::whereBetween('created_at', [$fecha_inicio, $fecha_fin])->count();
        return $countUsers;
    }

    public function obtenerCantidadClientes($fecha)
    {
        $countClientes = Cliente::whereDate('created_at',$fecha)->count();
        return $countClientes;
    }

    public function obtenerTotalReserva($fecha)
    {
        $fecha_fin = $fecha->toDateTimeString();
        $fecha_inicio = $fecha->startOfMonth()->toDateTimeString();
        $countClientes = Reserva::whereBetween('created_at',[$fecha_inicio,$fecha_fin])->sum('total_cuota');
        return $countClientes;
    }
}
