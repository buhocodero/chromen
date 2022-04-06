<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('clientes', function (Blueprint $table) {
      $table->id();
      $table->string('nombres', 50);
      $table->string('apellidos', 50);
      $table->string('email')->unique();
      $table->string('telefono', 10);
      $table->string('documento', 20);
      $table->enum('tipo_documento', [
        'DUI', 'LICENCIA', 'OTRO'
      ])->default('DUI');
      $table->string('NIT', 20)->nullable();
      $table->date('fecha_nacimiento');
      $table->mediumText('direccion');
      $table->unsignedInteger('compras')->default(0);
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
    Schema::dropIfExists('clientes');
  }
}
