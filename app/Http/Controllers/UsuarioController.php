<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Persona;
use App\Models\Role;
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
      //  $usuarios =Usuario::orderBy('id','Asc')->persona->paginate(10);
        $usuarios =Usuario::join("roles","usuarios.role_id","=","roles.id")
        ->select("usuarios.id","usuarios.fecha_nac","usuarios.foto","personas.nombre",
        "personas.apellido_paterno","personas.apellido_materno",
        "usuarios.mail","personas.direccion","roles.nombre as rol","roles.id as rol_id")
        ->join("personas","usuarios.persona_id","=","personas.id")
        ->orderBy('usuarios.id','Asc')->paginate(3);
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
          // dd($request->only('fecha_nac'));
        $request->validate([
            'nombre' => 'required',
            'apellido_materno' => 'required',
            'apellido_materno' => 'required',
            'direccion' => 'required',
            'fecha_nac' => ['required', 'date','after:1920/01/01','before:2023/01/01'],           
            'mail'=>'required|email|unique:usuarios,mail',     
            'password' => 'required|min:6',
            'foto' =>  ['mimes:jpg,png,jfif,jpeg','max:2048'],
            'rol' => 'required',

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
            Usuario::create([
                'persona_id' => $persona->id,
                'role_id' => $request->input('rol'),
                'mail' =>  $request->input('mail'),
                'fecha_nac' =>  $request->input('fecha_nac'),
                'foto' =>  $url,                   
                'password' => Hash::make($request->input('password'))
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
            'nombre' => 'required',
            'apellido_materno' => 'required',
            'apellido_materno' => 'required',
            'direccion' => 'required',
            'fecha_nac' => ['required', 'date','after:1920/01/01','before:2023/01/01'],           
            'mail'=>'required|email|unique:usuarios,mail,'.$usuario->id,     
            'foto' =>  ['mimes:jpg,png,jfif,jpeg','max:2048'],
            'rol' => 'required',

        ]);
       // dd($request);
        $persona->update($request->all());  

        if($request->hasFile('foto')){
            $image=$request->file('foto');
            $extension = $request->file('foto')->extension();
            $nombre = $request->input('mail').'.'.$extension;
            $ruta=public_path().'/dist/img/';

            if(Storage::disk('public')->exists($usuario->foto) ){
                if($usuario->foto != 'dist/img/default-150x150.png'){
                     Storage::disk('public')->delete($usuario->foto);}
            }
            $image->move($ruta,$nombre);
            $url = 'dist/img/'.$nombre;

            $usuario->foto =  $url;    
        }
        if( $request->input('password') != null){      
        $usuario->password = Hash::make($request->input('password'));

        }
        $usuario->fecha_nac = $request->input('fecha_nac');
        $usuario->mail = $request->input('mail');
        $usuario->role_id = $request->input('rol');
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
        if(Storage::disk('public')->exists($usuario->foto) ){

            if($usuario->foto != 'dist/img/default-150x150.png'){
                Storage::disk('public')->delete($usuario->foto);}
        }
        $usuario->delete();
        Persona::where('id', $persona_id)->delete();
        
        
        return redirect()->route('usuarios.index')->with('status_success','Usuario Eliminado con Exito');
        
    }
}
