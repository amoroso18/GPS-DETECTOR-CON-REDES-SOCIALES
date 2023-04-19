<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TipoFondoPantalla;
use App\Models\Enlaces;
use App\Models\EnlacesDetector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

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
        return view('pages.creacion-usuario');
    }
    public function crear_usuario_save(Request $request)
    {
        if(isset($request->name) && isset($request->email) && isset($request->password)){
            try {
                $new = new User;
                $new->name = $request->name;
                $new->email =  trim($request->email);
                $new->password = Hash::make($request->password);
                $new->users_create_id = Auth::user()->id;
                $new->estado = 1;
                $new->save();
                return redirect()->back()->with('success', 'Usuario creado correctamente, no olvides la contraseña, por seguridad no se puede restablecer');  
            } catch (\Throwable $th) {
                return $th;
                return redirect()->back()->with('error', 'Ocurrio un problema al intentar registrar un nuevo usuario');   
            }
        }else{
            return redirect()->back()->with('warning', 'Debes completar el formulario');   
        }
    }
    public function modificar_usuario_save(Request $request)
    {
        if(isset($request->token) && isset($request->status)){
            $token = Crypt::decryptString($request->token);
            try {
                $new = User::find($token);
                $new->users_modifica_id = Auth::user()->id;
                $new->estado = $request->status;
                $new->save();
                return redirect()->back()->with('success', 'Usuario modificado correctamente, no olvides la contraseña, por seguridad no se puede restablecer');  
            } catch (\Throwable $th) {
                return $th;
                return redirect()->back()->with('error', 'Ocurrio un problema al intentar modificar un nuevo usuario');   
            }
        }else{
            return redirect()->back()->with('warning', 'Los valores enviados no son  correctos');   
        }
    }
    
    public function bandeja_usuario()
    {
        $data = [ 
            'usuarios' => User::get()
        ];
        return view('pages.bandeja-usuarios',$data);
    }
    public function crear_enlaces()
    {
        $data = [ 
            'data' => TipoFondoPantalla::get()
        ];
        return view('pages.creacion-url',$data);
    }
    public function guardar_enlaces(Request $request)
    {

        if(isset($request->tipo_fondo_pantallas_id) && isset($request->titulo) && isset($request->descripcion)){
            try {
                $new = new Enlaces;
                $new->tipo_fondo_pantallas_id = $request->tipo_fondo_pantallas_id;
                $new->titulo = $request->titulo;
                $new->descripcion = $request->descripcion;
                $new->users_create_id = Auth::user()->id;
                $new->save();
                return redirect()->back()->with('success', 'Registrado correctamente');  
            } catch (\Throwable $th) {
                return $th;
                return redirect()->back()->with('error', 'Ocurrio un problema');   
            }
        }else{
            return redirect()->back()->with('warning', 'Los valores enviados no son  correctos');   
        }
    }


    
    public function ver_enlaces(Request $request)
    {
        if(isset($request->token)){
            $token = Crypt::decryptString($request->token);
            try {
                $enlace = Enlaces::find($token);
                $contenido = EnlacesDetector::where('enlaces_id',$token)->get();
                $data = [
                    'token' => $request->token,
                    'enlace' => $enlace,
                    'contenido' => $contenido,
                ];
                return view('pages.ver-enlace',$data);
            } catch (\Throwable $th) {
                return $th;
                return redirect()->back()->with('error', 'Ocurrio un problema');   
            }
        }else{
            return redirect()->back()->with('warning', 'Los valores enviados no son  correctos');   
        }
    }
    public function bandeja_enlaces()
    {
        $data = [ 
            'data' => Enlaces::get()
        ];
        return view('pages.bandeja',$data);
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
