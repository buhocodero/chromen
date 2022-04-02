<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $categorias = [
      'Equipos Electromecánicos',
      'Taladros',
      'Andamios',
      'Generadores de energía',
      'Equipos para construcción'
    ];

    foreach ($categorias as $value) {
      Categoria::create([
        "nombre" => $value
      ]);
    }
  }
}
