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

/*
Route::get('/', function () {
    return view('index');
});
*/

Route::group(array('prefix' => 'api'), function() {
	Route::resource('/noticiasapi', 'NoticiasControllerApi');
	Route::resource('/avisosapi', 'AvisosControllerApi');
    Route::resource('/utilizadoresapi', 'UtilizadoresControllerApi');
    Route::resource('/empregoapi', 'EmpregoControllerApi');
    Route::resource('/horariosapi', 'HorariosControllerApi');
    Route::resource('/docentesapi', 'DocenteControllerApi');
    Route::resource('/propinasapi', 'PropinasControllerApi');
    Route::resource('/semestreapi', 'SemestreControllerApi');
    Route::resource('/examesapi', 'ExamesControllerApi');
});


    Route::get('/', ['as' => 'home', 'uses' =>'PageController@index']);
    Route::resource('/avisos', 'AvisosController');
    Route::resource('/noticias', 'NoticiasController');
    Route::resource('/utilizadores', 'UtilizadoresController');
    Route::resource('/emprego', 'EmpregoController');
    Route::resource('/horarios', 'HorariosController');
    Route::resource('/docentes', 'DocenteController');
    Route::resource('/propinas', 'PropinasController');
    Route::resource('/semestre', 'SemestreController');
    Route::resource('/exames', 'ExamesController');


Auth::routes();

