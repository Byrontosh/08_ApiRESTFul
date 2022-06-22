<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portafolio;
use Illuminate\Http\Request;

class PortafolioController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Portafolio::all();
    }






    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:50',
            'descripcion'=>'required|string|max:50',
            'categoria'=>'required | string | max:15',
            'imagen'=>'required | max:2000 ',
            'url'=>'required  | max:100',
        ]);

        return Portafolio::create($request->all());
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Portafolio::find($id);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $request->validate([
            'nombre'=>'required|max:50',
            'descripcion'=>'required|string|max:50',
            'categoria'=>'required | string | max:15',
            'imagen'=>'required | max:2000 ',
            'url'=>'required  | max:100',
        ]);

        $portafolio= Portafolio::find($id);

        $portafolio->update([
            'nombre'=> request('nombre'),
            'descripcion'=> request('descripcion'),
            'categoria'=> request('categoria'),
            'imagen'=> request('imagen'),
            'url'=> request('url')
        ]);

        return $portafolio;
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portafolio = Portafolio::find($id);
        $portafolio ->delete();
        return response()->json([
            'response'=>'El portafolio fue eliminado'
        ]);

    }
}
