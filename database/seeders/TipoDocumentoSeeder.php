<?php

namespace Database\Seeders;

use App\Models\TipoDocumento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TipoDocumentoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */

  public function run()
  {
    $max = 2;
    $faker = \Faker\Factory::create();
    
      TipoDocumento::create([
        'descripcion'         => "N. unico de Identidad",        
        'nombre'          => "DUI"        
      ]);
      TipoDocumento::create([
        'descripcion'         => "N. Identificación Tributaria",        
        'nombre'          => "NIT"        
      ]);
    
  }
}
