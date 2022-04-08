<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
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
      'nombres' => $this->faker->name(),
      'apellidos' => $this->faker->lastName(),
      'email' => $this->faker->unique()->safeEmail(),
      'telefono' => $this->faker->numerify('####-####'),
      'celular' => $this->faker->numerify('####-####'),
      'direccion' => $this->faker->address(),
      'tipoPersona' => $this->faker->randomElement(["empleado","cliente"]),
      'fecha_nacimiento' => $this->faker->date()      
    ];
  }
}
