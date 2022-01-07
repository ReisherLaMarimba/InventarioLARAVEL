<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persons;
use App\Models\Items;
use App\Models\Proyectos;
use DB;

class RetiroController extends Controller
{

    public function retiro(Request $request)
    {
        $equipos=DB::table('items')->get();
        $persona=DB::table('Persons')->get();
        $proyecto=DB::table('proyectos')->get();
        
        

//         $data = $request->all();
//       if(empty($data)) {
//        $data = json_decode($request->getContent());
//       $data = json_decode($data);

//     if(is_null($data)) {
//         return response()->json("Not valid json", 400);
//     }
// }
    //  return $request->input('equip');
       $mensaje = $request->input('equip');
       $mensaje1 = $request->input('person');
       $mensaje2 = $request->input('project');
       
       echo($mensaje);
       echo($mensaje1);
       echo($mensaje2);
      return view('items.retiro',compact('equipos','persona','proyecto'));
      
    }

}
