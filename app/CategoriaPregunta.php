<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaPregunta extends Model
{
    protected $fillable = ['detalle'];

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'categoria_pregunta_id');
    }
}
