<?php

namespace App\Http\Controllers;
//namespace Spatie\Permission\Traits;

use Illuminate\Http\Request;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    //Nos aseguramos que el usuario esté autentificado para el acceso
    public function __construct(){
        $this->middleware('auth');
    }
    
    //
    public function config(){
        
        //Evitamos que unusuario normal pueda otorgarse rango de administrador
        $usus = \Auth::user()->role;

        if ($usus == 'Admin') {
            return view('user.config');
        }else {
            return redirect()->route('home')
                            ->with(['error_message' => 'NECESITA SER ADMINISTRADOR PARA ADMINISTRAR DATOS DE USUARIOS!!']);
        }     
    }
    
    public function search(){
        return view('user.userSearch');

    }
    

    public function sendSearch(Request $request) {
        $user = User::all();
        $email = $request->input('email');

        $emailSearch = User::where('email', '=', $email)->first();
        $id = User::where('email', '=', $email)->value('id');
//        dd($id);

        if (!empty($emailSearch)) {
            return redirect()->route('user.actualizarUser', [
                        'email' => $email,
                    'id' => $id
            ]);
        } else {
            return redirect()->route('user.search')
                            ->with(['error_message' => 'E-mail ' . $email . ' NO ENCONTRADO']);
        }
    }

//fin sendSearch

    public function actualizarUser($id){
         $user= User::where('id',$id)->first();
         $id = User::where('id',$id)->value('id');
         $name = User::where('id',$id)->value('name');
         $surname1 = User::where('id',$id)->value('surname1');
         $surname2 = User::where('id',$id)->value('surname2');
         $role = User::where('id',$id)->value('role');
         $email = User::where('id',$id)->value('email');
        
        return view('user.UserUpdate', [
            'id'=>$id,
            'name'=>$name,
            'surname1'=>$surname1,
            'surname2'=>$surname2,
            'role'=>$role, 
            'email'=>$email, 
                ]);
    }
    
    public function updateUser (Request $request){
        
        $id= $request->input('id');

        // Validaciones     
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname1' => 'required|string|max:255',
            'surname2' => 'required|string|max:255',
            'role' => 'required|string|max:20',     
            'email' => 'required|string|email|max:255|unique:users,email,'.$id             
        ]);
        
        //Recoger datos 
        $name = $request->input('name');
        $surname1 = $request->input('surname1');
        $surname2 = $request->input('surname2');
        $role = $request->input('role');
//        if($role = 'Admin') $user->assignRole('Admin');
//        if($role = 'Admin') $userRole =true;
        $email= $request->input('email');
        
        //Asignamos valores recibidos
        $user= User::where('id',$id)->first(); 
        $user->name = $name;
        $user->surname1 = $surname1;
        $user->surname2 = $surname2;
        $user->role = $role;
        $user->email = $email;
        
        //Ejecutamos consulta y redireccionamos
        $user->update();
        
        return redirect()->route('user.listadoUser')
                         ->with(['message'=>'Datos de usuario modificados correctamente']);

    }
    
    public function update (Request $request){       

        //Usuario identificado
        $user = \Auth::user();
        $id = $user->id;
        
       // Validaciones       
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname1' => 'required|string|max:255',
            'surname2' => 'required|string|max:255',
            'role' => 'required|string|max:20',     
            'email' => 'required|string|email|max:255|unique:users,email,'.$id              
        ]);
        
        //Recoger datos       
        $name = $request->input('name');
        $surname1 = $request->input('surname1');
        $surname2 = $request->input('surname2');
        $role = $request->input('role');
//        if($role = 'Admin') $user->assignRole('Admin');
        if($role = 'Admin') $userRole =true;
        $email= $request->input('email');
        
        //Asignamos valores recibidos       
        $user->name = $name;
        $user->surname1 = $surname1;
        $user->surname2 = $surname2;
        $user->role = $role;
        $user->email = $email;
        
        //Ejecutamos consulta y redireccionamos
        $user->update();
        
        return redirect()->route('config')
                         ->with(['message'=>'Datos de usuario modificados correctamente']);
    }//fin update
    
    public function newUser() {
        $usus = \Auth::user()->role;

        if ($usus == 'Admin') {

            return view('user.newUser');
        } else {
            return redirect()->route('home')
                            ->with(['error_message' => 'NECESITA SER ADMINISTRADOR PARA CREAR NUEVOS USUARIOS!!']);
        }
    }
       
    public function newRegister(Request $request){
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname1' => 'required|string|max:255',
            'surname2' => 'required|string|max:255',
            'role' => 'required|string|max:20',     
            'email' => 'required|string|email|max:255|unique:users,email,',
            'password' => 'required|string|min:6|confirmed',   
        ]);
        
        $remember_token = $request->input('remember_token');

        $user = User::create([
            'name' => $request['name'],
            'surname1' => $request['surname1'],
            'surname2' => $request['surname2'],
            'role' => $request['role'],
            'email' => $request['email'],
            'password' => \Hash::make($request['password']),
            'remember_token'=> $remember_token ,
            ]);
         $user= User::where('name', '=', $request['name'] )->first();

        $user->remember_token = $remember_token;

        $user->update();
             return redirect()->route('user.newUser')
                    ->with(['message'=>'USUARIO CREADO CORRECTAMENTE']);
    }//fin newRegister
    
    public function listar() {

        $usus = \Auth::user()->role;

        if ($usus == 'Admin') {
            $users = User::orderBy('id', 'asc')->paginate(8);

            return view('user.listadoUser', [
                'users' => $users
            ]);
        }else {
            return redirect()->route('home')
                            ->with(['error_message' => 'NECESITA SER ADMINISTRADOR PARA ACCEDER AL LISTADO DE USUARIOS!!']);
        }
    }

// fin listar

    public function destroy($id){

        $user = User::where('id',$id)->first();

        $user->delete();
        
        return redirect()->route('user.listadoUser')
                ->with(['message'=>'Usuario Eliminado correctamente']);
    }//Fin destroy  
    
    public function helpGuide(){
        return view('user.helpguide');

    }

}