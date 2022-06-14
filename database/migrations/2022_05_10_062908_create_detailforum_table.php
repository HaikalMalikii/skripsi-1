<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailforumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailforum', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('IDForum');
            $table->foreign('IDForum')->references('id')->on('forum');
            // $table->integer("IDKomentar");
            $table->text("Deskripsi");
            $table->string("Judul");
            $table->string('Gambar');


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
        Schema::dropIfExists('detailforum');
    }
}
