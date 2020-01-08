<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Beneficiary;
use Carbon\Carbon;

class ProductController extends Controller
{
    // aseguramos usuario autenticado
    public function __construct(){
        $this->middleware('auth');
    }
    
    //
    public function create(){
        $usus= \Auth::user()->role;    
        if($usus == 'Admin'){
       
        return view('product.product');
        }else{
            return redirect()->route('home')
                         ->with(['error_message'=>'NECESITA SER ADMINISTRADOR PARA INSERTAR NUEVOS PRODUCTOS!!']);
        }
    }
    
    public function save (Request $request){

//        Validaciones
        
        $validate = $this->validate($request, [
            'cod' => 'required|numeric|unique:product',
            'description' => 'required|max:200',
            'funding' => 'required|regex:^[+-]?([0-9]*[.])?[0-9]+^',
            'lapse' => 'required|numeric|digits_between:1,48',
            'center' => 'required|string|max:100',
            'comments' => 'required|string|max:200',
            'stock' => 'required|numeric'   
        ]);
        
        $cod = $request->input('cod');       
        $description = $request->input('description');
        $funding = $request->input('funding');
        $funding = (float)str_replace(',', '.', $funding);
        $lapse = $request->input('lapse');
        $center = $request->input('center');
        $comments = $request->input('comments');
        $stock = $request->input('stock');

        
        //Asignación datos
        $user = \Auth::user();
        $product = new Product();

        $product->cod = $cod;
        $product->description = $description;
        $product->funding = $funding;
        $product->lapse = $lapse;
        $product->center = $center;
        $product->comments = $comments;
        $product->stock = $stock;

        //Ejecutamos la consulta
        $product->save();
        
        return redirect()->route('registro.create')
                         ->with(['message'=>'Producto guardado correctamente']);
    }//Fin save
    
    public function listar() {
//        $product = Product::orderBy('id', 'asc')->get(); //ordenamos de menor a mayor para ver los más antiguos primero, que deben caducar antes
        $product = Product::orderBy('id', 'asc')->paginate(6);

        return view('product.listadoProducto', [
            'product' => $product
        ]);
    }
    

    public function searchProduct(){

        $usus= \Auth::user()->role;    
        if($usus == 'Admin'){
            return view('product.productSearch');
        }else{
            return redirect()->route('product.listadoProducto')
                     ->with(['error_message'=>'NECESITA SER ADMINISTRADOR PARA MODIFICAR PRODUCTOS!!']);
        }
    }
    
    public function searchProductPrest(){

            return view('product.productSearchPrest');
 
    }
    
    public function searchCatchProduct(Request $request){
   
        $description = $request->input('description');

        $productSearchFind =Product::orderBy('id', 'asc')
                ->where('description', 'LIKE', '%'.$description.'%')
                ->paginate(5);
        if (!empty($productSearchFind[0])) {
//            return view('product.productSearchCatch',compact('productSearchFind'));
            return view('product.productSearchCatch',["description" => $description,"productSearchFind" => $productSearchFind]);
        } else {
            return redirect()->route('product.productSearch')
                            ->with(['message' => 'PRODUCTO ' . $description . ' NO ENCONTRADO']);
        }
    } //fin searchCatchProduct
    
    public function edicionProducto($id){
        $usus= \Auth::user()->role;    
         if($usus == 'Admin'){      
             $product= Product::findOrFail($id);
         
             return view('product.ProductUpdate', compact('product'));
        }else{
                return redirect()->route('product.listadoProducto')
                         ->with(['error_message'=>'NECESITA SER ADMINISTRADOR PARA MODIFICAR PRODUCTOS!!']);
            }
    }
    
    
    public function updateProducto (Request $request, $id){

       // Validaciones
        $id =Product::where('id',$id)->value('id');       
        $validate = $this->validate($request, [
            'cod' => 'required|numeric|unique:product,cod,'.$id,
            'description' => 'required|max:200',
            'funding' => 'required|regex:^[+-]?([0-9]*[.])?[0-9]+^',
            'lapse' => 'required|numeric|digits_between:1,48',
            'center' => 'required|string|max:100',
            'comments' => 'required|string|max:200',
            'stock' => 'required|numeric'   
        ]);        
        //Recoger datos
                     
        $cod = $request->input('cod');       
        $description = $request->input('description');
        $funding = $request->input('funding');
        $lapse = $request->input('lapse');
        $center = $request->input('center');
        $comments = $request->input('comments');
        $stock = $request->input('stock');
        
        
        //Asignamos valores recibidos
        $product= Product::findOrFail(($id));

        $product->cod = $cod;
        $product->description = $description;
        $product->funding = $funding;
        $product->lapse = $lapse;
        $product->center = $center;
        $product->comments = $comments;
        $product->stock = $stock;
    
        //Ejecutamos consulta y redireccionamos
        $product->update();
        return redirect()->route('product.listadoProducto')
                         ->with(['message'=>'Datos de producto modificados correctamente']);
    } //Fin función update
    
    
    public function destroy($id){

        $usus= \Auth::user()->role;    
        if($usus == 'Admin'){          
            $product = Product::findOrFail($id);

            $product->delete();
        
            return redirect()->route('product.listadoProducto')
                    ->with(['message'=>'Producto Eliminado correctamente']);
        }else{
                return redirect()->route('product.listadoProducto')
                         ->with(['error_message'=>'NECESITA SER ADMINISTRADOR PARA ELIMINAR PRODUCTOS!!']);
        }        
    }//Fin destroy
    
