<?php

namespace App\Http\Controllers;

use DB; // usar la base de datos

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\App;

use App\Models\User;

class UserController extends Controller
{
    use AuthenticatesUsers;
    Public $date;

    public function __construct()
    {
        $this->date = new \DateTime();
        $this->middleware('guest')->except('logout');
    }

    public function ingresar()
    {
        return view('portal.auth.login');
    }
    public function registrarse()
    {
        return "<h1> BLOQUEADO </h1>";
    }
    
    public function credenciales(Request $request){
      
        $usuario = User::where('email',$request->email)->first();
        if(!$usuario){
            return back()->with('error', 'No tienes habilitado un usuario!');
        }
        if($usuario->estado != 1){
            return back()->with('error', 'Tu usuario está BLOQUEADO!');
        }
        $pass = Hash::check($request->password, $usuario->password);
        if($pass) {
            Auth::login($usuario);
            $request->session()->regenerate();
            return redirect()->route('home');
        }else{
            return back()->with('error', 'Las credenciales ingresadas no son válidas!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
 

    
}

