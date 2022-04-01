<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Seeder;

class ModuloSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $modulos = ['ventas', 'clientes', 'proveedores', 'usuarios', 'empresas', 'sucursales'];
    foreach ($modulos as $value) {
      Modulo::create([
        "nombre"      => $value,
        "icon"        => $value,
        "short_name"  => "/admin/" . $value . "/modulo"
      ]);
    }
  }
}
