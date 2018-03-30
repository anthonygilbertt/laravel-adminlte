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
  return redirect('home');
});


Auth::routes();

// ------------original   -------------------------
Route::get('/home', 'HomeController@index');
Route::resource('trucks', 'truckController');
/** testing  */ Route::post('trucks/changeStatus', array('as' => 'changeStatus', 'uses' => 'truckController@changeStatus'));

//  --------testing area    -------------------
//Route::get('/home', 'truckController@index')
//Route::get('/home', 'HomeController@index');
