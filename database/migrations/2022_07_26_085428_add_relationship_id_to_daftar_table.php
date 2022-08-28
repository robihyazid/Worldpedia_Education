<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipIdToDaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daftar', function (Blueprint $table) {
            $table->foreign('id_users')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('restrict');
            //
            $table->foreign('id_kelas')
            ->references('id_kelas')
            ->on('kelas')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daftar', function (Blueprint $table) {
            $table->dropForeign('daftar_id_user_foreign');
            $table->dropForeign('daftar_id_kelas_foreign');
            //
        });
    }
}
