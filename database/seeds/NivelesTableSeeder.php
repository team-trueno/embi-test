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
    }
}
