<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoPrueba extends Model
{
    
    protected $table = 'proyecto_prueba'; // Nombre de la tabla

    // Si la tabla tiene claves primarias personalizadas, indícalas aquí
    protected $primaryKey = 'id';
    protected $guarded = [];
}
