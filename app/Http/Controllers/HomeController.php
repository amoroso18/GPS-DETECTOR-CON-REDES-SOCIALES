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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function crear_usuario()
    {
        return view('home');
    }
    public function bandeja_usuario()
    {
        return view('home');
    }
    public function crear_enlaces()
    {
        return view('home');
    }
    public function ver_enlaces()
    {
        return view('home');
    }
    public function bandeja_enlaces()
    {
        return view('home');
    }
    public function vista(Request $request)
    {
        if(!isset($request->comenzar) && isset($request->video)){ // rapido con menos eficacia
            return "redireccionar solo con ip";
        }elseif(isset($request->video)){ // lento y eficaz
            return "mostrar solovideo";
        }else{
            return redirect()->route('login');
        }
    }
    
}
