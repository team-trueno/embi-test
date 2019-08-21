<?php

namespace App;
use App\Respuesta;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = ['detalle', 'categoria_pregunta_id'];


    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'pregunta_id');
    }

    public function categoriaPregunta()
    {
        return $this->belongsTo(CategoriaPregunta::class, 'categoria_pregunta_id');
    }
}
