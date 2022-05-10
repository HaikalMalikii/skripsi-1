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
            $table->integer("Forum_Id");
            $table->text("Aspirasi_Komen");
            $table->dateTime('Tanggal');
            $table->string('Photo_Forum');
            
            $table->integer('total');

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
