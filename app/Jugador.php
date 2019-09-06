<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jugadores';


    public function nivel()
    {
        return $this->belongsTo('App\Nivel', 'nivel_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
