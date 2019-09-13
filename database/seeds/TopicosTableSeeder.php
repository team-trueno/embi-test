<?php

use Illuminate\Database\Seeder;
use App\FaqTopico;

class TopicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq_topicos')->delete();
        $json = File::get('database/data/topicos.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            FaqTopico::create(array(
             'detalle' => $obj->detalle,
           ));
        }
    }
}
