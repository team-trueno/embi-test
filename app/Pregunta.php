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
        'detalle', 'completa', 'activa', 'categoria_pregunta_id',
    ];

    public function respuestas()
    {
        return $this->hasMany('App\Respuesta', 'pregunta_id');
    }

    public function categoriaPregunta()
    {
        return $this->belongsTo('App\CategoriaPregunta', 'categoria_pregunta_id');
    }

    public function addRespuesta($detalle)
    {
        $this->respuestas()->create(compact('detalle'));
    }

    public function completado($completa = true)
    {
        $this->update(compact('completa'));
    }

    public function activado($activa = true)
    {
        if ($this->completa) {
            $this->update(compact('activa'));
        } else {
            $this->update(['activa' => false]);
        }


    }


}
