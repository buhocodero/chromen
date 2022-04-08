<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            //una persona puede tener uno o muchos documentos que le identifiquen
            $table->id();
            $table->unsignedBigInteger('id_tipo_documento');
            $table->unsignedBigInteger('id_persona');
            $table->string('foto')->nullable();
            $table->foreign('id_persona')
                ->references('id')
                ->on('personas');
            $table->foreign('id_tipo_documento')
                ->references('id')
                ->on('tipo_documentos');
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
        Schema::dropIfExists('documentos');
    }
}
