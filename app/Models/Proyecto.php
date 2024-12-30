<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Proyecto extends Model
{
    protected $fillable = [
        'nombre',
        'user_id',
        'url',
    ];

    //función de asociación con usuarios

    function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pruebas(): BelongsToMany
    {
        return $this->belongsToMany(Prueba::class, 'proyecto_prueba')->withPivot('superada')->withTimestamps();        
    }

}
