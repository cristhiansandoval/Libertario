<?php

namespace App\Http\Controllers;

use App\Ciudad;
use Illuminate\Http\Request;

class ciudadController extends Controller
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
		    $ciudades = Ciudad::all();
        return view('ciudades', compact('ciudades'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ciudad = new Ciudad();
        $ciudad->descripcion = $request->descripcion;
        $ciudad->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $ciudad = Ciudad::where('id',$request->id)->first();
        $ciudad->descripcion = $request->descripcion;
        if(is_null($ciudad->descripcion))
        {
						$ciudad -> descripcion = Ciudad::find($request -> id)->descripcion;
        }
        $ciudad->save();
        return response()->json($ciudad);
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
      	Ciudad::find($request->id)->delete();

        return response()->json();
    }
}
