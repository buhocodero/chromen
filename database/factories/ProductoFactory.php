<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'categoria_id' => rand(1, 5),
      'codigo' => $this->faker->numerify("####"),
      'descripcion' => $this->faker->address(),
      'imagen' => $this->faker->imageUrl(),
      'precio_venta' => $this->faker->numerify('##.##'),
      'precio_compra' => $this->faker->numerify('##.##')
    ];
  }
}
