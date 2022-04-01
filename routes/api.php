<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuscaEnderecoCepController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\PedidoController;

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

Route::prefix('v1')->group(function() {

    Route::get('/', function() { return 'Hello world!'; });

    Route::post('/endereco/{cep}',[BuscaEnderecoCepController::class, 'buscaEnderecoPorCep']);

    Route::get('/clientes', function(){ return 'Clientes'; });

    Route::resource('produtos', ProdutoController::class);

    Route::resource('/pedidos', PedidoController::class);

});
