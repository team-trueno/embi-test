<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaPregunta extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'detalle',
    ];

    public function preguntas()
    {
        return $this->hasMany('App\Pregunta', 'categoria_pregunta_id');
    }
}
