<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Persona;
class ClienteController extends Controller
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
        $this->authorize('verificarPrivilegio','VERCLI');
        $clientes =Cliente::orderBy('id','Asc')->paginate(10);
        return view('cliente.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('verificarPrivilegio','INSCLI');
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
        $this->authorize('verificarPrivilegio','INSCLI');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('verificarPrivilegio','VERCLI');
        $cliente= null;
        if(is_numeric($id)){
            $cliente=Cliente::find($id);
            if($cliente){
                
                return view('cliente.view', compact('cliente')); 
            }
        }
        return redirect()->route('clientes.index')->withErrors(['msg' => 'No Existe Cliente con ese Id']);  
  
         
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
        $this->authorize('verificarPrivilegio','MODCLI');
        $cliente=Cliente::find($id);
       
         return view('cliente.edit', compact('cliente'));
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
        $this->authorize('verificarPrivilegio','MODCLI');
        $request->validate([
            'nombre' => 'required|string|max:50',
            'apellido_paterno' => 'required|string|max:50',
            'apellido_materno' => 'required|string|max:50',
            'direccion' => 'required|max:255',
            'telefono'=>'required|numeric|min:11111111|max:11111111111',
        ]);
      
        $cliente= null;
        if(is_numeric($id)){
            $cliente=Cliente::find($id);
            if($cliente){
                $persona=Persona::find($cliente->id);
                $cliente->telefono = $request->input('telefono');
                $persona->nombre = $request->input('nombre');
                $persona->apellido_paterno = $request->input('apellido_paterno');
                $persona->apellido_materno = $request->input('apellido_materno');
                $persona->direccion = $request->input('direccion');
                $persona->save();
                $cliente->save();
                
        return redirect()->route('clientes.index')->with('status_success','Cliente Modificado con Exito');  
            }
        }
        return redirect()->route('clientes.index')->withErrors(['msg' => 'Modificacion Fracasó No Existe Cliente con ese Id']);  
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
        $this->authorize('verificarPrivilegio','DELCLI');
    }
}
