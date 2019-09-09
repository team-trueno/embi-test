<?php

use Illuminate\Database\Seeder;
use App\CategoriaPregunta;

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
            CategoriaPregunta::create(['detalle' => $detalle]);
        }

    }
}
