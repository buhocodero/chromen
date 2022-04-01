<?php

namespace Database\Seeders;

use App\Models\PerfilModulo;
use Illuminate\Database\Seeder;

class PerfilsModulosSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i = 1; $i < 5; $i++) {
      $modulos = rand(1, 6);
      for ($y = 0; $y < $modulos; $y++) {
        PerfilModulo::create([
          "perfil_id" => $i,
          "modulo_id" => ($y + 1)
        ]);
      }
    }
  }
}
