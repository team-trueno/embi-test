<?php

use App\CategoriaPregunta;
use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriasData = [
            'Deporte',
            'Música',
            'Entretenimiento',
            'Borrachos',
            'Mundo',
        ];

        foreach ($categoriasData as $detalle) {
            $categoria = new CategoriaPregunta();
            $categoria->detalle = $detalle;
            $categoria->save();
        }

    }
}
