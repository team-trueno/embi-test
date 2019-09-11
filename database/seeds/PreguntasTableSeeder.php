<?php

use Illuminate\Database\Seeder;
use App\Pregunta;

class PreguntasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('preguntas')->delete();
        $json = File::get('database/data/preguntas.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            Pregunta::create(array(
             'detalle' => $obj->detalle,
             'categoria_pregunta_id' => $obj->categoria_pregunta_id,
           ));
        }
    }
}
