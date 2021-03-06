<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEkskulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekskuls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_ekskul');
            $table->unsignedInteger('guru_id');
            $table->foreign('guru_id')->references('id')->on('gurus')->ondelete('cascade');
            $table->unsignedInteger('fasilitas_id');
            $table->foreign('fasilitas_id')->references('id')->on('fasilitas')->ondelete('cascade');
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
        Schema::dropIfExists('ekskuls');
    }
}
