<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = ['detalle', 'correcta', 'pregunta_id'];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'pregunta_id');
    }
}
