<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqTopico extends Model
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
        return $this->hasMany('App\FaqPregunta', 'faq_topico_id');
    }
}
