<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum', function (Blueprint $table) {
            $table->id();
            $table->string("Title");
            $table->integer("User_Id");
            $table->text("Aspirasi");
            $table->dateTime('Tanggal');
            $table->string('Photo_Forum');
            $table->timestamps('created_at')->useCurrent();
            $table->timestamps('updated_at')->useCurrent();

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
        Schema::dropIfExists('forum');
    }
}
