<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Paquete;
use App\Models\Compra;

use App\Models\Cliente;
use App\Models\Usuario;
class AutoCompletarController extends Controller
{
    //

    public function index()
    {
        return view('compra.search');
    }
 
    public function search($search)
    {
       /* $items = Item::select('nombre as name','id','cod_item')
        ->whereRaw('LOWER(nombre) LIKE (?) ',["%{$request->term}%"])->get();
        $items->map(function($items) {

            $items->nombre = "julios";
        });
return $items;*/
$clientes =Cliente::select("clientes.id","clientes.telefono","clientes.tipo","personas.nombre as nombre",
"personas.apellido_paterno","personas.apellido_materno",
"personas.direccion")
->join("personas","clientes.persona_id","=","personas.id")
->whereRaw('LOWER(personas.nombre) LIKE (?) ',["%{$search}%"])
->orwhereRaw('LOWER(personas.apellido_paterno) LIKE (?) ',["%{$search}%"])
->orwhereRaw('LOWER(personas.apellido_materno) LIKE (?) ',["%{$search}%"])->get();
;
$clientes->map(function($cliente) {

    $cliente->name = $cliente->nombre." ".$cliente->apellido_paterno." ".$cliente->apellido_materno;
});



/*$clientes = Cliente::select('nombre as name','id','cod_item')
        ->whereRaw('LOWER(nombre) LIKE (?) ',["%{$request->term}%"])->get();
        $clientes->map(function($clientes) {

            $clientes->nombre = "julios";
        });*/
return $clientes;



        /*  return Item::select('nombre','id')
          ->whereRaw('LOWER(nombre) LIKE (?) ',["%{$request->term}%"])
          ->pluck('nombre');*/
       //   User::whereRaw('LOWER(nombre) LIKE (?) ',["%{$request->term}%"]);
    } 

    public function buscar(Request $request)
    {
   //  dd($request->buscar);
$clientes =Cliente::select("clientes.id","clientes.telefono","clientes.tipo","personas.nombre as nombre",
"personas.apellido_paterno","personas.apellido_materno",
"personas.direccion")
->join("personas","clientes.persona_id","=","personas.id")
->whereRaw('LOWER(personas.nombre) LIKE (?) ',["%{$request->buscar}%"])
->orwhereRaw('LOWER(personas.apellido_paterno) LIKE (?) ',["%{$request->buscar}%"])
->orwhereRaw('LOWER(personas.apellido_materno) LIKE (?) ',["%{$request->buscar}%"])->get();
;
$clientes->map(function($cliente) {

    $cliente->name = $cliente->nombre." ".$cliente->apellido_paterno." ".$cliente->apellido_materno;
});


$usuarios =Usuario::select("usuarios.id as idUsuario","personas.nombre as nombre",
"personas.apellido_paterno","personas.apellido_materno",
"personas.direccion")
->join("personas","usuarios.persona_id","=","personas.id")
->whereRaw('LOWER(personas.nombre) LIKE (?) ',["%{$request->buscar}%"])
->orwhereRaw('LOWER(personas.apellido_paterno) LIKE (?) ',["%{$request->buscar}%"])
->orwhereRaw('LOWER(personas.apellido_materno) LIKE (?) ',["%{$request->buscar}%"])->get();
;
$usuarios->map(function($usuario) {

    $usuario->name = $usuario->nombre." ".$usuario->apellido_paterno." ".$usuario->apellido_materno;
});


$items =Item::whereRaw('LOWER(nombre) LIKE (?) ',["%{$request->buscar}%"])
->orwhereRaw('LOWER(descripcion) LIKE (?) ',["%{$request->buscar}%"])->get();

$paquetes =Paquete::whereRaw('LOWER(nombre) LIKE (?) ',["%{$request->buscar}%"])
->orwhereRaw('LOWER(descripcion) LIKE (?) ',["%{$request->buscar}%"])->get();

$compras =Compra::join("clientes","compras.cliente_id","=","clientes.id")
->select("compras.id","personas.nombre","personas.apellido_paterno","personas.apellido_materno",
       "personas.direccion",'compras.fecha')
->join("personas","clientes.persona_id","=","personas.id")
->whereRaw('LOWER(personas.nombre) LIKE (?) ',["%{$request->buscar}%"])
->orwhereRaw('LOWER(personas.apellido_paterno) LIKE (?) ',["%{$request->buscar}%"])
->orwhereRaw('LOWER(personas.apellido_materno) LIKE (?) ',["%{$request->buscar}%"])->get();
$compras->map(function($compra) {

    $compra->name = $compra->nombre." ".$compra->apellido_paterno." ".$compra->apellido_materno;
});

//dd($usuarios->count());

return view('Custom.busqueda',compact('usuarios','clientes','items','paquetes','compras'));

    } 
}
