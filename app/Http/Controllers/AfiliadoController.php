<?php

namespace App\Http\Controllers;

use App\Afiliado;
use Illuminate\Http\Request;

class AfiliadoController extends Controller
{


	/**
     * Disable the created_at and updated_at fields when saving
     */
	public $timestamps = false;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$afiliados = Afiliado::all();
        return view('sumate', compact('afiliados'));
    }
		/**
	  * Display a listing of the resource for afiliados.
	  *
	  * @return \Illuminate\Http\Response
	  */
	 public function principal()
	 {
	 $afiliados = Afiliado::all();
	 		return view('afiliados', compact('afiliado'));
	 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
				try{
					$afiliado = new Afiliado();
	        $afiliado -> nombre = $request -> nombre;
	        $afiliado -> apellido = $request -> apellido;
	        $afiliado -> dni = $request -> dni;
	        $afiliado -> sexo = $request -> sexo;
	        $afiliado -> nombre_padre = $request -> nombre_padre;
	        $afiliado -> nombre_madre = $request -> nombre_madre;
	        $afiliado -> provincia_id = $request -> provincia_id;
	        $afiliado -> ciudad_id = $request -> ciudad_id;
	        $afiliado -> fecha_nacimiento = $request -> fecha_nacimiento;
	        $afiliado -> domicilio = $request -> domicilio;
	        $afiliado -> cod_postal = $request -> cod_postal;
	        $afiliado -> email = $request -> email;
	        $afiliado -> facebook = $request -> facebook;
	        $afiliado -> instagram = $request -> instagram;
	        $afiliado -> twitter = $request -> twitter;
	        $afiliado -> telefono = $request -> telefono;
	        $afiliado -> celular = $request -> celular;
	        $afiliado -> comentarios = $request -> comentarios;
	        $afiliado -> actividad_id = $request -> actividad_id;
	        $afiliado -> save();

				return \Redirect::to('sumate')->with('message', 'Tu afiliación se guardó correctamente');
			}
				catch (\Illuminate\Database\QueryException $e) {
				return \Redirect::to('sumate')->with('alert', 'Error: completá correctamente los datos marcados en asterisco');
			}
    }

		/**
		 * Show the form for store a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */

		public function store(Request $request)
		{
        $afiliado = new Afiliado();
        $afiliado -> nombre = $request -> nombre;
        $afiliado -> apellido = $request -> apellido;
        $afiliado -> dni = $request -> dni;
        $afiliado -> sexo = $request -> sexo;
        $afiliado -> nombre_padre = $request -> nombre_padre;
        $afiliado -> nombre_madre = $request -> nombre_madre;
        $afiliado -> provincia_id = $request -> provincia_id;
        $afiliado -> ciudad_id = $request -> ciudad_id;
        $afiliado -> fecha_nacimiento = $request -> fecha_nacimiento;
        $afiliado -> domicilio = $request -> domicilio;
        $afiliado -> cod_postal = $request -> cod_postal;
        $afiliado -> email = $request -> email;
        $afiliado -> facebook = $request -> facebook;
        $afiliado -> instagram = $request -> instagram;
        $afiliado -> twitter = $request -> twitter;
        $afiliado -> telefono = $request -> telefono;
        $afiliado -> celular = $request -> celular;
        $afiliado -> comentarios = $request -> comentarios;
        $afiliado -> actividad_id = $request -> actividad_id;
        $afiliado -> save();
				return \Redirect::to('afiliados');
			}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $afiliado = afiliado::find($request->id);
        $afiliado -> nombre = $request -> nombre;
        $afiliado -> apellido = $request -> apellido;
        $afiliado -> dni = $request -> dni;
        $afiliado -> sexo = $request -> sexo;
        $afiliado -> nombre_padre = $request -> nombre_padre;
        $afiliado -> nombre_madre = $request -> nombre_madre;
        $afiliado -> provincia_id = $request -> provincia_id;
        $afiliado -> ciudad_id = $request -> ciudad_id;
        $afiliado -> fecha_nacimiento = $request -> fecha_nacimiento;
        $afiliado -> domicilio = $request -> domicilio;
        $afiliado -> cod_postal = $request -> cod_postal;
        $afiliado -> email = $request -> email;
        $afiliado -> facebook = $request -> facebook;
        $afiliado -> instagram = $request -> instagram;
        $afiliado -> twitter = $request -> twitter;
        $afiliado -> telefono = $request -> telefono;
        $afiliado -> celular = $request -> celular;
        $afiliado -> comentarios = $request -> comentarios;
        $afiliado -> actividad_id = $request -> actividad_id;
				if(is_null($afiliado->nombre))
			 {
				 $afiliado -> nombre = Afiliado::find($request -> id)->nombre;
			 }
			 if(is_null($afiliado->apellido))
			 {
			 		$afiliado -> apellido = Afiliado::find($request -> id)->apellido;
			 }
			 if(is_null($afiliado->dni))
		   {
			  	$afiliado -> dni = Afiliado::find($request -> id)->dni;
		   }
		    if(is_null($afiliado->sexo))
		    {
			  	$afiliado -> sexo = Afiliado::find($request -> id)->sexo;
		    }
				if(is_null($afiliado->nombre_padre))
 			 {
 			 		$afiliado -> nombre_padre = Afiliado::find($request -> id)->nombre_padre;
 			 }
 			 if(is_null($afiliado->nombre_madre))
 		   {
 			  	$afiliado -> nombre_madre = Afiliado::find($request -> id)->nombre_madre;
 		   }
 		    if(is_null($afiliado->provincia_id))
 		    {
 			  	$afiliado -> provincia_id = Afiliado::find($request -> id)->provincia_id;
 		    }
				if(is_null($afiliado->ciudad_id))
 			 {
 			 		$afiliado -> ciudad_id = Afiliado::find($request -> id)->ciudad_id;
 			 }
 			 if(is_null($afiliado->fecha_nacimiento))
 		   {
 			  	$afiliado -> fecha_nacimiento = Afiliado::find($request -> id)->fecha_nacimiento;
 		   }
 		    if(is_null($afiliado->domicilio))
 		    {
 			  	$afiliado -> domicilio = Afiliado::find($request -> id)->domicilio;
 		    }
				if(is_null($afiliado->cod_postal))
 		    {
 			  	$afiliado -> cod_postal = Afiliado::find($request -> id)->cod_postal;
 		    }
				if(is_null($afiliado->email))
 		    {
 			  	$afiliado -> email = Afiliado::find($request -> id)->email;
 		    }
				if(is_null($afiliado->facebook))
 		    {
 			  	$afiliado -> facebook = Afiliado::find($request -> id)->facebook;
 		    }
				if(is_null($afiliado->instagram))
 		    {
 			  	$afiliado -> instagram = Afiliado::find($request -> id)->instagram;
 		    }
				if(is_null($afiliado->twitter))
 		    {
 			  	$afiliado -> twitter = Afiliado::find($request -> id)->twitter;
 		    }
				if(is_null($afiliado->telefono))
 		    {
 			  	$afiliado -> telefono = Afiliado::find($request -> id)->telefono;
 		    }
				if(is_null($afiliado->celular))
 		    {
 			  	$afiliado -> celular = Afiliado::find($request -> id)->celular;
 		    }
				if(is_null($afiliado->comentarios))
 		    {
 			  	$afiliado -> comentarios = Afiliado::find($request -> id)->comentarios;
 		    }
				if(is_null($afiliado->actividad_id))
        {
		   	$afiliado -> actividad_id = 1;
        }
        $afiliado -> save();
				return \Redirect::to('afiliados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $afiliado = Afiliado::find($id);
          if(!$afiliado){
            abort(404, 'No se encuentra lo que usted busca');
            $return['status'] = 'error';
          }
          else
          {
            $return['status'] = 'success';
            $afiliado->delete();
          }

          return $return;
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  \App\Afiliado  $afiliado
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
			Afiliado::find($request->id)->delete();

	    return response()->json();
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|string|max:191',
            'apellido' => 'required|string|max:191',
            'dni' => 'required|numeric',
            'sexo' => 'required',
            'nombre_padre' => 'required|string|max:191',
            'nombre_madre' => 'required|string|max:191',
            'provincia' => 'required',
            'ciudad'=> 'required',
            'fecha_nacimiento' => 'required|date_format:"d-m-Y"',
            'domicilio' => 'required|string|max:191',
            'cod_postal' => 'required|numeric',
            'email' => 'required|string|email|max:191',
            'telefono' => 'required|numeric',
            'celular' => 'required|numeric',
        ]);
    }
	}
