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

Route::get('index', function () {
    return view('auth/login');
});
Route::group(['middleware' => 'auth'], function() {
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::resource('clientes', 'ClientesController');
    Route::resource('empleados', 'EmpleadosController');
    Route::resource('producto-categorias', 'ProductoCategoriasController');
    Route::resource('productos', 'ProductosController');
    Route::resource('usuarios', 'UsuariosController');
    Route::resource('CrearCita', 'CitasController');
    Route::get('events', 'EventController@index');
    Route::get('opciones', function () {
        return view('admin.Agenda.agendar');
      

    });
});
    /*Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::resource('login', 'LoginController');
              
    
        });*/
        
   
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'auth', 'namespace' => 'auth'], function () {
Route::get('password/reset','forgotpasswordcontroller@showLinkRequestForm')->name('password.reset');
Route::post('password/email','forgotpasswordcontroller@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}','forgotpasswordcontroller@showResetForm')->name('password.reset.token');
Route::post('password/reset','resetpasswordcontroller@reset');
});