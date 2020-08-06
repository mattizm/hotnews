<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $kolom) {
            $kolom->id();
            $kolom->string('judul');
            $kolom->string('berita');
            $kolom->date('tanggal');
            $kolom->string('author');
            $kolom->string('sumber');
            $kolom->string('status');
            $kolom->string('foto');
            $kolom->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beritas');
    }
}
