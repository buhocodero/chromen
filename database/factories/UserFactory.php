<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
  public function definition()
  {
    $password = '$2y$10$eMQGhSzI71DxiISjwJFK0u3znV2CFlLytTg3V66sgwXLKy61oJZWm'; // password
    return [
      'nombres'   => $this->faker->name(),
      'apellidos' => $this->faker->lastName(),
      "usuario"   => $this->faker->userName(),
      'avatar'    => $this->faker->imageUrl(),
      'password' => $password,
      'remember_token' => Str::random(10),
      "perfil_id"   => $this->faker->randomElement([1, 2, 3, 4])
    ];
  }
}
