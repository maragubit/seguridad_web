<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Prueba extends Model
{
    protected $fillable = [
        'nombre',
        'referencia',
        'categoria_id',
        'objetivo',
    ];

    public function categoria():HasOne
    {
        return $this->hasOne(Categoria::class);
    }
    //relación de asociación herramienta con prueba
    function herramientas():BelongsToMany
    {
        return $this->belongsToMany(Herramienta::class);
    }
}
