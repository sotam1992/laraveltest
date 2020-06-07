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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index');

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });

Auth::routes();

// Route::get('/dashboard', 'Admin\HomeController@index');

Route::get('/logout', 'Admin\HomeController@logout');

// admin/test
Route::group(
    array('prefix' => 'admin'), 
    function() {
        Route::get('/dashboard', 'Admin\HomeController@index');
        Route::get('/users', 'Admin\UserController@index');
        Route::get('/edit-user', 'Admin\UserController@edit');
        Route::post('/update-user', 'Admin\UserController@update');
        Route::get('/delete-user/{id}', 'Admin\UserController@destroy');

        Route::get('/appointment', 'Admin\AppointmentController@index');
        Route::get('/add-appointment/{id}', 'Admin\AppointmentController@create');
        Route::post('/store-appointment', 'Admin\AppointmentController@store');
        Route::get('/delete-appointment/{id}', 'Admin\AppointmentController@destroy');
        Route::get('/edit-appointment/{id}', 'Admin\AppointmentController@edit');
        Route::post('/update-appointment', 'Admin\AppointmentController@update');
        Route::get('/specialist', 'Admin\AppointmentController@specialist');
        Route::post('/search-specialist', 'Admin\AppointmentController@searchSpecialist');

        Route::get('/users', 'Admin\UserController@index');
        Route::get('/roles', 'Admin\RoleController@index');

    }
);
?>
