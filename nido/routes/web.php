<?php

use Illuminate\Support\Facades\Route;

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
	return redirect(app()->getLocale() );
});

Route::get('/{locale}', 'Dashboard\AdminController@index')->name('admin');

Route::group([
  'prefix' => '{locale}', 
  'where' => ['locale' => '[a-zA-Z]{2}'], 
  'middleware' => 'localization'], function() { 

	Route::get('login', 'Auth\LoginController@index')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');

	Route::get('admin', 'Dashboard\AdminController@index')->name('admin');
	
	Route::resource('companies', 'Dashboard\CompanyController');
	Route::resource('employees', 'Dashboard\EmployeeController');

});