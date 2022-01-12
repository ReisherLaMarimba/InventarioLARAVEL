<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Persons;
use App\Models\Items;
use App\Models\Proyectos;
use DB;
use Log;

class RetiroController extends Controller
{

    public function retiro(Request $request)
    {
        $equipos=DB::table('items')->whereNull('retirado_por')
        ->get();

        $persona=DB::table('Persons')->get();
        $proyecto=DB::table('proyectos')->get();

        $equipid = $request->input('equip');
        $personid = $request->input('person');
        $carbon = new \Carbon\Carbon();
        $mytime = $carbon->now();
        // $projectid = $request->input('project');
        
        $RetUpdate = DB::table('items')
              ->where('id', $equipid)
              ->update(['retirado_por' => $personid, 'fecha_retiro'=> $mytime]);

      return view('items.retiro',compact('equipos','persona','proyecto'));
    }

    public function ingreso(Request $request ,$id){
        // echo($id);
        $carbon = new \Carbon\Carbon();
        $mytime = $carbon->now();
         DB::table('items')
        ->where('id', $id)
        ->update(['retirado_por' => NULL, 'fecha_retiro'=>NULL, 'fecha_ingreso'=>$mytime]);
           
     return redirect('items')->with('ingresar','ingresado');
    }
}
