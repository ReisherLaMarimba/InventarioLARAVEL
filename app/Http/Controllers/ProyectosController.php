<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos2['proyecto']=proyectos::paginate();
        $totalEquip2 = proyectos::all();
        
        return view('proyectos.index',compact('totalEquip2'),$datos2,);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyectos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosItems = request()->except('_token');
        proyectos::insert($datosItems);

       return redirect('proyectos')->with('mensaje','Empleado agregado con exito') ;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function show(Proyectos $proyectos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyectos = proyectos::findOrFail($id);

        return view('proyectos.edit',compact('proyectos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosItems = request()->except(['_token','_method']);
        proyectos::where('id' ,'=' ,$id)->update($datosItems);

        $persons = proyectos::findOrFail($id);
        return view('proyectos.edit',compact('proyectos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        persons::destroy($id);
        return redirect('proyectos')->with('eliminar','Borrado') ;
    }
}
