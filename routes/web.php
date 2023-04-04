<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/tiposobjetos', [App\Http\Controllers\TiposObjetosController::class, 'index'])->name('indexTipoObjetos');
Route::get('/tiposobjetosdata', [App\Http\Controllers\TiposObjetosController::class, 'getData'])->name('getDataObjetos');
Route::post('/store/tiposobjetos', [App\Http\Controllers\TiposObjetosController::class, 'store'])->name('storeTipo');
Route::get('/getData/tiposobjetos/{id}', [App\Http\Controllers\TiposObjetosController::class, 'getDataTipo'])->name('getDataTipo');
Route::post('/update/tiposobjetos', [App\Http\Controllers\TiposObjetosController::class, 'update'])->name('updateTipo');
Route::post('/delete/tiposobjetos', [App\Http\Controllers\TiposObjetosController::class, 'delete'])->name('deleteTipo');