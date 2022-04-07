<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TipoDocumentoFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
        'nombre' => $this->faker->randomElement(['NRC' ,'NIT', 'DUI']),
        'descripcion' => "Es una description"      
      ];
  }
}
