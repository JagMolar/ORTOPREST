<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

use App\Beneficiary;
use App\User;
use App\Product;
use Carbon\Carbon;



class BeneficiaryController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
       
    public function create(){
        return view('beneficiary.gestion');
    }
    
 
    public function save (Request $request){

//        Validaciones
        
        $validate = $this->validate($request, [
            'name' => 'required|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',
            'surname1' => 'required|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',
            'surname2' => 'required|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',
            'dni' => 'required|string|regex:^[0-9]{8}[A-Za-z]{1}^|unique:beneficiary',
            'seg_social' => 'required|string|regex:^([0-9]{12})^|unique:beneficiary',
            'prov' => 'required|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',
            'town' => 'required|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',
            'domicile' => 'required|string|regex:^([A-ZÁÉÍÓÚ]{1}[A-Za-zñáéíóú]{1,24}[\s]*)+$^',
            'num' => 'required|integer|max:255',
            'floor' => 'nullable|numeric|max:30',
            'letter' => 'nullable|string|max:1',
            'cod_post' => 'required|integer|between:24000,24999|regex:^[0-9]{5}^',
            'number_tel1' => 'required|integer|regex:^([0-9]{9})^',
            'number_tel2' => 'nullable|integer|regex:^([0-9]{9})^', 
            'email' => 'nullable|string|email|max:255',
            'ccc' => 'required|string|min:24|max:24',
            'role' => 'required|string|max:20',    
            'name_r' => 'nullable|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',
            'surname1_r' => 'nullable|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',
            'surname2_r' => 'nullable|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',          
            'doc' => 'nullable|string|regex:^[0-9]{8}[A-Za-z]{1}^',
            'related_r' => 'nullable|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^'  
        ]);
        
        $name = $request->input('name');       
        $surname1 = $request->input('surname1');
        $surname2 = $request->input('surname2');
        $dni = $request->input('dni');
        $seg_social = $request->input('seg_social');
        $prov = $request->input('prov');
        $town = $request->input('town');
        $domicile = $request->input('domicile');
        $num = $request->input('num');
        $floor = $request->input('floor');
        $letter = $request->input('letter');
        $cod_post = $request->input('cod_post');
        $number_tel1 = $request->input('number_tel1');
        $number_tel2 = $request->input('number_tel2');
        $email= $request->input('email');
        $ccc = $request->input('ccc');
        $role = $request->input('role');
        $name_r = $request->input('name_r');
        $surname1_r = $request->input('surname1_r');
        $surname2_r = $request->input('surname2_r');
        $doc = $request->input('doc');
        $related_r = $request->input('related_r');
        
        //        Asignación datos
        $user = \Auth::user();
        $beneficiary = new Beneficiary();

        $beneficiary->name = $name;
        $beneficiary->surname1 = $surname1;
        $beneficiary->surname2 = $surname2;
        $beneficiary->dni = $dni;
        $beneficiary->seg_social = $seg_social;
        $beneficiary->prov = $prov;
        $beneficiary->town = $town;
        $beneficiary->domicile = $domicile;
        $beneficiary->num = $num;
        $beneficiary->floor = $floor;
        $beneficiary->letter = $letter;
        $beneficiary->cod_post = $cod_post;
        $beneficiary->number_tel1 = $number_tel1;
        $beneficiary->number_tel2= $number_tel2;
        $beneficiary->email = $email;
        $beneficiary->ccc = $ccc;
        $beneficiary->role = $role;
        $beneficiary->name_r = $name_r;
        $beneficiary->surname1_r = $surname1_r;
        $beneficiary->surname2_r = $surname2_r;
        $beneficiary->doc = $doc;
        $beneficiary->related_r = $related_r;

        //Ejecutamos la consulta
        $beneficiary->save();
        
        return redirect()->route('registrobeneficiario.create')
                         ->with(['message'=>'Beneficiario guardado correctamente']);
    } //fin función Save
       
    public function search(){
        return view('beneficiary.beneficiarySearch');

    }
    
    public function sendSearch(Request $request){
        $beneficiary = Beneficiary::all();
        $dni = $request->input('dni');

        $dniSearch = Beneficiary::where('dni', '=', $dni)->first();
        
        if(!empty($dniSearch)){

        return redirect()->route('actualizacion', [
            'dni'=>$dni
        ]);
        }else{
             return redirect()->route('beneficiary.search')
                         ->with(['error_message'=>'DNI '.$dni. ' NO ENCONTRADO']);
        } 
    }//fin sendSearch
    
     public function actualizacion($dni){
         $beneficiary = Beneficiary::where('dni',$dni)->first();
         $name = Beneficiary::where('dni', '=', $dni)->value('name');
         $surname1 = Beneficiary::where('dni', '=', $dni)->value('surname1');
         $surname2 = Beneficiary::where('dni', '=', $dni)->value('surname2');
         $dni = Beneficiary::where('dni', '=', $dni)->value('dni');
         $seg_social = Beneficiary::where('dni', '=', $dni)->value('seg_social');
         $prov = Beneficiary::where('dni', '=', $dni)->value('prov');
         $town = Beneficiary::where('dni', '=', $dni)->value('town');
         $domicile = Beneficiary::where('dni', '=', $dni)->value('domicile');
         $num = Beneficiary::where('dni', '=', $dni)->value('num');
         $floor = Beneficiary::where('dni', '=', $dni)->value('floor');
         if(is_null($floor)){$floor='Bajo';}
         if($floor <= 0){$floor='Entreplanta';}
         $letter = Beneficiary::where('dni', '=', $dni)->value('letter');
         $cod_post = Beneficiary::where('dni', '=', $dni)->value('cod_post');
         $number_tel1 = Beneficiary::where('dni', '=', $dni)->value('number_tel1');
         $number_tel2 = Beneficiary::where('dni', '=', $dni)->value('number_tel2');
         $email = Beneficiary::where('dni', '=', $dni)->value('email');
         $ccc = Beneficiary::where('dni', '=', $dni)->value('ccc');
         $role = Beneficiary::where('dni', '=', $dni)->value('role');
         $name_r = Beneficiary::where('dni', '=', $dni)->value('name_r');
         $surname1_r = Beneficiary::where('dni', '=', $dni)->value('surname1_r');
         $surname2_r = Beneficiary::where('dni', '=', $dni)->value('surname2_r');
         $doc = Beneficiary::where('dni', '=', $dni)->value('doc');
         $related_r = Beneficiary::where('dni', '=', $dni)->value('related_r');
         
        return view('beneficiary.BeneficiaryUpdate', [
            'name'=>$name,
            'surname1'=>$surname1,
            'surname2'=>$surname2,
            'dni'=>$dni,
            'seg_social'=>$seg_social,
            'prov'=>$prov,
            'town'=>$town,
            'domicile'=>$domicile,
            'num'=>$num,
            'floor'=>$floor,
            'letter'=>$letter,
            'cod_post'=>$cod_post,
            'number_tel1'=>$number_tel1,
            'number_tel2'=>$number_tel2,
            'email'=>$email,
            'ccc'=>$ccc,
            'role'=>$role,
            'name_r'=>$name_r,
            'surname1_r'=>$surname1_r,
            'surname2_r'=>$surname2_r,
            'doc'=>$doc,
            'related_r'=>$related_r
            
                ]);
    }


    public function update(Request $request) {

        // Validaciones
        $dni = $dni = $request->input('dni');
        $id = Beneficiary::where('dni', $dni)->value('id');

        $validate = $this->validate($request, [
            
            'name' => 'required|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',
            'surname1' => 'required|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',
            'surname2' => 'required|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',         
            'dni' => 'required|string|regex:^[0-9]{8}[A-Za-z]{1}^|unique:beneficiary,dni,' . $id,
            'seg_social' => 'required|string|regex:^([0-9]{12})^|unique:beneficiary,seg_social,' . $id,
            'prov' => 'required|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',
            'town' => 'required|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',
            'domicile' => 'required|string|regex:^([A-ZÁÉÍÓÚ]{1}[A-Za-zñáéíóú]{1,24}[\s]*)+$^',
            'num' => 'required|integer|max:255',
            'floor' => 'nullable|max:30',
            'letter' => 'nullable|string|max:1',
            'cod_post' => 'required|numeric|between:24000,24999|regex:/[0-9]{5}/',
            'number_tel1' => 'required|integer|regex:^([0-9]{9})^',
            'number_tel2' => 'nullable|integer|regex:^([0-9]{9})^', 
            'email' => 'nullable|string|email|max:255',
            'ccc' => 'required|string|min:24|max:24',
            'role' => 'required|string|max:20',    
            'name_r' => 'nullable|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',
            'surname1_r' => 'nullable|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',
            'surname2_r' => 'nullable|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^',
            'doc' => 'nullable|string|regex:^[0-9]{8}[A-Za-z]{1}^',
            'related_r' => 'nullable|string|regex:^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]{1,24}[\s]*)+$^'
        ]);

        //Recoger datos

        $name = $request->input('name');
        $surname1 = $request->input('surname1');
        $surname2 = $request->input('surname2');
        $dni = $request->input('dni');
        $seg_social = $request->input('seg_social');
        $prov = $request->input('prov');
        $town = $request->input('town');
        $domicile = $request->input('domicile');
        $num = $request->input('num');
        $floor = $request->input('floor');
        if(is_null($floor))$floor = null;
        if(!is_numeric($floor) && !is_null($floor))$floor = 0;
        $letter = $request->input('letter');
        $cod_post = $request->input('cod_post');
        $number_tel1 = $request->input('number_tel1');
        $number_tel2 = $request->input('number_tel2');
        $email = $request->input('email');
        $ccc = $request->input('ccc');
        $role = $request->input('role');
        $name_r = $request->input('name_r');
        $surname1_r = $request->input('surname1_r');
        $surname2_r = $request->input('surname2_r');
        $doc = $request->input('doc');
        $related_r = $request->input('related_r');


        //Asignamos valores recibidos
        $beneficiary = Beneficiary::where('dni', $dni)->first();

        $beneficiary->name = $name;
        $beneficiary->surname1 = $surname1;
        $beneficiary->surname2 = $surname2;
        $beneficiary->dni = $dni;
        $beneficiary->seg_social = $seg_social;
        $beneficiary->prov = $prov;
        $beneficiary->town = $town;
        $beneficiary->domicile = $domicile;
        $beneficiary->num = $num;
        $beneficiary->floor = $floor;
        $beneficiary->letter = $letter;
        $beneficiary->cod_post = $cod_post;
        $beneficiary->number_tel1 = $number_tel1;
        $beneficiary->number_tel2 = $number_tel2;
        $beneficiary->email = $email;
        $beneficiary->ccc = $ccc;
        $beneficiary->role = $role;
        $beneficiary->name_r = $name_r;
        $beneficiary->surname1_r = $surname1_r;
        $beneficiary->surname2_r = $surname2_r;
        $beneficiary->doc = $doc;
        $beneficiary->related_r = $related_r;

        //Ejecutamos consulta y redireccionamos
        $beneficiary->update();
        return redirect()->route('actualizacion', [
                    'dni' => $dni
                ])->with(['message' => 'Datos de beneficiario modificados correctamente']);
    } //Fin función update

    public function listar() {

//      $beneficiary = Beneficiary::orderBy('id','asc')->get();//ordenamos de menor a mayor para ver los más antiguos primero, que deben caducar antes
        $beneficiary = Beneficiary::orderBy('id', 'asc')->paginate(10);

        return view('beneficiary.listadoBeneficiario', [
            'beneficiary' => $beneficiary
        ]);
    }// fin listar

    public function alert(){

        $datefunding = Beneficiary::where('init_lapse', '!=', null)
//                ->where('product_id', '!=', null)
                ->orderBy('final_lapse', 'asc')
                ->paginate(10);
        $dateEnd = Beneficiary::where('final_lapse', '!=', null)->get();
        
        $alertFund = Carbon::now();
        $alertEnd = Beneficiary::where('final_lapse', '<', $alertFund)->get();

        return view('beneficiary.alert',[
  
        'datefunding' => $datefunding,
        'alertEnd' => $alertEnd
    ]);
    }
    
    public function destroy($dni){

        $beneficiary = Beneficiary::where('dni',$dni)->first();

        $beneficiary->delete();
        
        return redirect()->route('beneficiary.listadoBeneficiario')
                ->with(['message'=>'Beneficiario Eliminado correctamente']);
    }//Fin destroy
      
}
