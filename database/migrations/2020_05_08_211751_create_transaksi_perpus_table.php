<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiPerpusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_perpus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_transaksi');
            $table->integer('anggota_id')->unsigned();
            $table->integer('buku_id')->unsigned();
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->enum('status', ['pinjam', 'kembali']);
            $table->text('ket')->nullable();
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
        Schema::dropIfExists('transaksi_perpus');
    }
}
