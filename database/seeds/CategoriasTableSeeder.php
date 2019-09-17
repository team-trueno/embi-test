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
        DB::table('categoria_preguntas')->delete();
        $json = File::get('database/data/categorias.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            CategoriaPregunta::create(array(
                'id' => $obj->id,
                'detalle' => $obj->detalle,
            ));
        }

        // $categoriasData = [
        //     'Deporte',
        //     'Música',
        //     'Entretenimiento',
        //     'Borrachos',
        //     'Mundo',
        // ];

        // foreach ($categoriasData as $detalle) {
        //     $categoria = new CategoriaPregunta();
        //     $categoria->detalle = $detalle;
        //     $categoria->save();
        // }

    }
}
