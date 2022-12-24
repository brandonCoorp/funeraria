<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Usuario;
use App\Models\Persona;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //
   /* public function __construct()
    {
        $this->middleware('guest:usuario',['only'=>'index']);
        
    }*/
    public function index()
    {
        return view('login.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'mail' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('mail', 'password');
        if (Auth::guard('usuario')->attempt($credentials)) {
            return redirect()->intended('admin')
                        ->withSuccess('Signed in');
        }
  
        return redirect("/")->withError('status_success','Datos Invalidos');
    }

    public function registration()
    {
        return view('auth.registration');
    }
      
    public function customRegistration(Request $request)
    {  
       
        $request->validate([
            'nombre' => 'required',
            'apellido_materno' => 'required',
            'apellido_materno' => 'required',
            'direccion' => 'required',
            'role_id' => 'required',           
            'mail'=>'required|unique:usuarios,mail',     
            'password' => 'required|min:6',

        ]);
        $data = $request->all();
   
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        $persona = Persona::create([
            'nombre' => $data['nombre'],
            'apellido_paterno' => $data['apellido_paterno'],
            'apellido_materno' => $data['apellido_materno'],
            'direccion' => $data['direccion'],
          ]);
        
      return Usuario::create([
        'persona_id' => $persona->id,
        'role_id' => $data['role_id'],
        'mail' => $data['mail'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard()
    {
       
        if(Auth::guard('usuario')->check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}
