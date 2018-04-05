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

Route::get('/home', 'HomeController@index');
Route::resource('trucks', 'truckController');
Route::post('trucks/changeStatus', array('as' => 'changeStatus', 'uses' => 'truckController@changeStatus'));


Route::put('/trucks', 'truckController@update');


//  --------testing area    -------------------
//Route::get('/home', 'truckController@index')
//Route::get('/home', 'HomeController@index');

//   test   Route::post('trucks/addTruck', array('as' => 'addTruck', 'uses' => 'truckController@addTruck'));
// /** "  "    */Route::post('trucks/addTruck', array('as' => 'addTruck', 'uses' => 'truckController@addTruck'));
//           GET|HEAD  | home                    |                    | App\Http\Controllers\HomeController@index                              | web,auth     |
// |        | GET|HEAD  | login                   | login              | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest    |
// |        | POST      | login                   |                    | App\Http\Controllers\Auth\LoginController@login                        | web,guest    |
// |        | POST      | logout                  | logout             | App\Http\Controllers\Auth\LoginController@logout                       | web          |
// |        | POST      | password/email          | password.email     | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web,guest    |
// |        | POST      | password/reset          |                    | App\Http\Controllers\Auth\ResetPasswordController@reset                | web,guest    |
// |        | GET|HEAD  | password/reset          | password.request   | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web,guest    |
// |        | GET|HEAD  | password/reset/{token}  | password.reset     | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web,guest    |
// |        | POST      | register                |                    | App\Http\Controllers\Auth\RegisterController@register                  | web,guest    |
// |        | GET|HEAD  | register                | register           | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest    |
// |        | GET|HEAD  | trucks                  | trucks.index       | App\Http\Controllers\truckController@index                             | web          |
// |        | POST      | trucks                  | trucks.store       | App\Http\Controllers\truckController@store                             | web          |
// |        | POST      | trucks/changeStatus     | changeStatus       | App\Http\Controllers\truckController@changeStatus                      | web          |
// |        | GET|HEAD  | trucks/create           | trucks.create      | App\Http\Controllers\truckController@create                            | web          |
// |        | GET|HEAD  | trucks/{truck}          | trucks.show        | App\Http\Controllers\truckController@show                              | web          |
// |        | PUT|PATCH | trucks/{truck}          | trucks.update      | App\Http\Controllers\truckController@update                            | web          |
// |        | DELETE    | trucks/{truck}          | trucks.destroy     | App\Http\Controllers\truckController@destroy                           | web          |
// |        | GET|HEAD  | trucks/{truck}/edit     | trucks.edit        | App\Http\Controllers\truckController@edit                              | web          |
