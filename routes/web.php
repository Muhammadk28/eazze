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

Route::get('/', 'homeController@index');
Route::get('/erorr404', 'erorrController@index');





Route::get('/logout','homeController@logout');
Route::get('/login', 'homeController@login');
Route::post('/sign_in', 'homeController@dashboard');


Route::get('/user_search', 'searchController@user');
Route::get('/manufacturer_search', 'searchController@manufacturer');
Route::get('/generic_search', 'searchController@generic');

Route::post('/add_medicine', 'brandController@insert');
Route::get('/list-medicine', 'brandController@show');
Route::get('/medicine-edit/{brand_id}', 'brandController@edit');
Route::post('/medicine-update/{brand_id}', 'brandController@update');
Route::get('/medicine-delete/{brand_id}', 'brandController@delete');


Route::get('/add-generic-name', 'genericController@index');
Route::post('/add-generic', 'genericController@insert');
Route::get('/list-generic-name', 'genericController@show');
Route::get('/generic-edit/{generic_id}', 'genericController@edit');
Route::post('/generic-update/{generic_id}', 'genericController@update');
Route::get('/generic-delete/{generic_id}', 'genericController@delete');

Route::get('/add-manufacturer-name', 'manufacturerController@index');
Route::post('/add-man', 'manufacturerController@insert');
Route::get('/list-manufacture', 'manufacturerController@show');
Route::get('/manufacture_edit/{man_id}', 'manufacturerController@edit');
Route::post('/manufacture_update/{man_id}', 'manufacturerController@update');
Route::get('/manufacture_delete/{man_id}', 'manufacturerController@delete');


Route::get('/add-user', 'userController@index');
Route::post('/add_user', 'userController@insert');
Route::get('/list-user', 'userController@show');
Route::get('/user_edit/{user_id}', 'userController@edit');
Route::post('/user_update/{user_id}', 'userController@update');
Route::get('/user_delete/{user_id}', 'userController@delete');