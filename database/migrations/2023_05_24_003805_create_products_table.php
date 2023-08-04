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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('foto_kos')->unique();
            $table->string('foto_pemilik');
            $table->string('nama_pemilik');
            $table->string('nama_kos');
            $table->string('lokasi_kos');
            $table->double('harga_kos');
            $table->string('spesifikasi_kamar');
            $table->string('fasilitas_kamar');
            $table->string('fasilitas_umum');
            $table->string('peraturan_kamar');
            $table->string('peraturan_kos');
            $table->string('tipe_kamar');
            $table->string('alamat_kos');
            $table->boolean('favorite')->default(false)->nullable();
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
        Schema::dropIfExists('products');
    }
};
