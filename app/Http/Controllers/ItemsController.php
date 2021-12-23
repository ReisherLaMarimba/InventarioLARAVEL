<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['item']=Items::paginate();
        
        return view('items.index',$datos);
    }
    public function pdf()
    {
        $datos['item']=Items::paginate();
        return view('items.pdf',  compact('items'));
       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosItems = request()->all();
            $datosItems = request()->except('_token');
            items::insert($datosItems);

           return redirect('items')->with('mensaje','Equipo agregado con exito') ;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Items::findOrFail($id);

      return view('items.edit',compact('items'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosItems = request()->except(['_token','_method']);
        Items::where('id' ,'=' ,$id)->update($datosItems);

        $items = Items::findOrFail($id);
        return view('items.edit',compact('items'));
    }

    /**
     * Remove the specified resource from storage.
     
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Items::destroy($id);
        return redirect('items')->with('mensaje','Equipo eliminado con exito') ;
    }
}
