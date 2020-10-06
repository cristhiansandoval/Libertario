<?php

namespace App\Http\Controllers;

use App\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
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
		$provincias = Provincia::pluck('descripcion', 'id');
        return view('auth.register', compact('provincias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $provincia = new Provincia();
        $provincia -> pais_id = $request -> pais_id;
        $provincia -> descripcion = $request -> descripcion;
        $provincia -> save();

        return redirect('/create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $provincia = Provincia::find($request -> id);
        $provincia -> descripcion = $request -> descripcion;
        $provincia -> save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provincia = Provincia::find($id);
          if(!$provincia){
            abort(404, 'No se encuentra lo que usted busca');
            $return['status'] = 'error';
          }
          else
          {
            $return['status'] = 'success';
            $provincia->delete();
          }

          return $return;
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  \App\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    	$i = DB::table('provincias')->where('id', $id)->delete();
    	if ($i > 0)
    	{

    		return view('home');
    	}
    }
}
