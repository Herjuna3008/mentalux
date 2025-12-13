<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Kita bikin tabel baru namanya 'psychologists'
        Schema::create('psychologists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');       // Psikolog Klinis, Dokter Jiwa, dll
            $table->string('specialist'); // Adult & Trauma, dll
            $table->string('image');      // Path gambar
            $table->text('desc');         // Deskripsi panjang
            $table->string('session');    // 2 Hours
            $table->string('price');      // Rp 200.000
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('psychologists');
    }
};