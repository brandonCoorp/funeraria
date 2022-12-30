<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaqueteController;

use App\Http\Controllers\AutoCompletarController;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\ReporteEstadisticaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/odontologos/search/{nombre}', [OdontologoController::class, 'search']);
Route::get('paquete/servicios/{id}', [PaqueteController::class, 'getServicioPaquete']);
Route::get('autocomplete/{id}', [AutoCompletarController::class, 'search']);

Route::get('visita/{id}', [VisitaController::class, 'obtenerCantidadVisita']);
Route::get('ReporteEstadistica/comprasMes', [ReporteEstadisticaController::class, 'ObtenerCompraXMes']);
Route::get('ReporteEstadistica/paquetesAño', [ReporteEstadisticaController::class, 'ObtenerPaqueteXAño']);
