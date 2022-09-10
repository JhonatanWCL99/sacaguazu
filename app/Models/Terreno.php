<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terreno extends Model
{
    use HasFactory;
    protected $table="terrenos";

    protected $fillable=[
        'area_terreno',
        'descripcion',
        'direccion',
        'zona',
    ];

    public function fotos(){
        return $this->hasMany(Foto::class);
    }

    public function ubicacion(){
        return $this->hasOne(Ubicacion::class); 
    }
}
