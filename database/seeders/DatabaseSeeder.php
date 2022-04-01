<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PerfilSeeder;
use Database\Seeders\ModuloSeeder;
use Database\Seeders\PerfilsModulosSeeder;
use Database\Seeders\UsersSeeder;


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
      PerfilSeeder::class,
      ModuloSeeder::class,
      PerfilsModulosSeeder::class,
      UsersSeeder::class,
    ]);
  }
}
