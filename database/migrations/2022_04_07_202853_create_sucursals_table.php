<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('sucursals', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('empresa_id');
      $table->string('nombre', 50);
      $table->string('ubicacion', 150);
      $table->enum('casa_matriz',["SI","NO"]);
      $table->timestamps();
      $table->foreign('empresa_id')
        ->references('id')
        ->on('empresas');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('sucursals');
  }
}
