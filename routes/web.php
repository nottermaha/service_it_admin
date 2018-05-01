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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'DashboardController@count_male');
Route::get('/persons-manager', 'PersonsManagerController@get_persons');
Route::get('/person-manager-form', 'PersonsManagerController@form');
Route::get('/person-manager-form-edit/{id}', 'PersonsManagerController@form_edit')->where('id', '[0-9]+');
Route::post('/person-manager/create', 'PersonsManagerController@create');
Route::post('/person-manager/edit/{id}', 'PersonsManagerController@edit')->where('id', '[0-9]+');
Route::post('/person-manager/delete/{id}' ,'PersonsManagerController@delete')->where('id', '[0-9]+');

Route::get('/persons-employee', 'PersonsEmployeeController@get_persons');
Route::get('/person-employee-form', 'PersonsEmployeeController@form');
Route::get('/person-employee-form-edit/{id}', 'PersonsEmployeeController@form_edit')->where('id', '[0-9]+');
Route::post('/person-employee/create', 'PersonsEmployeeController@create');
Route::post('/person-employee/edit/{id}', 'PersonsEmployeeController@edit')->where('id', '[0-9]+');
Route::post('/person-employee/delete/{id}' ,'PersonsEmployeeController@delete')->where('id', '[0-9]+');

Route::get('/persons-member', 'PersonsMemberController@get_persons');
// Route::get('/persons-member', 'PersonsMemberController@get_persons');
Route::get('/person-member-form', 'PersonsMemberController@form');
Route::get('/person-member-form-edit/{id}', 'PersonsMemberController@form_edit')->where('id', '[0-9]+');
Route::post('/person-member/create', 'PersonsMemberController@create');
Route::post('/person-member/edit/{id}', 'PersonsMemberController@edit')->where('id', '[0-9]+');
Route::post('/person-member/delete/{id}' ,'PersonsMemberController@delete')->where('id', '[0-9]+');

Route::get('/stores', 'StoreController@get_store_branch');
Route::post('/store-branch/create', 'StoreController@create_store_branch');
Route::get('/store-branch-form-edit/{id}', 'StoreController@form_edit')->where('id', '[0-9]+');
Route::post('/store-branch/edit/{id}','StoreController@edit_store_branch')->where('id','[0-9]+');
Route::post('/store-branch/delete/{id}','StoreController@delete')->where('id','[0-9]+');

Route::get('/repair-member', 'RepairsMemberController@get_repair');
Route::post('/repair-member/create', 'RepairsMemberController@create');
Route::post('/repair-member/edit/{id}', 'RepairsMemberController@edit');
Route::post('/repair-member/delete/{id}', 'RepairsMemberController@delete');

Route::get('/repair-general', 'RepairsGeneralController@get_repair');
Route::post('/repair-general/create', 'RepairsGeneralController@create');
Route::post('/repair-general/edit/{id}', 'RepairsGeneralController@edit');
Route::post('/repair-general/delete/{id}', 'RepairsGeneralController@delete');

Route::get('/list-repair/{id}', 'ListRepairsController@get_list_repair_by_id');
Route::post('/list-repair/create', 'ListRepairsController@create');
Route::post('/list-repair/edit/{id}', 'ListRepairsController@edit');
Route::post('/list-repair/delete/{id}', 'ListRepairsController@delete');

Route::get('/import_part','ImportPartsController@get');
Route::post('/import_part/create','ImportPartsController@create');
Route::post('/import_part/edit/{id}','ImportPartsController@edit');
Route::post('/import_part/delete/{id}','ImportPartsController@delete');

Route::get('/list-part/{id}', 'ListPartsController@get_list_parts_by_id');
Route::post('/list-part/create', 'ListPartsController@create');
Route::post('/list-part/edit/{id}', 'ListPartsController@edit');
Route::post('/list-part/delete/{id}', 'ListPartsController@delete');

Route::get('/setting-status-repair','SettingStatusController@get');
Route::post('/setting-status-repair/create','SettingStatusController@create');
Route::post('/setting-status-repair/edit/{id}','SettingStatusController@edit');
Route::post('/setting-status-repair/delete/{id}','SettingStatusController@delete');

Route::get('/gallery','GallerysController@get');
Route::post('/gallery/create','GallerysController@create');
Route::post('/gallery/edit/{id}','GallerysController@edit');
Route::post('/gallery/delete/{id}','GallerysController@delete');

Route::get('/questtion-post','BoardPostsController@get_question_post');
Route::post('/questtion-post/create','BoardPostsController@create_question_post');
Route::get('/answer-post-form/{id}','BoardPostsController@form_get_answer_post');
Route::post('/answer-post/create','BoardPostsController@create_answer_post');

Route::post('/test_login','AuthenController@login');
Route::post('/logout','AuthenController@logout');

Route::get('/report-person-member', 'PersonsMemberController@report_person_member');

Route::get('/dashboard', 'DashboardController@count_male');
// Route::get('store-form',function(){
//     return view('stores/store-form');
// });

//คือเส้นทางการเรียก
//ที่ต้องใส่ session BoardPostsController@create_answer_post',PersonsManagerController@create
//,RepairsMemberController@get_repair,RepairsGeneralController@get_repair
//ImportPartsController@get
Route::get('/login', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
