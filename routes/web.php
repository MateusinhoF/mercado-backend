<?php


Route::get('/', function () {
    return ['msg' => 'ok']; //view('welcome');
});

Route::prefix('admin')->group(function (){
    Route::get('/','Admin\HomeController@index')->name('admin');
    
    Route::get('/login','Admin\Auth\LoginController@index')->name('login');
    Route::post('/login','Admin\Auth\LoginController@authenticate');

    Route::get('/cadastro','Admin\Auth\RegisterController@index')->name('register');
    Route::post('/cadastro','Admin\Auth\RegisterController@cadastro');

    Route::post('/logout','Admin\Auth\LoginController@logout')->name('logout');

    Route::resource('user', 'Admin\UsuarioPainelAdministrativoController');
    Route::resource('permission', 'Admin\GrupoDePermissoesPainelAdministrativoController');
});