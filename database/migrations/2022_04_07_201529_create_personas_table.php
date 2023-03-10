<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('personas', function (Blueprint $table) {
      $table->id();
      $table->string('nombres', 50);      
      $table->string('apellidos', 50);
      $table->string("email",100)->unique();      
      $table->string("telefono",10)->nullable();      
      $table->string("celular",10)->unique();            
      $table->string("direccion");            
      $table->string("varios");            
      $table->date("fecha_nacimiento")->nullable();            
      $table->enum('tipoPersona',["empleado","cliente","administradorEmpresa","AdministradorSistema"]);      
      $table->enum('genero',["Masculino","Femenino"]);      
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
    Schema::dropIfExists('personas');
  }
}
