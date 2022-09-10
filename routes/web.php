<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\TerrenoController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'mostrar'])->name('dashboard');
});


Route::resource('terrenos',TerrenoController::class);
Route::resource('clientes',ClienteController::class);
Route::resource('reservas',ReservaController::class);

Route::get('/reporteReservasxClientes',[ReporteController::class,'reporteReservasxClientes'])->name('reportes.reporteReservasxClientes');
Route::post('/reservas/obtenerDatoTerreno',[ReservaController::class,'obtenerDatosTerreno'])->name('reservas.obtenerDatosTerreno');