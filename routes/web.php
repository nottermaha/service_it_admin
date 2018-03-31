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

Route::get('/persons', 'PersonsController@get_persons');
// Route::get('/person-form', function() {
//     return view('persons/person-form');
// });
// Route::get('/person-form-edit', function() {
//     return view('persons/person-form-edit');
// });


Route::get('/person-form', 'PersonsController@form');
Route::get('/form-edit/{id}', 'PersonsController@form_edit')->where('id', '[0-9]+');
Route::post('/person/create', 'PersonsController@create');
Route::post('/person/edit/{id}', 'PersonsController@edit')->where('id', '[0-9]+');
Route::get('/person/delete/{id}' ,'PersonsController@delete')->where('id', '[0-9]+');

Route::get('/stores', 'StoreController@get_store_branch');
Route::post('/store-branch/create', 'StoreController@create_store_branch');
Route::get('/store-branch-form-edit/{id}', 'StoreController@form_edit')->where('id', '[0-9]+');
Route::post('/store-branch/edit/{id}','StoreController@edit_store_branch')->where('id','[0-9]+');
Route::get('/store-branch/delete/{id}','StoreController@delete')->where('id','[0-9]+');
// Route::get('store-form',function(){
//     return view('stores/store-form');
// });


Route::get('/login', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
