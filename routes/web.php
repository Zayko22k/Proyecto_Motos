<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\MarcaController;
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
Route::get('/', function () {
    return view('welcome');
});

/* Ruta  vista admin -crud vehiculo- */
Route::get('adminVehiculo', [VehiculoController::class, 'indexAdmin'])
->name('vehiculo.adminVehiculo');

/*lista de rutas vehiculo*/
Route::resource('vehiculo', VehiculoController::class);

/* Ruta  vista admin -crud marca- */
Route::get('adminMarca', [MarcaController::class, 'indexAdmin'])
->name('marca.adminMarca');

/*lista de rutas marca*/
Route::resource('marca', MarcaController::class);
