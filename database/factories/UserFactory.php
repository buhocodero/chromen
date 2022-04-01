<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
  public function definition()
  {
    $usersName = ['user', 'admin', 'invitado'];
    $user = $usersName[random_int(1, 3) - 1];
    $passwword = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password

    return [
      'nombres'   => $this->faker->name(),
      'apellidos' => $this->faker->lastName(),
      "usuario"   => $this->faker->numerify("$user###"),
      'avatar'    => $this->faker->imageUrl(),
      'password' => $passwword,
      'remember_token' => Str::random(10),
      "perfil_id"   => $this->faker->randomElement([1, 2, 3, 4])
    ];
  }
}
