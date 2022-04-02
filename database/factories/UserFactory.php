<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
  public function definition()
  {
    $password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
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
