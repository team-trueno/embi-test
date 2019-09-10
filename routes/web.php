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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('usuarios', 'UsuariosController');

Route::resource('/preguntas/categorias', 'CategoriaPreguntaController');

Route::resource('/preguntas', 'PreguntaController');

Route::resource('/respuestas', 'RespuestaController');

Route::resource('/contactos', 'ContactoController');

Route::resource('/jugadores', 'JugadorController')->parameters([
    'jugadores' => 'jugador',
]);

Route::resource('/niveles', 'NivelController')->parameters([
    'niveles' => 'nivel',
]);

Route::post('/preguntas/{pregunta}/respuestas', 'PreguntaRespuestasController@store');
Route::patch('/preguntas/{pregunta}/respuestas', 'PreguntaRespuestasController@update');
Route::get('/preguntas/{pregunta}/respuestas/edit', 'PreguntaRespuestasController@edit');


