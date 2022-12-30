<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Carbon\Carbon;
use DB;
class ReporteEstadisticaController extends Controller
{
    //
    public function ObtenerCompraXMes(){
        $comprasXmes = Compra::select(DB::raw("SUM(costo) as count, TO_CHAR(fecha,'Month') as mes"))->groupBy('mes')->get();
      //  dd($comprasXmes);
        return  $comprasXmes;
    }
    public function ObtenerPaqueteXAño(){
        $año = Carbon::now()->Format('Y');
        $paquetes = Compra::join("paquetes","compras.paquete_id","=","paquetes.id")
        ->select(DB::raw("paquetes.nombre, Count(compras.paquete_id) as count"))
        ->whereYear('compras.fecha', $año)
        ->groupBy('paquetes.nombre')->get();
        return  $paquetes;
    }
}
