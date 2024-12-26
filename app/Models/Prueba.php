<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Prueba extends Model
{
    protected $fillable = [
        'nombre',
        'referencia',
        'categoria_id',
        'objetivo',
    ];

    public function categoria():BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
    //relación de asociación herramienta con prueba
    function herramientas():BelongsToMany
    {
        return $this->belongsToMany(Herramienta::class);
    }
    public function proyectos(): BelongsToMany
    {
        return $this->belongsToMany(Proyecto::class, 'proyecto_prueba')->withPivot('superada')->withTimestamps();
                         
    }
}
/* ejemplo de cómo acceder a la columna de la tabla pivote:
foreach ($proyecto->pruebas as $prueba) {
    echo "Prueba: {$prueba->id}, Superada: {$prueba->pivot->superada}";
} */