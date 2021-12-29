<?php

namespace App\Http\Controllers;
use App\Models\Persons;
use Illuminate\Http\Request;

class PersonController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos2['person']=persons::paginate();
        $totalEquip2 = persons::all();
        
        return view('persons.index',compact('totalEquip2'),$datos2,);


    }
    public function create()
    {
        return view('persons.crear');
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
            persons::insert($datosItems);

           return redirect('persons')->with('mensaje','Equipo agregado con exito') ;
        
    }
        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persons  $persons
     * @return \Illuminate\Http\Response
     */
    public function show(Persons $persons)
    {
        //
    }
    public function edit($id)
    {
        $persons = persons::findOrFail($id);

      return view('persons.edit',compact('persons'));
      
    }
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persons  $persons
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosItems = request()->except(['_token','_method']);
        persons::where('id' ,'=' ,$id)->update($datosItems);

        $persons = persons::findOrFail($id);
        return view('persons.edit',compact('persons'));
    }
    public function destroy($id)
    {
        persons::destroy($id);
        return redirect('persons')->with('eliminar','Borrado') ;
    }

}
