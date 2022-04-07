<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaClientesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('empresa_clientes', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('empresa_id');
      $table->unsignedBigInteger('cliente_id');
      $table->unsignedBigInteger('compras')->default(0);
      $table->timestamps();

      $table->foreign('empresa_id')
        ->references('id')
        ->on('empresas');

      $table->foreign('cliente_id')
        ->references('id')
        ->on('clientes');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('empresa_clientes');
  }
}
