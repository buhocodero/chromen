<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('productos', function (Blueprint $table) {
      $table->id();
      $table->string("nombre");      
      $table->string("foto");      
      $table->string("caracteristicas");      
      $table->unsignedBigInteger('unidad_de_medida');
      $table->foreign('unidad_de_medida')
        ->references('id')
        ->on('unidad_de_medidas');
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
    Schema::dropIfExists('productos');
  }
}
