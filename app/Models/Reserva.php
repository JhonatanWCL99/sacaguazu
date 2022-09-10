<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table="reservas";

    protected $fillable= [
        'fecha',
        'estado',
        'fecha_inicio',
        'fecha_fin',
        'total_cuota',
        'user_id',
        'cliente_id',
        'tipo_pago_id',
        'promocion_id',
    ];

    public function detalleReservas(){
        return $this->hasMany(DetalleReserva::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tipo_pago(){
        return $this->belongsTo(TipoPago::class);
    }
}
