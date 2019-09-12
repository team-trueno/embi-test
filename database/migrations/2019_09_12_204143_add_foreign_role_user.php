<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignRoleUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')->on('users');

            $table->foreign('role_id')
                  ->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['role_id']);
        });
    }
}
