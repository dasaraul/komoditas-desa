<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomoditasDesasTable extends Migration
{
    public function up()
    {
        Schema::create('komoditas_desas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('komoditi_id');
            $table->decimal('jumlah', 10, 2);
            $table->timestamps();

            // Definisikan foreign key ke tabel Desa
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade');

            // Definisikan foreign key ke tabel Kategori
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');

            // Definisikan foreign key ke tabel Komoditi
            $table->foreign('komoditi_id')->references('id')->on('komoditis')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('komoditas_desas');
    }
}

