<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    protected $fillable = [
        'pregunta',
    ];

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'pregunta_id', 'id');
    }
    // para este sistema de prueba, no se requieren mas relaciones, aunque si es un sistema de votaciones mas grandes, si requiere.
}
