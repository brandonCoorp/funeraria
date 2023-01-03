<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('verificarPrivilegio','VERSUC'); 
        $sucursals =Sucursal::orderBy('id','Asc')->paginate(10);
        return view('sucursal.index',compact('sucursals'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('verificarPrivilegio','INSSUC'); 
        return view('sucursal.create');
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
        $this->authorize('verificarPrivilegio','INSSUC'); 
       $request->validate([
        'nombre'=>'required|string|max:50|unique:sucursal,nombre',
        'descripcion'=>'required|string|max:255',
        'direccion'=>'required',
        'telefono'=>'required|numeric|min:11111111|max:11111111111',
        ]);
        $sucursal =Sucursal::create($request->all());

        return redirect()->route('sucursals.index')->with('status_success','Sucursal guardada con Exito');
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
        $this->authorize('verificarPrivilegio','VERSUC'); 
        $sucursal =Sucursal::findOrFail($id);
     
       return view('sucursal.view', compact('sucursal'));
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
         //  $this->authorize('tieneacceso','rol.edit');
         $this->authorize('verificarPrivilegio','MODSUC'); 
         $sucursal =Sucursal::findOrFail($id);
      return view('sucursal.edit', compact('sucursal'));
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
        $this->authorize('verificarPrivilegio','MODSUC'); 
        //
          //    $this->authorize('tieneacceso','rol.edit');
          $sucursal =Sucursal::findOrFail($id);
           $request->validate([
                'nombre'=>'required|string|max:50|unique:sucursal,nombre,'.$sucursal->id,
                'descripcion'=>'required|string|max:255', 
                'direccion'=>'required', 
                'telefono'=>'required|numeric|min:11111111|max:11111111111',
                           
                ]);
          $sucursal->update($request->all());       
          return redirect()->route('sucursals.index')->with('status_success','Sucursal Modificada con Exito');
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
        $this->authorize('verificarPrivilegio','DELSUC'); 
        //  $this->authorize('tieneacceso','pago.destroy');
        $sucursal =Sucursal::findOrFail($id);
       
        $sucursal->delete();
        
        return redirect()->route('sucursals.index')->with('status_success','Sucursal Eliminada con Exito');
    }
}
