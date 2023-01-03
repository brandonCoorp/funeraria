<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('verificarPrivilegio','VERCTT');
        $contratos =Contrato::orderBy('id','Asc')->paginate(5);
        return view('contrato.index',compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('verificarPrivilegio','INSCTT');
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
        $this->authorize('verificarPrivilegio','INSCTT');
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
        $this->authorize('verificarPrivilegio','VERCTT');
        $contrato=Contrato::find($id);
        
       
         return view('contrato.view', compact('contrato'));
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
        $this->authorize('verificarPrivilegio','MODCTT');
        $contrato=Contrato::find($id);
        $compra= $contrato->compra;
       
         return view('contrato.edit', compact('compra','contrato'));
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
        $this->authorize('verificarPrivilegio','MODCTT');
        $request->validate([
            'estado'=>'required|numeric|min:1|max:4',
            ]);
            $contrato = Contrato::find($id);
            if($contrato){
                $contrato->estado = $request->input('estado');
                $contrato->save();
            }

        return redirect()->route('contratos.index')->with('status_success','Contrato Modificado con Exito');  
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
        $this->authorize('verificarPrivilegio','DELCTT');
    }

    public function VerContrato($id)
    {
        //
        $this->authorize('verificarPrivilegio','VSRCTT');
        $contrato=Contrato::find($id);
        $servicios = $contrato->compra->paquete->servicios;
        foreach($servicios as $servicio){
            $items[]= $servicio->items;       
           }
           
         return view('contrato.ver', compact('contrato','servicios'));
    }
}
