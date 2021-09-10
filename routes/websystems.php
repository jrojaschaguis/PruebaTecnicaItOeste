<?php

/*
|--------------------------------------------------------------------------
| Web Routes Systems
|--------------------------------------------------------------------------
| Route::get('URI', 'Action')->name('RouteName'); // RouteName = route('') = Nombre de la Seccion
|
| URI = url('') = URL
| Action = {!! Form::open(['action' => ['Users\UserController@destroy', $user->id], 'method' => 'delete']) !!}
| RouteName = route('') = Nombre de la Seccion
|
*/

Auth::routes();

// Group - Settings
Route::prefix('/settings')->group(function(){
    // Module - Dashboard
    Route::get('/dashboard', 'SystemSettings\DashboardController@getDashboardIndex')->name('settings-dashboard');
});

// Group - Users
Route::prefix('/users')->group(function(){
    // Module - Dashboard
    Route::get('/dashboard', 'SystemUsers\DashboardController@getDashboardIndex')->name('users-dashboard');

    // Module - Account
    Route::get('/account', 'SystemUsers\AccountController@getAccountIndex')->name('users-account');
});

// Group - Gestión Empresarial
Route::prefix('/sige')->group(function(){
    // Module - Dashboard
    Route::get('/dashboard', 'SystemSige\DashboardController@getDashboardIndex')->name('sige-dashboard');
    Route::get('/localidades', 'SystemSige\DashboardController@getLocalidades')->name('sige.localidades');

    // Module - Países
    Route::resource('paises', 'SystemSige\PaisController');
    Route::delete('paises_destroyall', 'SystemSige\PaisController@destroyAll')->name('paises.destroyall');  
    Route::resource('paises_papelera', 'SystemSige\PaisPapeleraController');
    Route::delete('paises_restoreall', 'SystemSige\PaisPapeleraController@restoreAll')->name('paises_papelera.restoreall');
});
