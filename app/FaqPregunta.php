<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqPregunta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pregunta', 'respuesta',
    ];

    public function topico()
    {
        return $this->belongsTo('App\FaqTopico', 'faq_topico_id');
    }
}
