<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    protected $table = 'afiliados';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'dni', 'sexo', 'nombre_padre', 'nombre_madre', 'provincia_id', 'ciudad_id', 'fecha_nacimiento', 'domicilio', 'cod_postal', 'email', 'facebook', 'instagram', 'twitter', 'telefono', 'celular', 'comentarios', 'actividad_id'
    ];


	public $timestamps = false;
}
