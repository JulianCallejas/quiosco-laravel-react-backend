<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    //Cerrar sesion
    Route::post('/logout', [AuthController::class, 'logout']);

    //Almacenar Ordenes
    //Con apiResource habilita la misma ruta para todos los metodos get, post etc y no tener que crear cada una por separado
    Route::apiResource('/pedidos', PedidoController::class);


});

//Con apiResource habilita la misma ruta para todos los metodos get, post etc y no tener que crear cada una por separado
Route::apiResource('/categorias',CategoriaController::class);
Route::apiResource('/productos',ProductoController::class);

//Autenticacion

Route::post('/registro', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);