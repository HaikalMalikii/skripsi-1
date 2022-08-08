<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengaduan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IDUser');
            $table->foreign('IDUser')->references('id')->on('users');
            $table->string("Bagian");
            $table->string("Judul");
            $table->string("Gambar");
            $table->string("Location");
            $table->string("Deskripsi");
            $table->integer("Persetujuan")->default(0);
            $table->string("Alasan")->default(0);
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
        //
    }
}