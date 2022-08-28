<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipIdDaftarToKonfirmasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('konfirmasi', function (Blueprint $table) {
            $table->foreign('id_daftar')
            ->references('id_daftar')
            ->on('daftar')
            ->onUpdate('cascade')
            ->onDelete('restrict');
            //
            $table->foreign('id_kelas')
            ->references('id_kelas')
            ->on('kelas')
            ->onUpdate('cascade')
            ->onDelete('restrict');
            //
            $table->foreign('admin')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('restrict');
            //
            $table->foreign('member')
            ->references('id')
            ->on('users')
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
        Schema::table('konfirmasi', function (Blueprint $table) {
            $table->dropForeign('konfirmasi_admin_foreign');
            $table->dropForeign('konfirmasi_member_foreign');
            $table->dropForeign('kondirmasi_id_daftar_foreign');
            $table->dropForeign('kondirmasi_id_kelas_foreign');
        });
    }
}
