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
}
