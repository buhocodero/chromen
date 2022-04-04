<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */

  public function run()
  {
    $max = 20;
    $faker = \Faker\Factory::create();
    $password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

    for ($i = 0; $i < $max; $i++) {
      User::create([
        'nombres'         => $i === 0 ? 'melara0606' :  $faker->name(),
        'apellidos'       => $faker->lastName(),
        "usuario"         => $faker->userName(),
        'avatar'          => $faker->imageUrl(),
        'password'        => $password,
        'remember_token'  => Str::random(10),
        'perfil_id'       => $faker->randomElement([1, 2, 3, 4])
      ]);
    }
  }
}
