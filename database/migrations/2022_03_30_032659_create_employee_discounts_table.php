<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_discounts', function (Blueprint $table) {
            $table->id();            
            $table->foreignId("discountsCode")
            ->nullable()
            ->constrained("discounts")
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignId("employeeDiscount")
            ->nullable()
            ->constrained("employees")
            ->cascadeOnUpdate()
            ->nullOnDelete();            
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
        Schema::dropIfExists('employee_discounts');
    }
}
