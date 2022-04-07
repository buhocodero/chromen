<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPefilToEmpresa extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('perfils', function (Blueprint $table) {
      $table->unsignedBigInteger('empresa_id');
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
    Schema::table('perfils', function (Blueprint $table) {
      $table->dropForeign(['empresa_id']);
      $table->dropColumn('empresa_id');
    });
  }
}
