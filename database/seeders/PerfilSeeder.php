<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $perfiles = [
      'Adminitrador', 'Usuario', 'Vendedor', 'Contador'
    ];
    foreach ($perfiles as $value) {
      Perfil::create(["nombre" => $value]);
    }
  }
}
