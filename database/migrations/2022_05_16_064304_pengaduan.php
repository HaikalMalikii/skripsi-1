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
            $table->string("Kategori");
            $table->integer("User_Id");
            $table->text("Detail");
            $table->string("Foto_Pengaduan");
            $table->integer('Like');
            $table->integer('Dislike');


            $table->integer('Total');

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
