<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('persona_users', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('persona_id');
      $table->unsignedBigInteger('user_id');
      $table->enum('estado', ['A', 'I'])->default('A'); // A - Activo, I - Inactivo
      $table->timestamps();

      $table->foreign('persona_id')
        ->references('id')
        ->on('personas');

      $table->foreign('user_id')
        ->references('id')
        ->on('users');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('persona_users');
  }
}
