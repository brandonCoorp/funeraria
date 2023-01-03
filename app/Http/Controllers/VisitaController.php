<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visita;
use App\Models\Opcion;
use Session;
class VisitaController extends Controller
{
    //
   public function obtenerCantidadVisita($id){
        $visita = Visita::find($id);
        $visita->contador =  $visita->contador +1 ;
        $resp  = $visita->contador ;
        $visita->save();
        return  $resp;
    }

    public function actualizarEstilo($conf, $id){
       // session['estilo'] = $id;
       $opcion = Opcion::find($id);
       $opcion->estilo = $conf;
       $opcion->save();
        return "resp estils".$id.$conf;
        
    }

    public function actualizarTema($conf, $id){
      //  session(['tema' =>  $id]);
      //  return $_SESSION["temas"];
        $opcion = Opcion::find($id);
        $opcion->tema = $conf;
        $opcion->save();
        return "resp tema".$id.$conf;
    }
}
