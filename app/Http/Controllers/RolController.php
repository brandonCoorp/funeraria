<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permiso;
use App\Models\Privilegio;
class RolController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       //('tieneacceso','rol.index');
       $this->authorize('verificarPrivilegio','VERROL'); 
        $roles =Role::orderBy('id','Asc')->paginate(10);
        return view('rol.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      // //('tieneacceso','rol.create');
      $this->authorize('verificarPrivilegio','INSROL'); 
            $permisos=Permiso::get();
            return view('rol.create', compact('permisos'));
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
       $this->authorize('verificarPrivilegio','INSROL'); 
        $request->validate([
        'nombre'=>'required|string|max:50|unique:roles,nombre',
        'descripcion'=>'required|string|max:255',
        ]);
   $rol =Role::create($request->all());

  $permisos = $request->get('permiso');


  if($permisos){
    foreach($permisos as $permiso_id){
      $permiso=Permiso::findOrFail($permiso_id);
        if($permiso){
            $privilegio =Privilegio::create([
              'permiso_id' =>$permiso->id ,
              'role_id' =>$rol->id ,
              'cod_permiso' =>$permiso->cod_permiso,
            ]);
        }                  
    }
  }   
  


  //    $rol->permisos()->sync($request->get('permiso'));
   //}
        return redirect()->route('roles.index')->with('status_success','Rol guardado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $this->authorize('verificarPrivilegio','VERROL'); 
        //
      //  $this->authorize('tieneacceso','rol.show');
     // dd($rol);
     $rol=Role::findOrFail($id);
     $permiso_rol=[];
     $privilegios = $rol->privilegios;
     foreach($privilegios as $privilegio){
       $permiso_rol[]= $privilegio->permiso_id;
       
      }
      $permisos=Permiso::get();
     
       return view('rol.view', compact('permisos','rol','permiso_rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)   //cambiamos el $id por una variable de tipo rol para que nos de todo los datos del rol
    {
        //cuando pasamos id buscamos de este modo ->  $rol=Role::findOrFail($id);
      //  $this->authorize('tieneacceso','rol.edit');
      $this->authorize('verificarPrivilegio','MODROL'); 
      $rol=Role::findOrFail($id);
        $permiso_rol=[];
       
        $privilegios = Privilegio::where('role_id', $rol->id)->get();
       foreach($privilegios as $privilegio){
         $permiso_rol[]= $privilegio->permiso_id;
         
        }
        $permisos=Permiso::get();
       
        
       return view('rol.edit', compact('permisos','rol','permiso_rol'));
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
          //    $this->authorize('tieneacceso','rol.edit')
          $this->authorize('verificarPrivilegio','MODROL'); ;
          $rol=Role::findOrFail($id);
           $request->validate([
                'nombre'=>'required|string|max:50|unique:roles,nombre,'.$rol->id,
                'descripcion'=>'required|string|max:255',             
                ]);
 
          $permisos = $request->get('permiso');
         //$privilegios =  $rol->privilegios;
          $rol->update($request->all());       
          Privilegio::where('role_id', $rol->id)->delete();
          if($permisos){
            foreach($permisos as $permiso_id){
              $permiso=Permiso::findOrFail($permiso_id);
                if($permiso){
                    $privilegio =Privilegio::create([
                      'permiso_id' =>$permiso->id ,
                      'role_id' =>$rol->id ,
                      'cod_permiso' =>$permiso->cod_permiso,
                    ]);
                }                  
            }
          }
         
          return redirect()->route('roles.index')->with('status_success','Rol Modificado con Exito');
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
      //  $this->authorize('tieneacceso','rol.destroy');
      $this->authorize('verificarPrivilegio','DELROL'); 
      $rol=Role::findOrFail($id);
        Privilegio::where('role_id', $rol->id)->delete();
        $rol->delete();
        
        return redirect()->route('roles.index')->with('status_success','Rol Eliminado con Exito');
        
    }
}
