<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'id' => rand(1, 1000),
      'nombre' => $this->faker->name(),      
      'ubicacion' => $this->faker->address()      
    ];
  }
}
