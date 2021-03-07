<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User as Users;
use App\Http\Requests\userRequest;

use Illuminate\Support\Facades\Auth;
class User extends Controller
{
    public function __construct()    {
        $this->middleware('auth');
    }
    public function index(){

       $id_admin= Auth::user()->rol_id;
       $id_user= Auth::user()->id;

       if ($id_admin==1) {
            $consulta = DB::table('users')
            ->where('rol_id','<>',$id_admin)->get();       
       } else {
            $consulta = DB::table('users')
            ->where('id','=',$id_user)->get();
       }
       
       return view('user.users',[        
        'consultas' => $consulta
    ]);
       
    }

    public function store(userRequest $request){
        $user = new Users();
        $user->name= request('name');
        $user->email= request('email');
        $user->password= Hash::make(request('password'));
        $user->rol_id='2';
        $user->save();
      

        return redirect('/usuarios')->with('data' ,'Agregado con Éxito!  🌝');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],
        ]);

        $user = Users::findOrFail($id);
        // $usuario es la consulta cuando cumple id
        $user->name= $request->get('name');
        $user->email=  $request->get('email');
        if ($request->get('password')) {
            $user->password= Hash::make($request->get('password'));
           }

        $user->update();       
        return redirect('/usuarios')->with('data' ,'Actualizado con Éxito!  🌝');

    }

    public function destroy($id)
    {
        //
        $usuario = Users::findOrFail($id);
        $usuario->delete();
        
        return  redirect('/usuarios')->with('data' ,'Eliminado con Éxito!  🌝');
    }
}
