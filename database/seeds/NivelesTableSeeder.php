<?php

use Illuminate\Database\Seeder;
use App\Nivel;

class NivelesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('niveles')->delete();
        $json = File::get('database/data/niveles.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            Nivel::create(array(
             'id' => $obj->id,
             'nombre' => $obj->nombre,
             'puntos_superar' => $obj->puntos_superar,
           ));
        }

        // $nivelesData = [
        //     ['nombre' => 'Nivel 1', 'puntos_superar' => 10],
        //     ['nombre' => 'Nivel 2', 'puntos_superar' => 30],
        //     ['nombre' => 'Nivel 3', 'puntos_superar' => 50],
        //     ['nombre' => 'Nivel 4', 'puntos_superar' => 100],
        //     ['nombre' => 'Nivel 5', 'puntos_superar' => 200],
        //     ['nombre' => 'Nivel 6', 'puntos_superar' => 400],
        //     ['nombre' => 'Nivel 7', 'puntos_superar' => 1000],
        //     ['nombre' => 'Nivel 8', 'puntos_superar' => 2000],
        //     ['nombre' => 'Nivel 9', 'puntos_superar' => 5000],
        //     ['nombre' => 'Nivel 10', 'puntos_superar' => 10000],
        // ];

        // foreach ($nivelesData as $data)
        // {
        //     $nivel = new Nivel();
        //     $nivel->nombre = $data['nombre'];
        //     $nivel->puntos_superar = $data['puntos_superar'];
        //     $nivel->save();
        // }
    }
}
