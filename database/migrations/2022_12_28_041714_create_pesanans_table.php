<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->string('kode_pemesanan',255)->primary();
                $table->integer('jumlah');
                $table->date('tanggal_pemesanan');
                $table->date('tanggal_pengiriman');
                $table->string('resi',255);
                $table->string('kurir',255);
                $table->string('nama_produk',255);
                $table->string('produk_id',255);
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
        Schema::dropIfExists('pesanans');
    }
};
