<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
	protected $table = 'ciudades';
	
	protected $fillable = ['descripcion, provincia_id'];
	
	public function provincias($id)
    {
		
    	return Provincia::where('pais_id','=',$id)->get();
	}
	   
    public function hasAnyProvincia($provincias)
    {
		if (is_array($provincias)) {
			foreach ($rprovincias as $provincia) {
				if ($this->hasProvincia($provincia)) {
                
                return true;
				}
			}
		}
		if ($this->hasProvincia($provincia)) {
            
			return true;
		}
		
		return false;
	}
	
	public function hasProvncia($provincia)
	{
		if ($this->provincias()->where('descripcion', $provincia)->first()) {
			return true;
		}
		
		return false;
	}
    
    public $timestamps = false;
}
