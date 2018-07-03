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


// Route::get('/font-board-answer', function () {
//     return view('font_pages/board-answer');
// });
Route::get('/font-contact', function () {
    return view('font_pages/contact');
});
Route::get('/', 'IndexController@index');

Route::get('/font-contact', 'StoreController@get_store_branch_to_font_contact');
Route::post('/font-contact-detail', 'StoreController@get_font_contact_by_id');

Route::get('/font-new', 'FontNewController@news');

// Route::resource('/font-new', 'FontNewController@news');
Route::post('/font-new-detail', 'FontNewController@new_by_id');

Route::post('/font-board-question','FontBoardPostsController@get_question_post');
Route::post('/questtion-post-font-create','FontBoardPostsController@create_question_post');
Route::post('/questtion-post-font-edit','FontBoardPostsController@edit_question_post');
Route::post('/questtion-post-font-delete','FontBoardPostsController@delete_question_post');

Route::post('/font-board-answer','FontBoardPostsController@form_get_answer_post');
Route::post('/font-board-answer-create','FontBoardPostsController@create_answer_post');
Route::post('/font-board-answer-edit','FontBoardPostsController@edit_answer_post');
Route::post('/font-board-answer-delete','FontBoardPostsController@delete_answer_post');
Route::post('/font-board-question-for-answer-edit','FontBoardPostsController@edit_question_post_from_answer');

Route::get('/font-guarantee','GuaranteeController@get_font');
// Route::get('/font-guarantee', function () {
//     return view('font_pages/guarantee');
// });

Route::post('/print','RepairsGeneralController@print_repair');
Route::post('/print2','RepairsGeneralController@print_bill');

Route::post('/status-pay-member','RepairsMemberController@status_pay');
Route::post('/status-bill-member','RepairsMemberController@status_bill');
Route::post('/status-pay','RepairsGeneralController@status_pay');
Route::post('/status-bill','RepairsGeneralController@status_bill');

Route::get('/font-profile','AuthenController@font_profile');
Route::post('/font-profile-edit','AuthenController@font_profile_edit');

Route::get('/font-register', function () {
    return view('font_pages/register');
});
// Route::get('/font-repair', function () {
//     return view('font_pages/repair');
// });
Route::get('/font-repair','RepairsGeneralController@font_general');
Route::post('/font-repair-general-search','RepairsGeneralController@font_general_search');

Route::post('/font-register-create','AuthenController@create_register');

// Route::get('/font-new-detail/{id}', 'FontNewController@new_by_id')->where('id', '[0-9]+');

//////////////////////////////////////////End endpoint font/////////////////////////////////////////////

Route::get('/persons-form-search', 'PersonsManagerController@get_persons_form_search');
Route::post('/persons-form-search2', 'PersonsManagerController@get_persons_form_search2');
Route::post('/persons-search', 'PersonsManagerController@search_person');

Route::get('/persons-manager', 'PersonsManagerController@get_persons');
Route::post('/persons-manager2', 'PersonsManagerController@get_persons2');
Route::post('/person-manager-form', 'PersonsManagerController@form');
// Route::get('/person-manager-form-edit/{id}', 'PersonsManagerController@form_edit')->where('id', '[0-9]+');
Route::post('/person-manager-form-edit', 'PersonsManagerController@form_edit');
Route::post('/person-manager-create', 'PersonsManagerController@create');
Route::post('/person-manager-edit', 'PersonsManagerController@edit')->where('id', '[0-9]+');
Route::post('/person-manager-delete' ,'PersonsManagerController@delete')->where('id', '[0-9]+');

Route::get('/persons-employee', 'PersonsEmployeeController@get_persons');
Route::post('/persons-employee2', 'PersonsEmployeeController@get_persons2');
Route::post('/person-employee-form', 'PersonsEmployeeController@form');
Route::post('/person-employee-form-edit', 'PersonsEmployeeController@form_edit')->where('id', '[0-9]+');
Route::post('/person-employee-create', 'PersonsEmployeeController@create');
Route::post('/person-employee-edit', 'PersonsEmployeeController@edit')->where('id', '[0-9]+');
Route::post('/person-employee-delete' ,'PersonsEmployeeController@delete')->where('id', '[0-9]+');

Route::get('/persons-member', 'PersonsMemberController@get_persons');
// Route::get('/persons-member', 'PersonsMemberController@get_persons');
Route::get('/person-member-form', 'PersonsMemberController@form');
Route::post('/person-member-form-edit', 'PersonsMemberController@form_edit')->where('id', '[0-9]+');
Route::post('/person-member/create', 'PersonsMemberController@create');
Route::post('/person-member-edit', 'PersonsMemberController@edit')->where('id', '[0-9]+');
Route::post('/person-member/delete/{id}' ,'PersonsMemberController@delete')->where('id', '[0-9]+');

Route::get('/stores', 'StoreController@get_store_branch');
Route::post('/store-branch/create', 'StoreController@create_store_branch');
Route::get('/store-branch-form-edit/{id}', 'StoreController@form_edit')->where('id', '[0-9]+');
Route::post('/store-branch/edit/{id}','StoreController@edit_store_branch')->where('id','[0-9]+');
Route::post('/store-branch/delete/{id}','StoreController@delete')->where('id','[0-9]+');

