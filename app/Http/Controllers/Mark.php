<?php

namespace App\Http\Controllers;

use App\Http\Requests\markRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mark as Marks;

class Mark extends Controller
{
    public function __construct()    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){

        $id_admin= Auth::user()->rol_id;
        $id_user= Auth::user()->id;
 
        if ($id_admin==1) {
             $consulta = Marks::search($request->query('search'))->get();       
        } else {
             $consulta = Marks::search($request->query('search'))
             ->where('user_id','=',$id_user)->get();
        }
        
        return view('mark.marks',[        
         'consultas' => $consulta
     ]);
        
    }
 
     public function store(markRequest $request){
        $id_user= Auth::user()->id;
         $mark = new Marks();
         $mark->name= request('name');
         $mark->user_id= $id_user;          
         $mark->save();       
 
         return redirect('/marcas')->with('data' ,' Marca agregado con Éxito!  🌝');
    }
 

    public function update(Request $request, $id){
         $request->validate([
             'name' => ['required', 'string', 'max:255'],
         ]); 
         $user = Marks::findOrFail($id);        
         $user->name= $request->get('name');
         $user->update();       
         return redirect('/marcas')->with('data' ,' Marca actualizado con Éxito!  🌝');
 
    }
 
     public function destroy($id){
         
         $usuario = Marks::findOrFail($id);
         $usuario->delete();         
         return  redirect('/marcas')->with('data' ,'Marca eliminado con Éxito!  🌝');
     }
}
