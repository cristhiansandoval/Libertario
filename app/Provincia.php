<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincias';

    protected $fillable = ['descripcion', 'pais_id'];

    public function ciudades()
    {
    return $this
        ->hasMany('App\Ciudad');
    }

    public $timestamps = false;
}
