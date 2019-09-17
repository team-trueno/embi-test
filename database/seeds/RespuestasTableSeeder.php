<?php

use Illuminate\Database\Seeder;
use App\Respuesta;

class RespuestasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('respuestas')->delete();
        $json = File::get('database/data/respuestas.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            Respuesta::create(array(
                'detalle' => $obj->detalle,
                'correcta' => $obj->correcta,
                'pregunta_id' => $obj->pregunta_id,
            ));
        }

        App\Pregunta::has('respuestas', '=', 4)
                    ->update([
                        'activa' => true,
                        'completa' => true,
        ]);

    }
}
