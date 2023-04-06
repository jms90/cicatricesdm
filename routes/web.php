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

/* Rutas Lugares de Cuerpo */
Route::get('/lugarescuperpo', [App\Http\Controllers\LugaresCuerpoController::class, 'index'])->name('indexLugaresCuerpo');
Route::get('/lugarescuerpo', [App\Http\Controllers\LugaresCuerpoController::class, 'getDataTable'])->name('getDataLugaresCuerpo');
Route::post('/store/lugarescuerpo', [App\Http\Controllers\LugaresCuerpoController::class, 'store'])->name('storeLugarCuerpo');
Route::get('/getData/lugarescuerpo/{id}', [App\Http\Controllers\LugaresCuerpoController::class, 'getData'])->name('getDataLugarCuerpo');
Route::post('/delete/lugarcuerpo', [App\Http\Controllers\LugaresCuerpoController::class, 'delete'])->name('deleteLugarCuerpo');
Route::post('/update/lugarcuerpo/{id}', [App\Http\Controllers\LugaresCuerpoController::class, 'update'])->name('updateLugarCuerpo');


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

/* Rutas Armaduras */
Route::get('/armaduras', [App\Http\Controllers\ArmadurasController::class, 'index'])->name('indexArmaduras');
Route::get('/armadurassdata', [App\Http\Controllers\ArmadurasController::class, 'getDataTable'])->name('getDataArmaduras');
Route::post('/store/armadura', [App\Http\Controllers\ArmadurasController::class, 'store'])->name('storeArmadura');
Route::get('/getData/armadura/{id}', [App\Http\Controllers\ArmadurasController::class, 'getData'])->name('getDataArmadura');
Route::post('/delete/armadura', [App\Http\Controllers\ArmadurasController::class, 'delete'])->name('deleteArmadura');
Route::post('/update/armadura/{id}', [App\Http\Controllers\ArmadurasController::class, 'update'])->name('updateArmadura');

/* Rutas Petrechos */
Route::get('/petrechos', [App\Http\Controllers\PetrechosController::class, 'index'])->name('indexPetrechos');
Route::get('/petrechosdata', [App\Http\Controllers\PetrechosController::class, 'getDataTable'])->name('getDataPetrechos');
Route::post('/store/petrecho', [App\Http\Controllers\PetrechosController::class, 'store'])->name('storePetrecho');
Route::get('/getData/petrechos/{id}', [App\Http\Controllers\PetrechosController::class, 'getData'])->name('getDataPetrecho');
Route::post('/delete/petrechos', [App\Http\Controllers\PetrechosController::class, 'delete'])->name('deletePetrecho');
Route::post('/update/petrechos/{id}', [App\Http\Controllers\PetrechosController::class, 'update'])->name('updatePetrecho');

