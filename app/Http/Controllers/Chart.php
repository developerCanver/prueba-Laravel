<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Chart extends Controller
{
    public function __construct()    {
        $this->middleware('auth');
    }
    public function index(){

    $id_user= Auth::user()->id;
    $consulta = DB::table('marks')
    ->where('user_id','=',$id_user)->get();
        
    return view('chart.charts',[        
         'consultas' => $consulta
     ]);
        
    }
}
