<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('nombres', 50);
      $table->string('apellidos', 50);
      $table->string('usuario')->unique();
      $table->string('avatar');
      $table->enum('estado', ['A', 'I'])->default('A'); // A - Activo, I - Inactivo
      $table->timestamp('ultimo_login')->default(DB::raw('CURRENT_TIMESTAMP'));
      $table->string('password');
      $table->rememberToken();
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
    Schema::dropIfExists('users');
  }
}
