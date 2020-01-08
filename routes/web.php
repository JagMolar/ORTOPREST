<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//use App\Product;
//use App\Identity;
//use App\User;


Route::get('/', function () {
    
//    $products = Product::all();
//    foreach($products as $product){
////        var_dump($product);
//        echo $product->description."<br/>";
////        echo $product->user->name.' '.$product->user->surname."<br/>";
//        echo "<hr/>";
//    }
////    die();
//    
//    $identities = Identity::all();
//    foreach($identities as $identity){
//        var_dump($identity);
//        echo $identity->name."<br/>";
////        echo $identity->user->name."<br/>";
//        echo "<hr/>";
//    }
//    
//    $users = User::all();
//    foreach($users as $user){
//        var_dump($user);
//        echo $user->role."<br/>";
//        echo "<hr/>";
//        echo $user->identity->name."Hola<br/>";
//        echo 'IMPRIME';
//        echo "<hr/>";
//    }
//    die();
    
    return view('welcome');
});

//GENERALES

Auth::routes();

//Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/searchGoogle', 'HomeController@searchGoogle')->name('searchGoogle');
Route::get('/home/searchSacyl', 'HomeController@searchSacyl')->name('searchSacyl');
Route::get('/home/searchHospLeon', 'HomeController@searchHospLeon')->name('searchHospLeon');
Route::get('/home/searchJcyl', 'HomeController@searchJcyl')->name('searchJcyl');
Route::get('/home/help-guide', 'UserController@helpGuide')->name('user.helpguide');

//USUARIO GESTION Y ACTUALIZACION
//Nuevos
Route::get('/registro', 'UserController@newUser')->name('user.newUser');//VISTA
Route::post('/user/register', 'UserController@newRegister')->name('user.newRegister');//RUTA DE RECOGIDA Y GUARDADO
//Usuarios del sistema
Route::get('/Configuracion', 'UserController@config')->name('config');//VISTA
Route::post('/user/update', 'UserController@update')->name('user.update');//RUTA DE RECOGIDA Y GUARDADO

//LISTAR
Route::get('/user/listado-usuarios', 'UserController@listar')->name('user.listadoUser');

//BUSCAR
Route::get('/user/search', 'UserController@search')->name('user.search'); //VISTA SEARCH
Route::post('/user/sendSearch', 'UserController@sendSearch')->name('user.sendSearch');//ENVIO DE DATO DNI
//ACTUALIZAR
Route::get('/user/nuevos-datos/{id}', 'UserController@actualizarUser')->name('user.actualizarUser');//RECOGIDA DE DATOS DE BD
Route::post('/actualizar/user-update', 'UserController@updateUser')->name('user.UpdateUser');//RECOGIDA Y GUARDADO.lUEGO REDIRIGE

//ELIMINAR
Route::delete('/user/{id}', 'UserController@destroy')->name('user.destroy');



//BENEFICIARIO
//CREAR Y GUARDAR
Route::get('/registro-beneficiario', 'BeneficiaryController@create')->name('registrobeneficiario.create');//VISTA GESTION
Route::post('/beneficiary/save', 'BeneficiaryController@save')->name('registrobeneficiario.save');//RECOGIDA Y GUARDADO.lUEGO REDIRIGE

//LISTAR
Route::get('/beneficiary/listado-activo', 'BeneficiaryController@listar')->name('beneficiary.listadoBeneficiario');

//BUSCAR
Route::get('/beneficiary/search', 'BeneficiaryController@search')->name('beneficiary.search'); //VISTA SEARCH
Route::post('/beneficiary/sendSearch', 'BeneficiaryController@sendSearch')->name('beneficiary.sendSearch');//ENVIO DE DATO DNI

//ACTUALIZAR
Route::get('/actualizacion/nuevos-datos/{dni}', 'BeneficiaryController@actualizacion')->name('actualizacion');//RECOGIDA DE DATOS DE BD
Route::post('/actualizacion/update', 'BeneficiaryController@update')->name('beneficiary.BeneficiaryUpdate');//RECOGIDA Y GUARDADO.lUEGO REDIRIGE

//ALERTAS
Route::get('/beneficiary/alert', 'BeneficiaryController@alert')->name('beneficiary.alert');

//ELIMINAR
Route::delete('/beneficiary/{dni}', 'BeneficiaryController@destroy')->name('beneficiary.destroy');


//PRODUCTO
//CREAR Y GUARDAR
Route::get('/registro-producto', 'ProductController@create')->name('registro.create');
Route::post('/product/save', 'ProductController@save')->name('registro.save');

//LISTAR
Route::get('/product/listado-productos', 'ProductController@listar')->name('product.listadoProducto');

//MOSTRAR
Route::get('/product/viewProduct/{product_id}', 'ProductController@viewProduct')->name('product.viewProduct');

//ELIMINAR
Route::delete('/product/{id}', 'ProductController@destroy')->name('product.destroy');

//EDITAR
Route::get('/product/nuevos-datos/{id}', 'ProductController@edicionProducto')->name('product.ProductUpdate');//RECOGIDA DE DATOS DE BD
Route::put('/product/actualizacion-datos/{id}', 'ProductController@updateProducto')->name('product.Update');//GUARDADO DATOS DE BD

//BUSCAR
Route::get('/product/searchProduct', 'ProductController@searchProduct')->name('product.productSearch'); //VISTA SEARCH
Route::get('/product/productSearchCatch', 'ProductController@searchCatchProduct')->name('product.productSearchCatch');//COTEJO Y MESTRA DE DATOS

//GESTIONAR PRESTAMO
Route::get('/product/searchProductPrest', 'ProductController@searchProductPrest')->name('product.productSearchPrest'); //VISTA SEARCH
//Route::get('/product/productSearchCatchPrest', 'ProductController@searchCatchProduct')->name('product.productSearchCatchPrest');//COTEJO DATOS     
Route::get('/product/searchAssignment/{id}', 'ProductController@searchAssignment')->name('product.searchAssignment'); //VISTA SEARCH
Route::get('/product/{id}/prestamo', 'ProductController@prestamo')->name('product.productLending');//COTEJO DE DATOS
Route::get('/product/actualizacion-prestamo/{dni}', 'ProductController@prestamoDeleted')->name('product.prestamoDeleted');//GUARDADO DATOS DE BD
//Route::get('/product/actualizacion-prestamo/{product_id}', 'ProductController@prestamoDeleted')->name('product.prestamoDeleted');