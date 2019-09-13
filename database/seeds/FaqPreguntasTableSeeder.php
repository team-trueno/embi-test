<?php

use Illuminate\Database\Seeder;
use App\FaqPregunta;

class FaqPreguntasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq_preguntas')->delete();
        $json = File::get('database/data/faqPreguntas.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            FaqPregunta::create(array(
             'detalle' => $obj->detalle,
             'respuesta' => $obj->respuesta,
             'faq_topico_id' => $obj->faq_topico_id,
           ));
        }
    }
}
