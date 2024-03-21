<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tramites1', function () {
    return datatables()
        ->eloquent(\App\Models\Tramit::query())
        ->addColumn('btn1', 'actions')
        ->rawColumns(['btn1'])
        ->toJson();
});

Route::get('tramites', function () {
    return datatables()
        ->eloquent(\App\Models\Tramit::query())
        ->addColumn('btn', 'actionsT')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('clientes', function () {
    return datatables()
        ->eloquent(\App\Models\Client::query())
        ->addColumn('btn2', 'actionsC')
        ->rawColumns(['btn2'])
        ->toJson();
});



//GESTION DOCUMENTAL

Route::get('recibidos', function () {
    return datatables()
        ->eloquent(\App\Models\Received::query())
        ->addColumn('btnR', 'actionsR')
        ->rawColumns(['btnR'])
        ->toJson();
});

Route::get('enviados', function () {
    return datatables()
        ->eloquent(\App\Models\Sent::query())
        ->addColumn('btnE', 'actionsE')
        ->rawColumns(['btnE'])
        ->toJson();
});
