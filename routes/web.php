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


 Route::group(['middleware' => ['menu','auth']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('suppliers', 'SuppliersController');
    Route::resource('teams','TeamsController');
    Route::get('matches/detail', 'MatchesController@detail')->name('matches.detail');
    Route::get('matches/klasemen', 'MatchesController@klasemen')->name('matches.klasemen');
    Route::resource('matches', 'MatchesController');
    
    Route::post('role_menus/mass_store', 'RoleMenusController@mass_store')->name('role_menus.mass_store');
    Route::get('roles/{id}/access', 'RolesController@access')->name('role.access');
    Route::resource('roles', 'RolesController');
    Route::resource('menus', 'MenusController');
    
    Route::resource('role_menus', 'RoleMenusController', [
        'names' => [
            'store'   => 'role_menus.store'
        ],
    ]);
   
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
 });
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();
