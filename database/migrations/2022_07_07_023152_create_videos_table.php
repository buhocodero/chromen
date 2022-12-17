<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('descripcion', 150);            
            $table->string('url', 200);
            $table->string('urlImagen', 200);
            $table->string('urlGif', 200);
            $table->integer('vistas')->default(101);;  
            $table->enum('estado', ['A', 'I'])->default('I'); // A - Activo, I - Inactivo              
            $table->unsignedBigInteger('persona_id');
            $table->timestamps();
            $table->foreign('persona_id')
                ->references('id')
                ->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
