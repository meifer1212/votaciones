<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;
    protected $fillable = [
        'pregunta_id',
        'respuesta',
    ];
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'pregunta_id', 'id');
    }
    // para este sistema de prueba, no se requieren mas relaciones, aunque si es un sistema de votaciones mas grandes, si requiere.
}
