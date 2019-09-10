<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToFaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faq_preguntas', function (Blueprint $table) {
            $table->foreign('faq_topico_id')
                  ->references('id')->on('faq_topicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faq_preguntas', function (Blueprint $table) {
            $table->dropForeign(['faq_topico_id']);
        });
    }
}
