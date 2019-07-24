<?php

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
Route::get('/materiaventana','materiaController@ventana');
Route::post('materia','materiaController@guardar')->name('materia');
Route::get('materia/eliminar_modificar','materiaController@listar')->name('materia_listar');
Route::delete('materia_eliminar/{id}','materiaController@eliminar')->name('materia_eliminar');
Route::get('materia_editar/{id}','materiaController@editar');
Route::put('materia_actualizar/{id}','materiaController@modificar');

Route::post('curso','cursoController@guardar');
Route::get('/cursoventana','cursoController@ventana');
Route::get('curso/eliminar_modificar','cursoController@listar')->name('curso_listar');
Route::delete('curso_eliminar/{id}','cursoController@eliminar')->name('curso_eliminar');
Route::get('curso_editar/{id}','cursoController@editar');
Route::put('curso_actualizar/{id}','cursoController@modificar');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
