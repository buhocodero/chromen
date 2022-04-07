<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Persona::create([
      "nombres"     => "Edwin",
      "apellidos"   => "Melara",
    ]);
  }
}
