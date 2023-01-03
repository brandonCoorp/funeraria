<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Contrato;
use App\Models\Servicio;
use App\Models\Comisione;
use App\Models\Pago;
use App\Models\Paquete;
use App\Models\Item;
use App\Models\Sucursal;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Role;
use App\Models\Transaccione;
use Carbon\Carbon;
use DB;
class ReporteEstadisticaController extends Controller
{
    //
    public function ObtenerCompraXMes(){
        $año = Carbon::now()->Format('Y');
        $comprasXmes = Compra::whereYear('fecha', $año)->select(DB::raw("SUM(costo) as count, TO_CHAR(fecha,'Month') as mes"))->groupBy('mes')->get();
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
    public function reportes(){
        $this->authorize('verificarPrivilegio','All'); 
        $datos =Compra::orderBy('id','Asc')->paginate(10);
        $nombreDatos = ["Id","Cliente","Monto", "Fecha","Fecha de Entrega", "Pago", "Paquete" ];
        return view('Reportes.compra',compact('datos','nombreDatos'));

    }
    public function obtenerReporte(Request $request){

    //  dd($request->input('selectReporte'));
    $this->authorize('verificarPrivilegio','All'); 

        switch ($request->input('selectReporte')) {
            case "usuarios":
                $datos =Usuario::orderBy('id','Asc')->paginate(10);
                $nombreDatos = ['Id','Nombre',
                'Apellido Paterno',
                'Apellido Materno',
                'Direccion',
                'Fecha Nacimiento',
                'Correo',
                'Rol'];
                return view('Reportes.usuario',compact('datos','nombreDatos'));
                break;
            case "clientes":
                $datos =Cliente::orderBy('id','Asc')->paginate(10);
                $nombreDatos = ['Id','Nombre',
                'Apellido Paterno',
                'Apellido Materno',
                'Direccion','Telefono' ];
                return view('Reportes.cliente',compact('datos','nombreDatos'));
                break;
            case "roles":
                $datos =Role::orderBy('id','Asc')->paginate(10);
                $nombreDatos = ['Id','Nombre',
                'Descripcion' ];
                return view('Reportes.rol',compact('datos','nombreDatos'));
                break;
            case "sucursales":
                  $datos =Sucursal::orderBy('id','Asc')->paginate(10);
                $nombreDatos = ["Id",'Nombre',
                'Descripcion',
                'Direccion',
                'Telefono' ];
                return view('Reportes.sucursal',compact('datos','nombreDatos'));
                break;
            case "items":
                $datos =Item::orderBy('id','Asc')->paginate(10);
                $nombreDatos = ["Id",'Codigo Item',
                'Nombre',
                'Descripcion',
                'Cantidad',
                'Tipo',
                'Estado',
                'Costo Unitario',
                'Sucursal' ];
                return view('Reportes.item',compact('datos','nombreDatos'));
                break;
            case "servicios":
                $datos =Servicio::orderBy('id','Asc')->paginate(10);
                $nombreDatos = ["Id",'Codigo Servicio',
                'Nombre',
                'Descripcion',
                'Costo' ];
                return view('Reportes.servicio',compact('datos','nombreDatos'));
                break;
            case "paquetes":
                $datos =Paquete::orderBy('id','Asc')->paginate(10);
                $nombreDatos = ["Id",'Codigo Paquete',
                'Nombre',
                'Descripcion',
                'Costo' ];
                return view('Reportes.paquete',compact('datos','nombreDatos'));
                break;
            case "compras":
                $datos =Compra::orderBy('id','Asc')->paginate(10);
                $nombreDatos = ["Id","Cliente","Monto", "Fecha","Fecha de Entrega", "Pago", "Paquete" ];
                return view('Reportes.compra',compact('datos','nombreDatos'));
                break;
            case "comisiones":
                $datos =Comisione::orderBy('id','Asc')->paginate(10);
                $nombreDatos = ["Id",'Correo',
                'Estado',
                'Monto',
                'Fecha',
                'Compra Id' ];
                return view('Reportes.comision',compact('datos','nombreDatos'));
                break;
            case "contratos":
                $datos =Contrato::orderBy('id','Asc')->paginate(10);
                $nombreDatos = ["Id",'Motivo',
                'Estado',
                'Monto',
                'Cliente',
                'Fecha',
                'Compra Id'];
                return view('Reportes.contrato',compact('datos','nombreDatos'));
                break;
            case "activos":
                $datos =Transaccione::orderBy('id','Asc')->paginate(10);
                $nombreDatos = ['Id','Tipo de Movimiento',
                'Cantidad',
                'Fecha Realizada',
                'Nombre del Item',
                'Usuario',
                'Sucursal' ];
                return view('Reportes.activos',compact('datos','nombreDatos'));
                break;
            case "pagos":
                $datos =Pago::orderBy('id','Asc')->paginate(10);
                $nombreDatos = ['Id','Nombre',
                'Descripcion' ];
                return view('Reportes.pago',compact('datos','nombreDatos'));
                break;
            default;
            $datos =Compra::orderBy('id','Asc')->paginate(10);
            $nombreDatos = ["Id","Cliente","Monto", "Fecha","Fecha de Entrega", "Pago", "Paquete" ];
            return view('Reportes.compra',compact('datos','nombreDatos'));
            break;
        }
    }
}
