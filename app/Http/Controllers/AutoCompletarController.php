<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
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
}
