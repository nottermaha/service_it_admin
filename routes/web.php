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
// Route::get('/person-form', function() {
//     return view('persons/person-form');
// });
Route::get('/', function () {
    return view('welcome');
});

Route::get('/persons-manager', 'PersonsManagerController@get_persons');
Route::get('/person-manager-form', 'PersonsManagerController@form');
Route::get('/person-manager-form-edit/{id}', 'PersonsManagerController@form_edit')->where('id', '[0-9]+');
Route::post('/person-manager/create', 'PersonsManagerController@create');
Route::post('/person-manager/edit/{id}', 'PersonsManagerController@edit')->where('id', '[0-9]+');
Route::get('/person-manager/delete/{id}' ,'PersonsManagerController@delete')->where('id', '[0-9]+');

Route::get('/persons-employee', 'PersonsEmployeeController@get_persons');
Route::get('/person-employee-form', 'PersonsEmployeeController@form');
Route::get('/person-employee-form-edit/{id}', 'PersonsEmployeeController@form_edit')->where('id', '[0-9]+');
Route::post('/person-employee/create', 'PersonsEmployeeController@create');
Route::post('/person-employee/edit/{id}', 'PersonsEmployeeController@edit')->where('id', '[0-9]+');
Route::get('/person-employee/delete/{id}' ,'PersonsEmployeeController@delete')->where('id', '[0-9]+');

Route::get('/persons-member', 'PersonsMemberController@get_persons');
Route::get('/persons-member', 'PersonsMemberController@get_persons');
Route::get('/person-member-form', 'PersonsMemberController@form');
Route::get('/person-member-form-edit/{id}', 'PersonsMemberController@form_edit')->where('id', '[0-9]+');
Route::post('/person-member/create', 'PersonsMemberController@create');
Route::post('/person-member/edit/{id}', 'PersonsMemberController@edit')->where('id', '[0-9]+');
Route::get('/person-member/delete/{id}' ,'PersonsMemberController@delete')->where('id', '[0-9]+');

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
