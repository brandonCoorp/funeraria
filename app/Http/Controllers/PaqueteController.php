<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;
use App\Models\Servicio;
use App\Models\Paqueteservicio;
use isInteger;
class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('verificarPrivilegio','VERPAQ');
        $paquetes =Paquete::orderBy('id','Asc')->paginate(10);
        return view('paquete.index',compact('paquetes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('verificarPrivilegio','INSPAQ');
        $servicios=Servicio::get();
            return view('paquete.create', compact('servicios'));
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
        $this->authorize('verificarPrivilegio','INSPAQ');
      //  dd($request);
        $request->validate([
            'nombre'=>'required|string|max:50|unique:paquetes,nombre',
            'descripcion'=>'required|string|max:255',
            'cod_paquete'=>'required|min:5|max:10|unique:paquetes,cod_paquete',
            'costo'=>'required|numeric|min:1',
            ]);
            $paquete =Paquete::create($request->all());
    
            if($request->input('serviciosid') != null){
                $servicios_id = $request->input('serviciosid');
                foreach ($servicios_id as $key => $servicio_id) {
                    $servicio=Servicio::find($servicio_id);
                    if($servicio != null){
                        Paqueteservicio::create([
                            'paquete_id' =>$paquete->id ,
                            'servicio_id' =>$servicio->id ,
                            'cod_servicio' =>$servicio->cod_servicio
                          ]);
                    } 
                }
     
            };
    
            return redirect()->route('paquetes.index')->with('status_success','Paquete guardado con Exito');
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
          //  $this->authorize('tieneacceso','rol.edit');
      $this->authorize('verificarPrivilegio','VERPAQ');
      $paquete=Paquete::findOrFail($id);
      $paqueteservicios = $paquete->servicios;
       // dd($itemservicio->id);
      $servicios=Servicio::get();
      foreach($paqueteservicios as $paqueteservicio){
        $servicio_id[]= $paqueteservicio->id;
        
       }
      
     return view('paquete.view', compact('paquete','servicios','paqueteservicios','servicio_id'));
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
      $this->authorize('verificarPrivilegio','MODPAQ');       
      $paquete=Paquete::findOrFail($id);
      $paqueteservicios = $paquete->servicios;
       // dd($itemservicio->id);
      $servicios=Servicio::get();
      foreach($paqueteservicios as $paqueteservicio){
        $servicio_id[]= $paqueteservicio->id;
        
       }
      
     return view('paquete.edit', compact('paquete','servicios','paqueteservicios','servicio_id'));
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
        $this->authorize('verificarPrivilegio','MODPAQ'); 
        $paquete=Paquete::findOrFail($id);
        $request->validate([
            'nombre'=>'required|string|max:50|unique:servicios,nombre,'.$paquete->id,
            'descripcion'=>'required|string',
            'cod_paquete'=>'required|min:5|max:5|unique:paquetes,cod_paquete,'.$paquete->id,
            'costo'=>'required|numeric|min:1',
            ]);
            
           $paquete->update($request->all());
           Paqueteservicio::where('paquete_id', $paquete->id)->delete();
           $servicios_id = $request->get('serviciosid');
           if($servicios_id){
            foreach($servicios_id as $servicio_id){
              $servicio=Servicio::findOrFail($servicio_id);
                if($servicio){
                    $paqueteservicio =  Paqueteservicio::create([
                        'paquete_id' =>$paquete->id ,
                        'servicio_id' =>$servicio->id ,
                        'cod_servicio' =>$servicio->cod_servicio
                      ]);
                }                
            }
          }
  
    return redirect()->route('paquetes.index')->with('status_success','Paquete Modificado con Exito');
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
      $this->authorize('verificarPrivilegio','DELPAQ');     
      $paquete=Paquete::findOrFail($id);
      if($paquete != null){
        Paqueteservicio::where('paquete_id', $paquete->id)->delete();
        $paquete->delete();
      }
     
      
      return redirect()->route('paquetes.index')->with('status_success','Paquete Eliminado con Exito');
    }

    public function getServicioPaquete($id)
    {
     
        //  $this->authorize('tieneacceso','pago.destroy');
        if(preg_match('/^\d+$/',$id)) {
         

       $paquete=Paquete::find($id);
      
          if($paquete){
            return $paquete->servicios;
           // dd($paquete->servicios);
  
          }
        }    
        return [];
    }
}
