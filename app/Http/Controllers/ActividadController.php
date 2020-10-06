<?php

namespace App\Http\Controllers;

use App\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
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
		    $actividades = Actividad::all();
        return view('actividades', compact('actividades'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $actividad = new Actividad();
        $actividad->descripcion = $request->descripcion;
        $actividad->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actividad  $Actividad
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $actividad = Actividad::where('id',$request->id)->first();
        $actividad->descripcion = $request->descripcion;
        if(is_null($actividad->descripcion))
        {
						$actividad -> descripcion = Actividad::find($request -> id)->descripcion;
        }
        $actividad->save();
        return response()->json($actividad);
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
      	Actividad::find($request->id)->delete();

        return response()->json();
    }
}
