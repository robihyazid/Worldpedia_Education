<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar', function (Blueprint $table) {
            $table->increments('id_daftar');
            $table->unsignedInteger('id_kelas');
            $table->unsignedBigInteger('id_users');
            $table->string('nama_siswa');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir')->date_format('d-m-Y');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->text('alamat');
            $table->string('telepon_ayah');
            $table->string('telepon_ibu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar');
    }
}
