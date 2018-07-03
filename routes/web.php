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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('enrollmentUser', 'EnrollmentController');

//Route::resource('courses', 'CourseController');

Route::group(['middleware'=>'is_admin'], function(){
    Route::resource('courses', 'CourseController');


    //tornar adm
    Route::resource('admin', 'AdminController', ['only'=>['index','admin']]);
    
    Route::get('/admin/{id}', ['uses' =>'AdminController@admin']);
});



