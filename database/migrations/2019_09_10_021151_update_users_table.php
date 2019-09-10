<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->string('apellido');
            $table->string('usuario');
            $table->string('avatar');
            $table->date('fecha_nac');
            $table->string('pais');
            //$table->boolean('acepto')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('apellido');
            $table->dropColumn('usuario');
            $table->dropColumn('avatar');
            $table->dropColumn('fecha_nac');
            $table->dropColumn('pais');
        });
    }
}
