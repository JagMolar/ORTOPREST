<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function searchGoogle(){

            return redirect()->away('https://www.google.com');

    }
    
    public function searchSacyl(){

            return redirect()->away('https://www.saludcastillayleon.es/es');
   
    }
    
    public function searchHospLeon(){

            return redirect()->away('https://www.saludcastillayleon.es/CHLeon/es/hospital-leon');
        
    }

    public function searchJcyl(){
      
            return redirect()->away('https://www.jcyl.es/');

    }
      
}
