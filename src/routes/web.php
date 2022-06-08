<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AutorizacoesController;

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
    session()->forget('USUARIO_ID');
    return view('index');
});

Route::get('/ListaUsuarios', [UsuarioController::class, 'index']);

Route::prefix('/auth')->group(function () {
    Route::post('/login', [AutorizacoesController::class, 'login']);
});

Route::prefix('/usuario')->group(function () {
    Route::get('/all', [UsuarioController::class, 'all']);
    Route::get('/create', [UsuarioController::class, 'create']);
    Route::post('/store', [UsuarioController::class, 'store']);
    Route::get('/find', [UsuarioController::class, 'find']);
    Route::get('/find/{id}', [UsuarioController::class, 'findById']);
    Route::delete('/{id}', [UsuarioController::class, 'delete']);
    Route::put('/update', [UsuarioController::class, 'update']);
});