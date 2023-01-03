<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Sucursal;
use App\Models\Itemservicio;
use App\Models\Paqueteservicio;
use App\Models\Servicio;
use App\Models\Transaccione;
use Carbon\Carbon;
class ActivoController extends Controller
{
    //
    public function index()
    {
        //
         //('tieneacceso','rol.index');
         $this->authorize('verificarPrivilegio','MOVACT');
         $items =Item::orderBy('id','Asc')->where('tipo',2)->paginate(30);
         $sucursals =Sucursal::get();
         return view('activos.index',compact('items','sucursals'));
    }

    public function activoSucursal(Request $request)
    {
        
        //
         //('tieneacceso','rol.index');
         $selec = 1;
         $suc = 0;
         $this->authorize('verificarPrivilegio','MOVACT');
         if( $request->input('sucursal_id') == 0){
            $selec = 0;
            $items =Item::orderBy('id','Asc')->where('tipo',2)->paginate(30);
         }else{
            $items =Item::where( 'sucursal_id',$request->input('sucursal_id'))->where('tipo',2)->orderBy('id','Asc')->paginate(30);
            $suc = $request->input('sucursal_id');
         }
       
         $sucursals =Sucursal::get();
         return view('activos.activos',compact('items','sucursals','selec','suc'));
    }

    public function transferir($id)
    {
        //
          //  $this->authorize('tieneacceso','pago.destroy');

          $item=Item::find($id);
          $sucursals=Sucursal::get();
         
           return view('activos.transferir', compact('item','sucursals'));

    }

    public function guardarTransferencia(Request $request, $id)
    {
       
        $request->validate([
            'cantidad'=>'required|numeric|min:1',
            'sucursal_id'=>'required|numeric|min:1',
            ]);
            $item = Item::find($id);

           
            
            $itemSucursal  =  Item::where('nombre',$item->nombre)->where('sucursal_id',$request->input('sucursal_id'))->first();
            if($itemSucursal){
                $itemSucursal->cantidad =  $itemSucursal->cantidad + $request->input('cantidad');
                $itemSucursal->save();
            }else{
                $itemNuevo  =Item::create([
                    'nombre' => $item->nombre,
                    'descripcion' => $item->descripcion,
                    'cod_item' =>  $item->cod_item,             
                    'cantidad' =>  $request->input('cantidad'),
                    'tipo' => $item->tipo,
                    'estado' =>  1,   
                    'costo_unit' =>  $item->costo_unit,   
                    'sucursal_id' => $request->input('sucursal_id')                
                  ]);
                  $itemSucursal =  $itemNuevo;
            }
            $item->cantidad = $item->cantidad - $request->input('cantidad');
            $item->save();



            $fecha = Carbon::now()->Format('Y-m-d');
            $transacciones  =Transaccione::create([
                'tipo' => 10,
                'fecha' =>  $fecha,          
                'cantidad' =>  $request->input('cantidad'),
                'item_nombre' => $item->nombre,
                'usuario' =>  auth('usuario')->user()->mail,    
                'sucursal_id' => $item->sucursal_id                
              ]);

        return redirect()->route('activos.index')->with('status_success','Transferencia Realizada con Exito');    
    }

    public function ajustes($id)
    {
        //dd($id);
        //
          //  $this->authorize('tieneacceso','pago.destroy');
          $this->authorize('verificarPrivilegio','MOVACT');
          $item=Item::find($id);
          $sucursals=Sucursal::get();
         
           return view('activos.ajuste', compact('item','sucursals'));
    }

    public function guardarAjuste(Request $request, $id)
    {
      //  dd($request);
      
        //
        $request->validate([
            'cantidad'=>'required|numeric|min:1',
            'ajuste'=>'required|numeric|min:1',
            ]);

        $itemO = Item::find($id);

            if($request->input('ajuste') == 2){
                $items = Item::where('nombre',$itemO->nombre)->get();
                foreach ($items as $key => $item) {
                  $item->costo_unit = $request->input('item_precio');
                   $item->save();
                   $servicios = $item->servicios;
              
                   foreach ($servicios as $key => $servicio) {
                       $itemsServicios = Itemservicio::where('servicio_id', $servicio->id)->get();
                       $total = 0;
                    //   echo($servicio);
                       foreach ($itemsServicios as $key => $itemsServicio) {
                           # code...
                           $itemServ = Item::find($itemsServicio->item_id);
                           $cantidad = $itemsServicio->cantidad * $itemServ->costo_unit;
                           $total = $total + $cantidad;
                       }
                       $servicio->costo = $total;
                       $servicio->save();
                //   echo($servicio);
                
                   $paquetes = $servicio->paquetes;
                       foreach ($paquetes as $key => $paquete) {
                       # code...
                       $paqueteServicios = Paqueteservicio::where('paquete_id', $paquete->id)->get();
                       $totalpaq = 0;
                   //    echo($paquete);
                           foreach ($paqueteServicios as $key => $paqueteServicio) {
                               # code...
                               $paqServ = Servicio::find($paqueteServicio->servicio_id);
                               $totalpaq = $totalpaq + $paqServ->costo;
                           }
                           $paquete->costo = $totalpaq;
                           $paquete->save();
                     //      echo($paquete);
                     
                        }
                       // echo($totalpaq);
                     //   dd($paquetes);
       
                     //  echo($servicio);
                      
                   }
    
                //    echo($item);
                }
        
            }     
         //   $itemO->costo_unit = $request->input('item_precio');
            $itemO->cantidad = $request->input('cant_final');
           $itemO->save();



           $fecha = Carbon::now()->Format('Y-m-d');
           $transacciones  =Transaccione::create([
               'tipo' => $request->input('ajuste'),
               'fecha' =>  $fecha,          
               'cantidad' =>  $request->input('cant_final'),
               'item_nombre' => $itemO->nombre,
               'usuario' =>  auth('usuario')->user()->mail,    
               'sucursal_id' => $itemO->sucursal_id                
             ]);


        return redirect()->route('activos.index')->with('status_success','Ajuste Realizado con Exito');      
    }
}
