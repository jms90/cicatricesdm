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

Route::get('/session', function () {
    return response()->json(['authenticated' => auth()->check()]);
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    /* Rutas Tipos de Objetos */
    Route::get('/tipoobjeto', [App\Http\Controllers\TiposObjetosController::class, 'index'])->name('indexTipoObjetos');
    Route::get('/tipoobjeto/getdatatable', [App\Http\Controllers\TiposObjetosController::class, 'getDataTable'])->name('getDataObjetos');
    Route::post('/tipoobjeto/store', [App\Http\Controllers\TiposObjetosController::class, 'store'])->name('storeTipo');
    Route::get('/tipoobjeto/{tipoObjeto}', [App\Http\Controllers\TiposObjetosController::class, 'getData'])->name('getDataTipo');
    Route::post('/tipoobjeto/delete', [App\Http\Controllers\TiposObjetosController::class, 'delete'])->name('deleteTipo');
    Route::post('/tipoobjeto/update/{id}', [App\Http\Controllers\TiposObjetosController::class, 'update'])->name('updateTipo');

    /* Rutas Tipos de Objetos */
    Route::get('/personaje', [App\Http\Controllers\PersonajesController::class, 'index'])->name('indexPersonajes');
    Route::get('/personaje/getdatatable', [App\Http\Controllers\PersonajesController::class, 'getDataTable'])->name('getDataPersonajes');
    Route::post('/personaje/store', [App\Http\Controllers\PersonajesController::class, 'store'])->name('storePersonaje');
    //Route::get('/personaje/{personaje}', [App\Http\Controllers\PersonajesController::class, 'getData'])->name('getDataPersonaje');
    Route::post('/personaje/delete', [App\Http\Controllers\PersonajesController::class, 'delete'])->name('deletePersonaje');
    Route::post('/personaje/update/{id}', [App\Http\Controllers\PersonajesController::class, 'update'])->name('updatePersonaje');
    Route::get('/personaje/editar/{id}', [App\Http\Controllers\PersonajesController::class, 'edit'])->name('editPersonaje');
    Route::get('/personaje/create', [App\Http\Controllers\PersonajesController::class, 'create'])->name('createPersonaje');

    /* Rutas Tipos de Objetos */
    Route::get('/dios', [App\Http\Controllers\DiosesController::class, 'index'])->name('indexDioses');
    Route::get('/dios/getdatatable', [App\Http\Controllers\DiosesController::class, 'getDataTable'])->name('getDataDioses');
    Route::post('/dios/store', [App\Http\Controllers\DiosesController::class, 'store'])->name('storeDios');
    Route::get('/dios/{dios}', [App\Http\Controllers\DiosesController::class, 'getData'])->name('getDataDios');
    Route::post('/dios/delete', [App\Http\Controllers\DiosesController::class, 'delete'])->name('deleteDios');
    Route::post('/dios/update/{id}', [App\Http\Controllers\DiosesController::class, 'update'])->name('updateDios');

    /* Rutas habilidades */
    Route::get('/habilidad', [App\Http\Controllers\HabilidadesController::class, 'index'])->name('indexHabilidades');
    Route::get('/habilidad/getdatatable', [App\Http\Controllers\HabilidadesController::class, 'getDataTable'])->name('getDataHabilidades');
    Route::post('/habilidad/store', [App\Http\Controllers\HabilidadesController::class, 'store'])->name('storeHabilidad');
    Route::get('/habilidad/{habilidad}', [App\Http\Controllers\HabilidadesController::class, 'getData'])->name('getDataHabilidad');
    Route::post('/habilidad/delete', [App\Http\Controllers\HabilidadesController::class, 'delete'])->name('deleteHabilidad');
    Route::post('/habilidad/update/{id}', [App\Http\Controllers\HabilidadesController::class, 'update'])->name('updateHabilidad');

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


    /* Rutas Escuelas de Magia */
    Route::get('/escuelasmagia', [App\Http\Controllers\EscuelasMagiaController::class, 'index'])->name('indexEscuelasMagia');
    Route::get('/escuelasmagiadata', [App\Http\Controllers\EscuelasMagiaController::class, 'getDataTable'])->name('getDataEscuelasMagia');
    Route::post('/store/escuelasmagia', [App\Http\Controllers\EscuelasMagiaController::class, 'store'])->name('storeEscuelaMagia');
    Route::get('/getData/escuelamagia/{id}', [App\Http\Controllers\EscuelasMagiaController::class, 'getData'])->name('getDataEscuelaMagia');
    Route::post('/delete/escuelamagia', [App\Http\Controllers\EscuelasMagiaController::class, 'delete'])->name('deleteEscuelaMagia');
    Route::post('/update/escuelaMagia/{id}', [App\Http\Controllers\EscuelasMagiaController::class, 'update'])->name('updateEscuelaMagia');


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

    /* Rutas Magias */
    Route::get('/magias', [App\Http\Controllers\MagiasController::class, 'index'])->name('indexMagia');
    Route::get('/magiassdata', [App\Http\Controllers\MagiasController::class, 'getDataTable'])->name('getDataMagias');
    Route::post('/store/magia', [App\Http\Controllers\MagiasController::class, 'store'])->name('storeMagia');
    Route::get('/getData/magia/{id}', [App\Http\Controllers\MagiasController::class, 'getData'])->name('getDataMagia');
    Route::post('/delete/magia', [App\Http\Controllers\MagiasController::class, 'delete'])->name('deleteMagia');
    Route::post('/update/magia/{id}', [App\Http\Controllers\MagiasController::class, 'update'])->name('updateMagia');

    /* Rutas Bendiciones */
    Route::get('/bendicion', [App\Http\Controllers\BendicionesController::class, 'index'])->name('indexBendicion');
    Route::get('/bendicion/getdatatable', [App\Http\Controllers\BendicionesController::class, 'getDataTable'])->name('getDataBendiciones');
    Route::post('/bendicion/store', [App\Http\Controllers\BendicionesController::class, 'store'])->name('storeBendicion');
    Route::get('/bendicion/{bendicion}', [App\Http\Controllers\BendicionesController::class, 'getData'])->name('getDataBendicion');
    Route::post('/bendicion/delete', [App\Http\Controllers\BendicionesController::class, 'delete'])->name('deleteBendicion');
    Route::post('/bendicion/update/{id}', [App\Http\Controllers\BendicionesController::class, 'update'])->name('updateBendicion');

    /* Rutas talentos */
    Route::get('/talento', [App\Http\Controllers\TalentosController::class, 'index'])->name('indexTalento');
    Route::get('/talento/getdatatable', [App\Http\Controllers\TalentosController::class, 'getDataTable'])->name('getDataTalentos');
    Route::post('/talento/store', [App\Http\Controllers\TalentosController::class, 'store'])->name('storeTalento');
    Route::get('/talento/{talento}', [App\Http\Controllers\TalentosController::class, 'getData'])->name('getDataTalento');
    Route::post('/talento/delete', [App\Http\Controllers\TalentosController::class, 'delete'])->name('deleteTalento');
    Route::post('/talento/update/{id}', [App\Http\Controllers\TalentosController::class, 'update'])->name('updateTalento');

    /* Rutas ascendencias */
    Route::get('/ascendencia', [App\Http\Controllers\AscendenciasController::class, 'index'])->name('indexAscendencia');
    Route::get('/ascendencia/getdatatable', [App\Http\Controllers\AscendenciasController::class, 'getDataTable'])->name('getDataAscendencias');
    Route::post('/ascendencia/store', [App\Http\Controllers\AscendenciasController::class, 'store'])->name('storeAscendencia');
    Route::get('/ascendencia/{ascendencia}', [App\Http\Controllers\AscendenciasController::class, 'getData'])->name('getDataAscendencia');
    Route::post('/ascendencia/delete', [App\Http\Controllers\AscendenciasController::class, 'delete'])->name('deleteAscendencia');
    Route::post('/ascendencia/update/{id}', [App\Http\Controllers\AscendenciasController::class, 'update'])->name('updateAscendencia');

    /* Rutas clases */
    Route::get('/clase', [App\Http\Controllers\ClasesController::class, 'index'])->name('indexClase');
    Route::get('/clase/getdatatable', [App\Http\Controllers\ClasesController::class, 'getDataTable'])->name('getDataClases');
    Route::post('/clase/store', [App\Http\Controllers\ClasesController::class, 'store'])->name('storeClase');
    Route::get('/clase/{id}', [App\Http\Controllers\ClasesController::class, 'getData'])->name('getDataClase');
    Route::post('/clase/delete', [App\Http\Controllers\ClasesController::class, 'delete'])->name('deleteClase');
    Route::post('/clase/update/{id}', [App\Http\Controllers\ClasesController::class, 'update'])->name('updateClase');
});
