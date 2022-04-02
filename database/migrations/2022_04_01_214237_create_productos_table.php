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
      $table->unsignedBigInteger('categoria_id');
      $table->string('codigo');
      $table->string('descripcion');
      $table->string('imagen');
      $table->unsignedFloat('precio_compra');
      $table->unsignedFloat('precio_venta');
      $table->timestamps();

      $table->foreign('categoria_id')
        ->references('id')
        ->on('categorias');
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
