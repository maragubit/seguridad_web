<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prueba extends Model
{
    protected $fillable = [
        'nombre',
        'categoria_id',
        'objetivo',
    ];

    public function categoria():HasOne
    {
        return $this->hasOne(Categoria::class);
    }
    //relación de asociación herramienta con prueba
    function herramientas():HasMany
    {
        return $this->hasMany(Herramienta::class);
    }
}
