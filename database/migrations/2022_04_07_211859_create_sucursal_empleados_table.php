<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalEmpleadosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('sucursal_empleados', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('empleado_id');
      $table->unsignedBigInteger('sucursal_id');
      $table->timestamps();

      $table->foreign('empleado_id')->references('id')->on('empleados');
      $table->foreign('sucursal_id')->references('id')->on('sucursals');
    });
  }

  /**unsignedBun
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('sucursal_empleados');
  }
}