Route::get('/repair-member', 'RepairsMemberController@get_repair');
Route::post('/repair-member/create', 'RepairsMemberController@create');
Route::post('/repair-member/edit/{id}', 'RepairsMemberController@edit');
Route::post('/repair-member-status/{id}', 'RepairsMemberController@status_repair');
Route::post('/repair-member/delete/{id}', 'RepairsMemberController@delete');

Route::get('/form-search-repair-only-bill', 'RepairsMemberController@search_repair_form');
Route::post('/search-repair-only-bill', 'RepairsMemberController@search_repair_only_bill');

// Route::get('/search-repair-only-bill', function () {
//     return view('search_repair/search_repair');
// });

Route::get('/repair-general', 'RepairsGeneralController@get_repair');
Route::post('/repair-general/create', 'RepairsGeneralController@create');
Route::post('/repair-general/edit/{id}', 'RepairsGeneralController@edit');
Route::post('/repair-general-status/{id}', 'RepairsGeneralController@status_repair');
Route::post('/repair-general/delete/{id}', 'RepairsGeneralController@delete');

Route::post('/list-repair', 'ListRepairsController@get_list_repair_by_id');
Route::post('/list-repair-create', 'ListRepairsController@create');
Route::post('/list-repair-edit', 'ListRepairsController@edit');
Route::post('/list-repair-status-edit', 'ListRepairsController@edit_status');
Route::post('/list-repair-delete', 'ListRepairsController@delete');

Route::post('/list-repair-data-use-part', 'ListRepairsController@create_data_use_part');
Route::post('/list-repair-delete-data-use-part', 'ListRepairsController@delete_data_use_part');

Route::get('/list-repair-for-technician', 'ListTechnicianController@get_list_repair_for_technician');
Route::post('/list-repair-for-technician-status-edit', 'ListTechnicianController@edit_status');
Route::post('/list-repair-for-technician-data-use-part', 'ListTechnicianController@create_data_use_part');
Route::post('/list-repair-for-technician-delete-data-use-part', 'ListTechnicianController@delete_data_use_part');

Route::get('/pay-money','PayMoneyController@get_pay_money');
Route::post('/search-pay-money','PayMoneyController@search_pay_money');

Route::get('/import_part','ImportPartsController@get');
Route::post('/import_part/create','ImportPartsController@create');
Route::post('/import_part/edit/{id}','ImportPartsController@edit');
Route::post('/import_part/delete/{id}','ImportPartsController@delete');

Route::post('/list-part', 'ListPartsController@get_list_parts_by_id');
Route::post('/list-part-create', 'ListPartsController@create');
Route::post('/list-part-edit', 'ListPartsController@edit');
Route::post('/list-part/delete/{id}', 'ListPartsController@delete');

Route::get('/setting-status-repair-shop','SettingStatusShopController@get');
Route::post('/setting-status-repair-shop/create','SettingStatusShopController@create');
Route::post('/setting-status-repair-shop/edit/{id}','SettingStatusShopController@edit');
Route::post('/setting-status-repair-shop/delete/{id}','SettingStatusShopController@delete');

Route::get('/setting-status-repair','SettingStatusController@get');
Route::post('/setting-status-repair/create','SettingStatusController@create');
Route::post('/setting-status-repair/edit/{id}','SettingStatusController@edit');
Route::post('/setting-status-repair/delete/{id}','SettingStatusController@delete');

Route::get('/gallery','GallerysController@get');
Route::post('/gallery/create','GallerysController@create');
Route::post('/gallery/edit/{id}','GallerysController@edit');
Route::post('/gallery/delete/{id}','GallerysController@delete');

Route::get('/guarantee','GuaranteeController@get');
Route::post('/guarantee/create','GuaranteeController@create');
Route::post('/guarantee-edit-only','GuaranteeController@edit_only');
Route::post('/guarantee/edit/{id}','GuaranteeController@edit');
Route::post('/guarantee/delete/{id}','GuaranteeController@delete');

Route::post('/questtion-post','BoardPostsController@get_question_post');
Route::post('/questtion-post-create','BoardPostsController@create_question_post');
Route::post('/questtion-post-edit','BoardPostsController@edit_question_post');
Route::post('/questtion-post-delete','BoardPostsController@delete_question_post');

Route::post('/answer-post-form','BoardPostsController@form_get_answer_post');
Route::post('/answer-post-create','BoardPostsController@create_answer_post');
Route::post('/answer-post-edit','BoardPostsController@edit_answer_post');
Route::post('/answer-post-delete','BoardPostsController@delete_answer_post');
Route::post('/questtion-post-from-answer-edit','BoardPostsController@edit_question_post_from_answer');
//delete ใช้อันบน

Route::get('/news','NewsController@get');
Route::get('/maha','NewsController@maha');
Route::post('/new/create','NewsController@create');
Route::post('/new-edit','NewsController@edit');
Route::post('/new/delete/{id}','NewsController@delete');

Route::post('/test_login','AuthenController@login');
Route::post('/logout','AuthenController@logout');
Route::get('/profile','AuthenController@profile');
Route::post('/profile-edit','AuthenController@edit_profile');

Route::get('/report-person-member', 'PersonsMemberController@report_person_member');
Route::get('/report-list', 'ReportController@get_report_list');
Route::post('/report-detail', 'ReportController@get_report_detail');
Route::post('/report-print', 'ReportController@get_report_print');

Route::get('/dashboard', 'DashboardController@dashboard_addmin');
Route::get('/dashboard_branch', 'DashboardController@dashboard_by_store_branch');

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
