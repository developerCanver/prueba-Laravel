<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Modelos;
use App\Http\Requests\modelRequest;

class Modelo extends Controller
{
    public function __construct()    {
        $this->middleware('auth');
    }
    public $request='';
    public function index(Request $request){

        $id_admin= Auth::user()->rol_id;
        $id_user= Auth::user()->id;
 
        if ($id_admin==1) {
            $consulta = Modelos::search($request->query('search'))  
            ->select('models.name', 'users.id', 'models.id' ,DB::raw('(marks.name) as nameMark'))
            ->join('marks', 'marks.id', '=', 'models.mark_id')
            ->join('users', 'marks.user_id', '=', 'users.id')
            ->get();
             $marcas = DB::table('marks')->get();     
        } else {
             $consulta = DB::table('users')
             ->select('models.name', 'users.id', 'models.id' ,DB::raw('(marks.name) as nameMark'))
             ->join('marks', 'users.id', '=', 'marks.user_id')
             ->join('models', 'models.mark_id', '=', 'marks.id')
             ->where('users.id','=',$id_user)
             ->orderBy('marks.name')->get();
             $marcas = DB::table('marks')
             ->where('user_id','=',$id_user)->get();

        }
        
    return view('modelo.models',[        
         'consultas' => $consulta,
         'marcas' => $marcas,
     ]);
        
    }
 
     public function store(modelRequest $request){
      
         $model = new Modelos();
         $model->name= request('name');
         $model->mark_id=request('mark_id');         
         $model->save();       
 
         return redirect('/modelos')->with('data' ,' Modelo agregado con Éxito!  🌝');
    }
 

    public function update(Request $request, $id){
         $request->validate([
             'name' => ['required', 'string', 'max:255'],
         ]); 
         $model = Modelos::findOrFail($id);        
         $model->name= $request->get('name');
         if ($request->get('mark_id')) {
            $model->mark_id= $request->get('mark_id');
         }
         
         $model->update();       
         return redirect('/modelos')->with('data' ,' Modelo actualizado con Éxito!  🌝');
 
    }
 
     public function destroy($id){
         
         $usuario = Modelos::findOrFail($id);
         $usuario->delete();         
         return  redirect('/modelos')->with('data' ,'Modelo eliminado con Éxito!  🌝');
     }
}
