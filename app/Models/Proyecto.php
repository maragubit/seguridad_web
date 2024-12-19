<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

}
