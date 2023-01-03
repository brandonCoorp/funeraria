<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Pago;
use App\Models\Paquete;
use App\Models\Item;
use App\Models\Servicio;
use App\Models\Itemservicio;

use App\Models\Comisione;
use App\Models\Contrato;
use App\Models\Cliente;
use App\Models\Persona;
use Carbon\Carbon;
class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('verificarPrivilegio','VERCPA');
        $compras =Compra::orderBy('id','Asc')->paginate(10);
       
        return view('compra.index',compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('verificarPrivilegio','INSCPA');
        $pagos=Pago::get();
        $paquetes=Paquete::get();
        
        return view('compra.create', compact('pagos','paquetes'));
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
        $this->authorize('verificarPrivilegio','INSCPA');
        $fecha = Carbon::now()->Format('Y-m-d');
        //dd($fecha);
        $fecha_actual = $fecha;
        $fecha = 'after_or_equal:'.$fecha;
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'direccion' => 'required|max:255',
            'fecha' => ['required', 'date',$fecha],           
            'paquete' => 'required|numeric|min:1',
            'pago' => 'required|numeric|min:1',
            'telefono'=>'required|numeric|min:11111111|max:11111111111',
        ]);

       // $this->ActualizarStock($request->input('paquete'));



        $cliente =null;
        //dd($request);
        if($request->input('cliente_id')){
           
            $clientefind = Cliente::find($request->input('cliente_id'));
            if($clientefind->persona->nombre == $request->input('nombre') && $clientefind->persona->apellido_paterno == $request->input('apellido_paterno') && $clientefind->persona->apellido_materno == $request->input('apellido_materno') )
            {
                $cliente = $clientefind;
            }else{
                $persona = Persona::create($request->all());
                $cliente  =Cliente::create([
                    'persona_id' => $persona->id,
                    'telefono' => $request->input('telefono'),
                    'tipo' =>  1,                  
                  ]);
            }
        }else{
            $persona = Persona::create($request->all());
            $cliente  =Cliente::create([
                'persona_id' => $persona->id,
                'telefono' => $request->input('telefono'),
                'tipo' =>  1,                  
              ]);
        }
     //   $cliente = Cliente::

        $paquete = Paquete::find($request->input('paquete'));

//dd(auth('usuario')->user()->mail);

        $compra =  Compra::create([
            'costo'=>$paquete->costo,
            'fecha'=>$fecha_actual,
            'fecha_entrega'=>$request->input('fecha'),
            'pago_id'=>$request->input('pago'),
            'paquete_id'=>$paquete->id,
            'cliente_id'=>$cliente->id
          ]);
          
          $comision =  Comisione::create([
          'mail' =>auth('usuario')->user()->mail,
          'estado' =>1,
          'monto' =>$paquete->costo/10,
          'compra_id' =>$compra->id
          ]);

          $contrato =  Contrato::create([
            'motivo'=>$paquete->nombre ,
            'estado'=>1,
            'monto'=>$paquete->costo,
            'cliente_id'=>$cliente->id,
            'compra_id'=>$compra->id
            ]);
        
      //  dd($request);
      $this->ActualizarStock($request->input('paquete'));

        return redirect()->route('compras.index')->with('status_success','Compra Realizada con Exito');

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
    $this->authorize('verificarPrivilegio','VERCPA');
      $compra=Compra::findOrFail($id);
      $servicios = $compra->paquete->servicios;
       // dd($itemservicio->id);
      $paquetes=Paquete::get();
      $pagos=Pago::get();
     return view('compra.view', compact('paquetes','servicios','pagos','compra'));
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
        $this->authorize('verificarPrivilegio','MODCPA');
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
        $this->authorize('verificarPrivilegio','MODCPA');
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
        $this->authorize('verificarPrivilegio','DELCPA');
    }

    private function ActualizarStock($id){
       
        $paquete = Paquete::find($id);
        $servicios = $paquete->servicios;
        foreach ($servicios as $key => $servicio) {
           // $tems = $servicio->items;
           $itemServicios =  Itemservicio::where('servicio_id',$servicio->id)->get();
           foreach ($itemServicios as $key => $itemServicio) {
            # code...
            $item = Item::find( $itemServicio->item_id);
            if($item->tipo == 2){
                $resta = $item->cantidad - $itemServicio->cantidad;
              //  echo($item);
                $item->cantidad = $resta;
                   $item->save();
            //    echo($item);
            }
          
         
           }
       //    echo($itemServicios);
        }
//dd($paquete);
    }
}




