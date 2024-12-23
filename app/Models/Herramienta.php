<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Herramienta extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'documentación',
    ];

    //relación de asociación herramienta con prueba
    function pruebas():BelongsToMany
    {
        return $this->belongsToMany(Prueba::class);
    }
}
