<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Herramienta extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'documentación',
    ];

    //relación de asociación herramienta con prueba
    function pruebas():HasMany
    {
        return $this->hasMany(Prueba::class);
    }
}
