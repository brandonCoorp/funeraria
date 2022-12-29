<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Pago;
use App\Models\Paquete;
use App\Models\Comisione;
use App\Models\Contrato;
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
        $fecha = Carbon::now()->Format('Y-m-d');
        //dd($fecha);
        $fecha_actual = $fecha;
        $fecha = 'after_or_equal:'.$fecha;
        $request->validate([
            'nombre' => 'required',
            'apellido_materno' => 'required',
            'apellido_materno' => 'required',
            'direccion' => 'required',
            'fecha' => ['required', 'date',$fecha],           
            'paquete' => 'required|numeric|min:1',
            'pago' => 'required|numeric|min:1',

        ]);
        $paquete = Paquete::find($request->input('paquete'));
//dd(auth('usuario')->user()->mail);

        $compra =  Compra::create([
            'costo'=>$paquete->costo,
            'fecha'=>$fecha_actual,
            'fecha_entrega'=>$request->input('fecha'),
            'pago_id'=>$request->input('pago'),
            'paquete_id'=>$paquete->id,
            'cliente_id'=>$request->input('cliente_id')
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
            'cliente_id'=>$request->input('cliente_id'),
            'compra_id'=>$compra->id
            ]);
        
      //  dd($request);
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
    }
}
