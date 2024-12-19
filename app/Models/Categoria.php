<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
        'url',
    ];

    public function user():HasOne
    {
        return $this->hasOne(User::class);
    }
}
