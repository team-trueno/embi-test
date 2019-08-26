<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'detalle', 'correcta', 'pregunta_id'
    ];

    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta', 'pregunta_id');
    }
}
