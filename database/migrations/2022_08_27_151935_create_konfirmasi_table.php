<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfirmasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasi', function (Blueprint $table) {
            $table->increments('id_konfirmasi');
            $table->unsignedBigInteger('admin')->nullable();
            $table->unsignedInteger('id_daftar');
            $table->unsignedInteger('id_kelas');
            $table->unsignedBigInteger('member');
            $table->unsignedInteger('biaya');
            $table->string('image')->nullable();
            $table->string('rekening')->nullable();
            $table->enum('Konfirmasi',['Sudah Di Bayar','Belum Di Bayar'])->default('Belum Di Bayar');
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
        Schema::dropIfExists('konfirmasi');
    }
}
