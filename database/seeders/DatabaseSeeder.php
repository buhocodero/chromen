<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
      PersonaSeeder::class,
      EmpresaSeeder::class,
      ModuloSeeder::class,
      PerfilSeeder::class,      
      PerfilsModulosSeeder::class,
      UsersSeeder::class,
      // TipoDocumentoSeeder::class
    ]);
  }
}
