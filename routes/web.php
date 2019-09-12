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

// use App\Http\Controllers\UserActivoController;
// use Illuminate\Routing\Route;

use App\Http\Controllers\RankingController;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/usuarios', 'UsuarioController');

Route::resource('/preguntas/categorias', 'CategoriaPreguntaController');

Route::resource('/preguntas', 'PreguntaController');

Route::resource('/respuestas', 'RespuestaController');

Route::resource('/contactos', 'ContactoController');

Route::resource('/faq/topicos', 'FaqTopicoController', ['as' => 'faq']);

Route::resource('/faq/preguntas', 'FaqPreguntaController', ['as' => 'faq']);

Route::resource('/jugadores', 'JugadorController')->parameters([
    'jugadores' => 'jugador',
]);

Route::resource('/niveles', 'NivelController')->parameters([
    'niveles' => 'nivel',
]);

Route::post('/preguntas/{pregunta}/respuestas', 'PreguntaRespuestasController@store');
Route::patch('/preguntas/{pregunta}/respuestas', 'PreguntaRespuestasController@update');
Route::get('/preguntas/{pregunta}/respuestas/edit', 'PreguntaRespuestasController@edit');
Route::get('/juego', function() {
    $pregunta = \App\Pregunta::where('activa', true)->inRandomOrder()->first();
    // dd($pregunta);
    return view('jugadas.juego', compact('pregunta'));
})->middleware('auth');


Route::get('/faq', function() {
    $topicos = \App\FaqTopico::all();
    // dd($topicos);
    return view('faq.index', compact('topicos'));
});


Route::post('/usuario-activo/{usuario}', 'UserActivoController@store')->name('perfiles.store');
Route::delete('/usuario-activo/{usuario}', 'UserActivoController@destroy')->name('perfiles.destroy');


Route::post('/jugada', 'JuegoController@test')->name('test.juego');

Route::get('/prejuego', 'JuegoController@preJuego')->name('prejuego');


Route::get('/ranking', 'RankingController@index');

Route::post('/usuario-admin/{usuario}', 'UserAdminController@store')->name('admin.store');
Route::delete('/usuario-admin/{usuario}', 'UserAdminController@destroy')->name('admin.destroy');
