<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'puntos_superar'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'niveles';


    public function jugadores()
    {
        return $this->hasMany('App\Jugador', 'nivel_id');
    }

}
