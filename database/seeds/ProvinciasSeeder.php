<?php

use Illuminate\Database\Seeder;

class ProvinciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('provincias')->insert([
      'id'=>1,
      'descripcion'=>'BUENOS AIRES'
      ] );

      DB::table('provincias')->insert([
      'id'=>2,
      'descripcion'=>'CAPITAL FEDERAL'
      ] );

      DB::table('provincias')->insert([
      'id'=>3,
      'descripcion'=>'CATAMARCA'
      ] );

      DB::table('provincias')->insert([
      'id'=>4,
      'descripcion'=>'CHACO'
      ] );

      DB::table('provincias')->insert([
      'id'=>5,
      'descripcion'=>'CHUBUT'
      ] );

      DB::table('provincias')->insert([
      'id'=>6,
      'descripcion'=>'CÓRDOBA'
      ] );

      DB::table('provincias')->insert([
      'id'=>7,
      'descripcion'=>'CORRIENTES'
      ] );

      DB::table('provincias')->insert([
      'id'=>8,
      'descripcion'=>'ENTRE RÍOS'
      ] );

      DB::table('provincias')->insert([
      'id'=>9,
      'descripcion'=>'FORMOSA'
      ] );

      DB::table('provincias')->insert([
      'id'=>10,
      'descripcion'=>'JUJUY'
      ] );

      DB::table('provincias')->insert([
      'id'=>11,
      'descripcion'=>'LA PAMPA'
      ] );

      DB::table('provincias')->insert([
      'id'=>12,
      'descripcion'=>'LA RIOJA'
      ] );

      DB::table('provincias')->insert([
      'id'=>13,
      'descripcion'=>'MENDOZA'
      ] );

      DB::table('provincias')->insert([
      'id'=>14,
      'descripcion'=>'MISIONES'
      ] );

      DB::table('provincias')->insert([
      'id'=>15,
      'descripcion'=>'NEUQUÉN'
      ] );

      DB::table('provincias')->insert([
      'id'=>16,
      'descripcion'=>'RÍO NEGRO'
      ] );

      DB::table('provincias')->insert([
      'id'=>17,
      'descripcion'=>'SALTA'
      ] );

      DB::table('provincias')->insert([
      'id'=>18,
      'descripcion'=>'SAN JUAN'
      ] );

      DB::table('provincias')->insert([
      'id'=>19,
      'descripcion'=>'SAN LUIS'
      ] );

      DB::table('provincias')->insert([
      'id'=>20,
      'descripcion'=>'SANTA CRUZ'
      ] );

      DB::table('provincias')->insert([
      'id'=>21,
      'descripcion'=>'SANTA FE'
      ] );

      DB::table('provincias')->insert([
      'id'=>22,
      'descripcion'=>'SANTIAGO DEL ESTERO'
      ] );

      DB::table('provincias')->insert([
      'id'=>23,
      'descripcion'=>'TIERRA DEL FUEGO'
      ] );

      DB::table('provincias')->insert([
      'id'=>24,
      'descripcion'=>'TUCUMAN'
      ] );
    }
}
