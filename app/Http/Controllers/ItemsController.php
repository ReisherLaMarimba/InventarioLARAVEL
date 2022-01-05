<?php

namespace App\Http\Controllers;
use App\Models\Persons;
use App\Models\Items;
use App\Models\Proyectos;
use Illuminate\Http\Request;
use DB;
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
        $totalEquip = Items::all();
        
        return view('items.index',compact('totalEquip'),$datos,);

    }
    

    public function pdf()
    {
        $datos['item']=Items::paginate();
        return view('items.pdf',  compact('items'));
       
    }
    public function retiro(Request $request)
    {
        $opEquip = $request->get("equipos");
        $opcion = array($opEquip);
       
        $equipos= DB::table('items')->get();
        $persona=DB::table('Persons')->get();
        $proyecto=DB::table('proyectos')->get();
      return view('items.retiro',compact('equipos','persona','proyecto','opcion'));
      
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
        $ValidDatos=[
            'nombre'=>'required|string|max:50' , 
            'codigo'=>'required|string|max:50' , 
            'ubicacion'=>'required|string|max:50'  ,
            'cantidad'=>'required|int|min:1'    
        ];
        $MensajeErr=[
                'required'=>'Es requerido completar: :attribute'
            ];
            $this->validate($request, $ValidDatos, $MensajeErr);



        //$datosItems = request()->all();
            $datosItems = request()->except('_token');
            items::insert($datosItems);

           return redirect('items/crear ')->with('mensaje','creado') ;
        
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

      return view('items.edit',compact('items'))->with('edita','editado');
      
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
        return view('items.edit',compact('items'))->with('edita','editado');
    }

    /**
     * Remove the specified resource from storage.
     
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Items::destroy($id);
        return redirect('items')->with('eliminar','Borrado') ;
    }
}
