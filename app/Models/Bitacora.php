<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;
    protected $table="bitacoras";

    protected $fillable = [
        'fecha_registro',
        'ip',
        'accion',
        'descripcion',
    ];
}
