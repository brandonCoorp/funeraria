<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Visita;
use DB;
use Carbon\Carbon;
class HomeController extends Controller
{
    //
    public function home(){

       // return view('admin.dashboard', compact('item','sucursals'));
       $año = Carbon::now()->Format('Y');
       $mes = Carbon::now()->Format('m');
      $visitas = Visita::sum('contador');
      $clientes = Cliente::count();

      
       $compraMes = Compra::whereYear('fecha', $año)
       ->whereMonth('fecha', $mes)
       ->count();  
       $compraCostoMes = Compra::whereYear('fecha', $año)
       ->whereMonth('fecha', $mes)
       ->sum('costo');
      
       $comprasXmes = Compra::select(DB::raw("SUM(costo) as count, TO_CHAR(fecha,'TMMonth') as mes"))->groupBy('mes')->get();
       $paquetes = Compra::join("paquetes","compras.paquete_id","=","paquetes.id")
       ->select(DB::raw("paquetes.nombre, Count(compras.paquete_id) as count"))
       ->whereYear('compras.fecha', $año)
       ->groupBy('paquetes.nombre')->get();
   
    
        $cantidadPagos = Compra::whereYear('fecha', $año)->count();
        $pagos = Compra::join("pagos","compras.pago_id","=","pagos.id")
        ->select(DB::raw("pagos.nombre, Count(compras.pago_id) as promedio, Count(compras.pago_id)*100/".$cantidadPagos." as prom"))
        ->whereYear('compras.fecha', $año)
        ->groupBy('pagos.nombre')->get();






        return view('admin.dashboard',compact('comprasXmes','compraCostoMes','compraMes','clientes','visitas','paquetes','pagos'));
    }

}
