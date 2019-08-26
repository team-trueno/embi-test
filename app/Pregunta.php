<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'detalle', 'categoria_pregunta_id',
    ];

    public function respuestas()
    {
        return $this->hasMany('App\Respuesta', 'pregunta_id');
    }

    public function categoriaPregunta()
    {
        return $this->belongsTo('App\CategoriaPregunta', 'categoria_pregunta_id');
    }
}
