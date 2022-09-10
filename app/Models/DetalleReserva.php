<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleReserva extends Model
{
    use HasFactory;
    protected $table="detalles_reserva";

    protected $fillable = [
        'subtotal_cuota_inicial',
        'terreno_id',
        'reserva_id',
    ];

    public function terreno(){
        return $this->belongsTo(Terreno::class);
    }
}
