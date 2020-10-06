<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'id'=>1,
        'name'=> 'Jose Rzepecki'
        'email'=> 'jose_rzepecki@gmail.com'
        'password' => '$2y$10$wyaWnsmZMfBFTWAuaFkkbel2yB1pioQLnBAEW9efc42S5oYLLQpXO'
        'remember_token' => '74I1HzNXKUp7mA2fCEW237Qen18lxmUEDUHkVH6Um3ek1cZM3fPx0A0tRX9e'
      ]);
    }
}
