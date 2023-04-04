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


/* Rutas Tipos de Objetos */
Route::get('/tiposobjetos', [App\Http\Controllers\TiposObjetosController::class, 'index'])->name('indexTipoObjetos');
Route::get('/tiposobjetosdata', [App\Http\Controllers\TiposObjetosController::class, 'getDataTable'])->name('getDataObjetos');
Route::post('/store/tiposobjetos', [App\Http\Controllers\TiposObjetosController::class, 'store'])->name('storeTipo');
Route::get('/getData/tiposobjetos/{id}', [App\Http\Controllers\TiposObjetosController::class, 'getData'])->name('getDataTipo');
Route::post('/delete/tiposobjetos', [App\Http\Controllers\TiposObjetosController::class, 'delete'])->name('deleteTipo');
Route::post('/update/tiposobjeto/{id}', [App\Http\Controllers\TiposObjetosController::class, 'update'])->name('updateTipo');


/* Rutas Propiedades de Objetos */
Route::get('/propiedadesdeobjetos', [App\Http\Controllers\PropiedadesController::class, 'index'])->name('indexPropiedadesDeObjetos');
Route::get('/propiedadesobjetossdata', [App\Http\Controllers\PropiedadesController::class, 'getDataTable'])->name('getDataPropiedades');
Route::post('/store/propiedadesobjetos', [App\Http\Controllers\PropiedadesController::class, 'store'])->name('storePropiedad');
Route::get('/getData/propiedadesobjetos/{id}', [App\Http\Controllers\PropiedadesController::class, 'getData'])->name('getDataPropiedad');
Route::post('/delete/propiedadesobjetos', [App\Http\Controllers\PropiedadesController::class, 'delete'])->name('deletePropiedad');
Route::post('/update/propiedadesobjetos/{id}', [App\Http\Controllers\PropiedadesController::class, 'update'])->name('updatePropiedad');


/* Rutas Armas */
Route::get('/armas', [App\Http\Controllers\ArmasController::class, 'index'])->name('indexArma');
Route::get('/armasdata', [App\Http\Controllers\ArmasController::class, 'getDataTable'])->name('getDataArmas');
Route::post('/store/arma', [App\Http\Controllers\ArmasController::class, 'store'])->name('storeArma');
Route::get('/getData/arma/{id}', [App\Http\Controllers\ArmasController::class, 'getData'])->name('getDataArma');
Route::post('/delete/arma', [App\Http\Controllers\ArmasController::class, 'delete'])->name('deleteArma');
Route::post('/update/arma/{id}', [App\Http\Controllers\ArmasController::class, 'update'])->name('updateArma');

