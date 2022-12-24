<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
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


Route::view('admin','admin.dashboard')->name('home');

Route::view('admin/user-add','admin.user-add-form');

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