    public function searchAssignment($id){
        $product = Product::findOrFail($id);
        return view('product.searchAssignment', [
            'product' => $product
        ]);
    }
    
    public function prestamo(Request $request, $id) {
        
        //Obtenemos los datos necesarios
        $product = Product::findOrFail($id);
        $dni = $request->input('dni');
        $beneficiary = Beneficiary::where('dni', "=", $dni)->first();
        $name = Beneficiary::where('dni', "=", $dni)->value('name');
        $surname1 = Beneficiary::where('dni', "=", $dni)->value('surname1');

        if ($beneficiary) {
            $beneficiary = Beneficiary::where('dni', "=", $dni)->first();

            $product = Product::where('id', $id)->first();
            $stock = Product::where('id', $id)->select('stock')->value('stock');
            $dateEnd = Product::where('id', $id)->select('lapse')->value('lapse');
            $newstock = $stock - 1; // ej: $stock = 2 -1= 1
//            nos aseguramos de que tenga stock el producto        
            if ($newstock > 0) {
                $product->stock = $newstock;

                $product_id = Beneficiary::where('dni', "=", $dni)->select('product_id')->value('product_id');

                if (!is_null($product_id)) {
                    return redirect()->route('product.productSearchCatch', compact('productSearch'))
                                    ->with(['error_message' => 'EL BENEFICIARIO YA DISFRUTA DE UN PRODUCTO EN PRÉSTAMO!']);
                } else {
                    $product_id = $id;
                    $beneficiary->name = $name;
                    $beneficiary->dni = $dni;
                    $beneficiary->product_id = $product_id;
                    $init_lapse= $beneficiary->updated_at;
                    $init_lapse= Carbon::now();
                    $beneficiary->init_lapse = $init_lapse;
                    
                    $lapse = Carbon::now();
                    switch($dateEnd){
//                        case '0':
//                            $final_lapse = $lapse->addHour(1);
//                            break;
                        case '1':
                            $final_lapse = $lapse->addMonth(1);
                            break;
                        case '6':
                            $final_lapse = $lapse->addMonth(6);
                            break;
                        case '12':
                            $final_lapse = $lapse->addMonth(12);
                            break;
                        case '18':
                            $final_lapse = $lapse->addMonth(18);
                            break;
                        case '24':
                            $final_lapse = $lapse->addMonth(24);
                            break;
                        case '36':
                            $final_lapse = $lapse->addMonth(36);
                            break;
                        
                    }
                    $beneficiary->final_lapse = $final_lapse;
                    $beneficiary->update();
                }
        
//            $product->update();
                $product->save();
                return redirect()->route('beneficiary.alert')
                                ->with(['message' => 'Producto prestado correctamente a '.$name. ' '.$surname1. ' con documento nº ' . $dni . ' .']);
            } else {
                return redirect()->route('product.productSearchCatch', compact('productSearch'))
                                ->with(['error_message' => 'PRODUCTO NO PRESTABLE POR FALTA DE EXISTENCIAS']);
            }
        } else {
            return redirect()->route('product.searchAssignment', [
                                'product' => $product])
                            ->with(['error_message' => 'DNI ' . $dni . ' NO ENCONTRADO']);
        }
    }//Fin prestamo
    
    
//    public function prestamoDeleted($product_id) {
    public function prestamoDeleted($dni) {   
        //Obtenemos los datos necesarios
//        $beneficiary = Beneficiary::where('product_id', "=", $product_id)->first();
        $beneficiary = Beneficiary::where('dni', "=", $dni)->first();
        
//        $id= $product_id;
        $product_id= Beneficiary::where('dni', "=", $dni)->value('product_id');
//        die(var_dump($beneficiary));
//        dd($product_id);

        $product = Product::where('id','=', $product_id)->first();
//        die(var_dump($product));
        $id = Product::where('id','=', $product_id)->value('id');
//        dd($id);
        $stock = Product::where('id', $id)->select('stock')->value('stock');
//        dd($stock);
        $dateEnd = Product::where('id', $id)->select('lapse')->value('lapse');
        $newstock = $stock + 1; // ej: $stock = 2 + 1= 3    
        $product->stock = $newstock;
//        dd($newstock);
        $product->save();
        
        $product_id = Beneficiary::where('product_id', "=", $product_id)->select('product_id')->value('product_id');
//        dd($product_id);
//        $dni = Beneficiary::where('product_id', "=", $product_id)->select('dni')->value('dni');
        $beneficiary->dni = $dni;
        $newProduct_id = Null;
        $product_id = $newProduct_id;
        $product->id= $product_id;
        $beneficiary->product_id = $product_id;
        $init_lapse = null;
        $final_lapse = null;
        $beneficiary->init_lapse = $init_lapse;
        $beneficiary->final_lapse = $final_lapse;
//        dd($dni);

        $beneficiary->update();    
//                $product->save();
                return redirect()->route('beneficiary.alert')
                                ->with(['message' => 'PRÉSTAMO ANULADO CORRECTAMENTE AL ' . $dni . ' .']);
    }//Fin prestamoDeleted
    
    public function viewProduct($product_id){
        
        $mostrar = Product::where('id', '=', $product_id)->select('description')->value('description');
        
        return redirect()->route('beneficiary.alert')
                                ->with(['message' => 'EL PRÉSTAMO CORRESPONDE CON EL PRODUCTO: ' . $mostrar ]);
    }

}
