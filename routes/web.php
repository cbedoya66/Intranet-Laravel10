<?php

use App\Http\Controllers\AbogadoController;
use App\Http\Controllers\AsignarController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\EnviadosController;
use App\Http\Controllers\PermisionController;
use App\Http\Controllers\RecibidosController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TramiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/tramite', TramiteController::class)->names('tramite');
    Route::get('/tramite/eliminar/{id}', [TramiteController::class, 'eliminar']);
    Route::post('/tramite/reporteU/', [TramiteController::class, 'reporteU']);
    Route::post('/tramite/reporteP/', [TramiteController::class, 'reporteP']);
    Route::post('/tramite/reporteE/', [TramiteController::class, 'reporteE']);
    Route::post('/tramite/encuesta/', [TramiteController::class, 'encuesta']);

    //Encuestas
    Route::resource('/encuestas', EncuestaController::class)->names('encuestas');

    //usuarios Roles y permisos
    Route::resource('/roles', RoleController::class)->names('roles');
    Route::resource('/permisos', PermisionController::class)->names('permisos');
    Route::resource('/usuarios', AsignarController::class)->names('asignar');

    //abogados
    Route::resource('/abogados', AbogadoController::class)->names('abogado');
    Route::post('/abogado/reporte/', [AbogadoController::class, 'reporte']);
    Route::get('/abogado/archivo/{archivo}', [AbogadoController::class, 'archivo']);

    //Clientes
    Route::resource('/clientes', ClienteController::class)->names('clientes');
    Route::get('/cliente/eliminar/{id}', [ClienteController::class, 'eliminar']);

    //Gestion Documental
    //Recibidos
    Route::resource('/recibido', RecibidosController::class)->names('recibido');
    Route::get('/recibido/eliminar/{id}', [RecibidosController::class, 'eliminar']);
    Route::post('/recibido/reporte/', [RecibidosController::class, 'reporte']);
    Route::post('/recibido/reporteAbogado/', [RecibidosController::class, 'reporteAbogado']);
    Route::post('/recibido/codBarras/', [RecibidosController::class, 'codBarras']);

    //Enviados
    Route::resource('/enviado', EnviadosController::class)->names('enviado');
    Route::get('/enviado/eliminar/{id}', [EnviadosController::class, 'eliminar']);
    Route::post('/enviado/reporte/', [EnviadosController::class, 'reporte']);
    Route::post('/enviado/reporteAbogado/', [EnviadosController::class, 'reporteAbogado']);
    Route::post('/enviado/codBarras/', [EnviadosController::class, 'codBarras']);
});
