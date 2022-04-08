<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marca_productos', function (Blueprint $table) {
            $table->id();
            $table->decimal("precio",8,2);
            $table->integer("cantidad");
            $table->unsignedBigInteger('codigo_marca');
            $table->unsignedBigInteger('codigo_producto');
            $table->foreign('codigo_marca')
                ->references('id')
                ->on('marcas');
            $table->foreign('codigo_producto')
                ->references('id')
                ->on('productos');
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
        Schema::dropIfExists('marca_productos');
    }
}
