<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;
class PagoController extends Controller
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
        $this->authorize('verificarPrivilegio','VERPAG');
        $pagos =Pago::orderBy('id','Asc')->paginate(10);
        return view('pago.index',compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('verificarPrivilegio','INSPAG');
    // //('tieneacceso','rol.create');
       //$permisos=Permiso::get();
        return view('pago.create');
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
          //
       //('tieneacceso','rol.create');
       $this->authorize('verificarPrivilegio','INSPAG');
       $request->validate([
        'nombre'=>'required|string|max:50|unique:pagos,nombre',
        'descripcion'=>'required|string|max:255',
        ]);
        $rol =Pago::create($request->all());

        return redirect()->route('pagos.index')->with('status_success','Pago guardado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //  $this->authorize('tieneacceso','rol.show');
      $this->authorize('verificarPrivilegio','VERPAG');
     $pago=Pago::findOrFail($id);
     
       return view('pago.view', compact('pago')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    //  $this->authorize('tieneacceso','rol.edit');
    $this->authorize('verificarPrivilegio','MODPAG');
      $pago=Pago::findOrFail($id);
      return view('pago.edit', compact('pago'));
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
          //    $this->authorize('tieneacceso','rol.edit');
          $this->authorize('verificarPrivilegio','MODPAG');
          $pago=Pago::findOrFail($id);
           $request->validate([
                'nombre'=>'required|string|max:50|unique:pagos,nombre,'.$pago->id,
                'descripcion'=>'required|string|max:255',             
                ]);
          $pago->update($request->all());       
          return redirect()->route('pagos.index')->with('status_success','Pago Modificado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  $this->authorize('tieneacceso','pago.destroy');
        $this->authorize('verificarPrivilegio','DELPAG');
        $pago=Pago::findOrFail($id);
       
        $pago->delete();
        
        return redirect()->route('pagos.index')->with('status_success','Pago Eliminado con Exito');
    }


   
   
}
