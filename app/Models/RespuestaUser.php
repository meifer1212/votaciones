<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaUser extends Model
{
    use HasFactory;

    //definimos la tabla.
    protected $table = 'respuestas_users';

    protected $fillable = [
        'user_identificacion',
        'pregunta_id',
        'respuesta_id',
    ];
    // para este sistema de prueba, no se requieren mas relaciones, aunque si es un sistema de votaciones mas grandes, si requiere.
}
