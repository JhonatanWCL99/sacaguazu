<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table="ventas";

    protected $fillable=[
        'fecha',
        'total',
        'user_id',
        'cliente_id',
        'tipo_pago_id',
        'promocion_id',
    ];
}
