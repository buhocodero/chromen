<?php

namespace Database\Seeders;

use App\Models\Empresa;
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

    $empresa = Empresa::create([
      'nombre' => 'Empesa S.A de C.V'
    ]);

    foreach ($perfiles as $value) {
      $perfil = new Perfil([
        "nombre"  => $value,
      ]);
      $empresa->perfiles()->save($perfil);
    }
  }
}
