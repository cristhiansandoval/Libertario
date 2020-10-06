<?php

use Illuminate\Database\Seeder;

class ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('actividades')->insert([
        'id'=>1,
        'descripcion'=>'Estoy viendo de que se trata',
      ]);
      DB::table('actividades')->insert([
        'id'=>2,
        'descripcion'=>'Quiero afiliarme',
      ]);
      DB::table('actividades')->insert([
        'id'=>3,
        'descripcion'=>'¡Quiero trabajar con ustedes!',
      ]);
    }
}
