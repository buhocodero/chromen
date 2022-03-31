<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("employeeName");            
            $table->string("cellPhone");            
            $table->string("email");            
            $table->string("description");            
            $table->decimal("baseSalary",8,2);
            $table->string("direction");            
            $table->string("dui",10);            
            $table->string("nit",17);                        
            $table->date("admissionDate");                                   
            $table->foreignId("id_sucursal")
            ->nullable()
            ->constrained("sucursals")
            ->cascadeOnUpdate()
            ->nullOnDelete();
            //$table->string("dui");            dui file pendiemte            
            $table->enum('statusCode', ['DE ALTA', 'DE BAJA']);
            $table->enum('employeeRole', ['ADMINISTRADOR', 'EMPLEADO','SUPER_EMPLEDO']);
            $table->enum('typeemployee', ['MOTOCICLISTA', 'MECANICO','USUARIO_DE_SISTEMA']);
            $table->enum('sessioncontrol', ['SI_TIENE_ACCESO','NO_TIENE_ACCESO']);            
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
        Schema::dropIfExists('employees');
    }
}
