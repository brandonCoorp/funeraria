<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ComisionController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ClienteController;

use App\Http\Controllers\AutoCompletarController;
use App\Http\Controllers\ReporteEstadisticaController;
use App\Http\Controllers\ActivoController;
use App\Models\Usuario;

use Illuminate\Support\Facades\Gate;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('login.login');
});*/
/*Route::get('/pruebas', function () {
    //return "priabdno";
    $user  = Usuario::find(auth('usuario')->user()->id);

    $this->authorize('update-post');
    return "hila";
    return $user->verificarPermiso('INSROL');
});*/

Route::get('admin',[HomeController::class, 'home'])->name('home')->middleware('auth:usuario');

//Route::view('admin/user-add','Reportes.Reportes')->middleware('auth:usuario');;

//Route::get('dashboard', [LoginController::class, 'dashboard']); 
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest:usuario');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom'); 
//Route::get('registration', [LoginController::class, 'registration'])->name('register-user');
//Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');

Route::view('pagos','admin.pagos-list');
Route::resource('roles', RolController::class)->middleware('auth:usuario');
Route::resource('pagos', PagoController::class)->middleware('auth:usuario');
Route::resource('sucursals', SucursalController::class)->middleware('auth:usuario');
Route::resource('usuarios', UsuarioController::class)->middleware('auth:usuario');
Route::resource('items', ItemController::class)->middleware('auth:usuario');
Route::resource('servicios', ServicioController::class)->middleware('auth:usuario');
Route::resource('paquetes', PaqueteController::class)->middleware('auth:usuario');

Route::resource('compras', CompraController::class)->middleware('auth:usuario');

Route::resource('comisions', ComisionController::class)->middleware('auth:usuario');
Route::resource('contratos', ContratoController::class)->middleware('auth:usuario');
Route::resource('clientes', ClienteController::class)->middleware('auth:usuario');

Route::get('contratos/generear/{id}', [ContratoController::class, 'VerContrato'])->name('vercontrato')->middleware('auth:usuario');
Route::get('contratos/descargar/{id}', [ContratoController::class, 'DowloadContrato'])->name('descargarcontrato')->middleware('auth:usuario');


//Shearchs


Route::get('search', [AutoCompletarController::class, 'index'])->name('search');
Route::get('autocomplete', [AutoCompletarController::class, 'search'])->name('autocomplete');
Route::post('buscar', [AutoCompletarController::class, 'buscar'])->name('buscar')->middleware('auth:usuario');





Route::post('reportes', [ReporteEstadisticaController::class, 'obtenerReporte'])->name('reportes')->middleware('auth:usuario');

Route::get('reportes', [ReporteEstadisticaController::class, 'reportes'])->name('reportes.index')->middleware('auth:usuario');


//Activos
Route::get('activos', [ActivoController::class, 'index'])->name('activos.index')->middleware('auth:usuario');
Route::post('activos', [ActivoController::class, 'activoSucursal'])->name('activo.suc')->middleware('auth:usuario');

Route::get('activos/transferencia/{id}', [ActivoController::class, 'transferir'])->name('activos.transferir')->middleware('auth:usuario');
Route::get('activos/ajuste/{id}', [ActivoController::class, 'ajustes'])->name('activos.ajuste')->middleware('auth:usuario');
Route::post('activos/transferencia/{id}', [ActivoController::class, 'guardarTransferencia'])->name('activos.savetransferir')->middleware('auth:usuario');

Route::post('activos/ajuste/{id}', [ActivoController::class, 'guardarAjuste'])->name('activos.saveajuste')->middleware('auth:usuario');

