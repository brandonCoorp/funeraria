<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visita;
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
}
