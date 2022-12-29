<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Persona;
use App\Models\Role;
use App\Models\Usuariofotofecha;
use DateTime;
use Hash;
use Storage;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios =Usuario::orderBy('id','Asc')->paginate(3);
        /*$usuarios =Usuario::join("roles","usuarios.role_id","=","roles.id")
        ->select("usuarios.id","usuarios.fecha_nac","usuarios.foto","personas.nombre",
        "personas.apellido_paterno","personas.apellido_materno",
        "usuarios.mail","personas.direccion","roles.nombre as rol","roles.id as rol_id")
        ->join("personas","usuarios.persona_id","=","personas.id")
        ->orderBy('usuarios.id','Asc')->paginate(3);*/
        //$persona  = $usuarios->persona;
      // dd($usuarios);
        return view('usuario.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles=Role::get();
        return view('usuario.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
           //('tieneacceso','rol.create');
       //  dd($request);
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'direccion' => 'required|max:255',
            'fecha_nac' => ['required', 'date','after:1920/01/01','before:2023/01/01'],           
            'mail'=>'required|max:255|email|unique:usuarios,mail',     
            'password' => 'required|min:6|max:255',
            'foto' =>  ['mimes:jpg,png,jfif,jpeg','max:2048'],
            'rol' => ['required','numeric','min:1']

        ]);

       // dd($request->only('fecha_nac'));
        if($request->hasFile('foto')){
                $image=$request->file('foto');
                $extension = $request->file('foto')->extension();
                $nombre = $request->input('mail').'.'.$extension;
                $ruta=public_path().'/dist/img/';

                $image->move($ruta,$nombre);
                $url = 'dist/img/'.$nombre;
                
               
               
            }else{
                $url = 'dist/img/default-150x150.png';
            }
            $persona = Persona::create($request->all());
            $usuario  =Usuario::create([
                'persona_id' => $persona->id,
                'role_id' => $request->input('rol'),
                'mail' =>  $request->input('mail'),                  
                'password' => Hash::make($request->input('password'))
              ]);
              Usuariofotofecha::create([
                'usuario_id' => $usuario->id,
                'fecha_nac' =>  $request->input('fecha_nac'),
                'foto' =>  $url             
              ]);

            return redirect()->route('usuarios.index')->with('status_success','Usuario guardado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario=Usuario::findOrFail($id);
        $persona = Persona::find($usuario->persona_id);
        $roles =  Role::get(); 
        
       return view('usuario.edit', compact('usuario','roles','persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $usuario=Usuario::find($id);
        $persona=Persona::find($usuario->persona_id);
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'direccion' => 'required|max:255',
            'fecha_nac' => ['required', 'date','after:1920/01/01','before:2023/01/01'],           
            'mail'=>'required|max:255|email|unique:usuarios,mail,'.$usuario->id,     
            'foto' =>  ['mimes:jpg,png,jfif,jpeg','max:2048'],
            'rol' => ['required','numeric','min:1'],
            'password' => 'max:255',

        ]);
       // dd($request);
        $persona->update($request->all());  

        if($request->hasFile('foto')){
            $image=$request->file('foto');
            $extension = $request->file('foto')->extension();
            $nombre = $request->input('mail').'.'.$extension;
            $ruta=public_path().'/dist/img/';

            if(Storage::disk('public')->exists($usuario->usuariofotofechas[0]->foto) ){
                if($usuario->usuariofotofechas[0]->foto != 'dist/img/default-150x150.png'){
                     Storage::disk('public')->delete($usuario->usuariofotofechas[0]->foto);}
            }
            $image->move($ruta,$nombre);
            $url = 'dist/img/'.$nombre;

            $usuario->usuariofotofechas[0]->foto =  $url;    
        }
        if( $request->input('password') != null){      
        $usuario->password = Hash::make($request->input('password'));

        }
        $usuario->usuariofotofechas[0]->fecha_nac = $request->input('fecha_nac');
        $usuario->mail = $request->input('mail');
        $usuario->role_id = $request->input('rol');
        $usuario->usuariofotofechas[0]->save();
        $usuario->save();

        return redirect()->route('usuarios.index')->with('status_success','Usuario Modificado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $usuario=Usuario::findOrFail($id);
        $persona_id = $usuario->persona_id;
        if(Storage::disk('public')->exists($usuario->usuariofotofechas[0]->foto) ){

            if($usuario->usuariofotofechas[0]->foto != 'dist/img/default-150x150.png'){
                Storage::disk('public')->delete($usuario->usuariofotofechas[0]->foto);}
        }
        Usuariofotofecha::where('usuario_id', $usuario->id)->delete();
        $usuario->delete();

        Persona::where('id', $persona_id)->delete();
        
        
        return redirect()->route('usuarios.index')->with('status_success','Usuario Eliminado con Exito');
        
    }
}
