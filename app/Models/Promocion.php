<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;
    protected $table="promociones";

    protected $fillable=[
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'monto_descuento',
    ];
}
