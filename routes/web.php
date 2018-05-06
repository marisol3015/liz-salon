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
    return view('auth/login');
});
Route::group(['middleware' => 'auth'], function() {
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::resource('clientes', 'ClientesController');
    Route::resource('empleados', 'EmpleadosController');
    Route::resource('producto-categorias', 'ProductoCategoriasController');
    Route::resource('productos', 'ProductosController');
    Route::resource('usuarios', 'UsuariosController');
    Route::resource('manos', 'ManosController');
    Route::resource('pies', 'PiesController');
    Route::resource('colores', 'ColoresController');
    Route::resource('CrearCita', 'CitasController');
    Route::resource('keratinas', 'KeratinasController');
    Route::resource('maquillajes', 'MaquillajesController');
    Route::resource('peinados', 'PeinadosController');
    Route::resource('cortes', 'CortesController');
    Route::resource('depilaciones', 'DepilacionesController');
    Route::get('events', 'EventsController@index');
    Route::get('opciones', function () {
        return view('admin.Agenda.agendar');     

    });
    Route::get('servicios', function () {
        return view('admin.servicio.Servicios');
      

    });
});
    Route::group(['prefix' => 'Auth', 'namespace' => 'Auth'], function () {
        Route::resource('login', 'LoginController');
              
    
        });
        
   
});


Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'Auth', 'namespace' => 'Auth'], function () {
Route::get('password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}','ForgotPasswordController@showResetForm')->name('password.reset.token');
Route::post('password/reset','ResetPasswordController@reset');
});