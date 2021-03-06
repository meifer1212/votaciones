<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'identificacion',
        'nombre',
    ];
    // para este sistema de prueba, no se requieren mas relaciones, aunque si es un sistema de votaciones mas grandes, si requiere.
}
